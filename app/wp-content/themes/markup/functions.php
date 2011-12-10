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












add_theme_support('post-thumbnails');

include "functions/meta-portfolio.php";
include "functions/type-portfolio.php";
include "functions/meta-clients.php";
include "functions/type-clients.php";