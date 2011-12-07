<?php
//die('some');
/*if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}*/
add_theme_support('menus');


register_nav_menus(array(
                        'top' => 'Верхнее меню', //Название месторасположения меню в шаблоне
                        'bottom' => 'Нижнее меню' //Название другого месторасположения меню в шаблоне
                   ));




add_shortcode('related_posts', 'related_posts_shortcode');
add_theme_support('post-thumbnails');

//$option_name = 'myhack_extraction_length' ;
//$newvalue = '255' ;
//
//if ( get_option( $option_name ) != $newvalue ) {
//    update_option( $option_name, $newvalue );
//} else {
//    $deprecated = ' ';
//    $autoload = 'no';
//    add_option( $option_name, $newvalue, $deprecated, $autoload );
//}
//

//add_action("admin_init", 'add_ICQ_Skype_admin_email');
//function add_ICQ_Skype_admin_email()
//{
//
//    $option_name = 'admin_email';
//$newvalue = '250982927';
//
//
//if ( get_option( $option_name ) != $newvalue ) {
//    update_option( $option_name, $newvalue ,'','yes');
////    update_option("ICQ", '250982927', '', 'yes');
////    update_option("Skype", 'Deniss', '', 'yes');
////    update_option("admin_email", 'info@denissopovstudio.com', '', 'yes');
//} else {
//    $deprecated = ' ';
//    $autoload = 'no';
//    add_option( $option_name, $newvalue, $deprecated, $autoload );
//}


function extra_contact_info($contactmethods)
{

    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);

    $contactmethods['icq'] = 'ICQ';
    $contactmethods['skype'] = 'Skype';
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['vkontakte'] = 'ВКонтакте';
    $contactmethods['facebook'] = 'Facebook';


    return $contactmethods;
}

add_filter('user_contactmethods', 'extra_contact_info');

function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if (empty($first_img)) { //Defines a default image
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}

function no_link_current_page( $p ) {
    return preg_replace( '%((current_page_item|current-menu-item)[^<]+)[^>]+>([^<]+)</a>%', '$1<span>$3</span>', $p, 1 );
}

add_filter( 'wp_list_pages', 'no_link_current_page' );
add_filter( 'wp_nav_menu',   'no_link_current_page' );
add_filter( 'wp_page_menu',   'no_link_current_page' );
