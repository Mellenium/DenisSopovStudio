<?php
add_action('init', 'custom_posttypes');

function custom_posttypes()
{
    
  $eventlabels = array(
    'name' => 'Наши работы',
    'singular_name' => 'Работа',
    'add_new' => 'Добавить новую',
    'add_new_item' => 'Добавить работу',
    'edit_item' => 'Изменить работу',
    'new_item' => 'Новая работа',
    'view_item' => 'Просмотреть работу',
    'search_items' => 'Найти работу',
    'not_found' =>  'Не найдено ни одной работы',
    'not_found_in_trash' => 'Не найдено ни одной работы в корзине',
    'parent_item_colon' => '',
    'menu_name' => 'Портфолио'

  );
  $eventargs = array(
    'labels' => $eventlabels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'));

  register_post_type('portfolio',$eventargs);
}