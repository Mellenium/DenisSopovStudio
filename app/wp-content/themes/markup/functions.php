<?php
//die('some');
/*if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}*/
add_theme_support( 'menus' );

register_nav_menus(array(
    'top' => 'Верхнее меню',            //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню'   //Название другого месторасположения меню в шаблоне
));

add_shortcode('related_posts', 'related_posts_shortcode');
add_theme_support('post-thumbnails');

function extra_contact_info($contactmethods) {

    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);

    return $contactmethods;
}
add_filter('user_contactmethods', 'extra_contact_info');

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

// Load main options panel file
require_once (TEMPLATEPATH . '/functions/admin-menu.php');

// Убираем пункты меню
function remove_menus()
{
global $menu;
// Массив разделов меню, которые мы планируем удалить
$restricted = array( __('Links'),__('Comments'),__('Media'),__('Dashboard'),__('Posts'));
end ($menu);

while (prev($menu))
{
$value = explode(' ',$menu[key($menu)][0]);
if(in_array($value[0] != NULL?$value[0]:"" , $restricted))
{
unset($menu[key($menu)]);
}
}
}
add_action('admin_menu', 'remove_menus');




add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );



/* Do something with the data entered */
add_action( 'save_post', 'myplugin_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function myplugin_add_custom_box() {
    add_meta_box(
        'myplugin_sectionid',
        __( 'My Post Section Title', 'myplugin_textdomain' ),
        'myplugin_inner_custom_box',
        'portfolio'
    );
    add_meta_box(
        'myplugin_sectionid',
        __( 'My Post Section Title', 'myplugin_textdomain' ),
        'myplugin_inner_custom_box',
        'client'
    );
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  echo '<label for="myplugin_new_field">';
       _e("Description for this field", 'myplugin_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="" size="25" />';
}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {
  // verify if this is an auto save routine.
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return;


  // Check permissions
  if ( 'page' == $_POST['post_type'] )
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

  $mydata = $_POST['myplugin_new_field'];

  // Do something with $mydata
  // probably using add_post_meta(), update_post_meta(), or
  // a custom table (see Further Reading section below)
}
