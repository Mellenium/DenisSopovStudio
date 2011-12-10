<?php
$prefix = "porfolio_";

$info_box = array(
	'id' => 'portfolio-meta-box',
	'title' => 'Информация о работе',
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    	array(
			'name' => 'Адрес сайта',
			'desc' => 'URL',
			'id' => $prefix . 'url',
			'type' => 'text',
			'std' => ''
		),
        array(
			'name' => 'Технологии',
			'desc' => 'Wordpress, Joomla, CakePHP, ...',
			'id' => $prefix . 'frameworks',
			'type' => 'text',
			'std' => 'Wordpress'
		),
		array(
			'name' => 'Дата ',
			'desc' => 'Дата сдачи (YY-MM-DD)',
			'id' => $prefix . 'date',
			'type' => 'datepicker',
			'std' => date('Y-m-d')
		)
        
	)
);

function get_videos() {
    global $post, $prefix;
    $videos = array();
    $number = 0;
    $delta = 0;
    $count = get_post_meta($post->ID, $prefix . 'event_video_count', true)+1;
    do {
        $number++;
        $meta = get_post_meta($post->ID, $prefix . 'event_video_'.$number, true);
//        if(!$meta) {
//            $delta++;
//            continue;
//        }
        $videos[] = array(
			'name' => 'Видео #'.($number-$delta),
			'desc' => 'Vimeo Video Id',
			'id' => $prefix . 'event_video_'.($number-$delta),
			'type' => 'text',
			'std' => $meta
		);
    } while($number < $count);

    return $videos;
}

add_action('admin_menu', 'event_add_box');

// Add meta box
function event_add_box() {
    global $info_box;

    $video_box = array(
        'id' => 'video-meta-box',
        'title' => 'Видео',
        'page' => 'portfolio',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => get_videos()
    );

    $meta_box = $info_box;
	add_meta_box($meta_box['id'], $meta_box['title'], 'event_show_box_info', $meta_box['page'], $meta_box['context'], $meta_box['priority']);

    $meta_box = $video_box;
	add_meta_box($meta_box['id'], $meta_box['title'], 'event_show_box_video', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

function event_show_box_video() {
    global $post, $prefix;

    $videos = get_videos();
    $nonce = 'event_meta_box_video_nonce';
    $count = sizeof($videos);

	// Use nonce for verification
	echo '<input type="hidden" name="'.$nonce.'" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<input type="hidden" id="event_video_count" value="'.$count.'" name="'.$prefix . 'event_video_count" value="'.$count.'" />';
?>
<style>
    .vimeo-description {

    }
    .vimeo-description strong {
        color: #f00;
    }
</style>
<script>
function add_vimeo_description(vimeo_descriptions) {
    if(vimeo_descriptions.length) {
        var vimeo = vimeo_descriptions[0];
        jQuery('#vimeo-'+vimeo.id).find('.vimeo-description').remove();
        jQuery('#vimeo-'+vimeo.id).append('<div class="vimeo-description"><h4>'+vimeo.title+'</h4><img src="'+vimeo.thumbnail_small+'"></div>');
        jQuery('#vimeo-'+vimeo.id).find('.vimeo-thumb').val(vimeo.thumbnail_small);
    }
}
function update_vimeo(vimeo_id) {
    if(vimeo_id) {
        var url = 'http://vimeo.com/api/v2/video/'+vimeo_id+'.json?callback=add_vimeo_description';
        jQuery.getScript(url);
    }
}
jQuery(function($){
    $('#videos .vimeo').each(function(){
        update_vimeo($(this).val());
    })
    $('#videos input').live('keyup', function(e){
        var $tr = $('#videos tr');
        $tr.removeClass('active')
        var count = $tr.length;
        var $wrapper = $(this).parents('tr')
        $wrapper.addClass('active');
        var old_val = $(this).val();
        var val = parseInt(old_val.replace(/[^0-9]/gi,''));
        if (isNaN(val)) val = '';
        if(old_val != val) $(this).val(val);
        var empty = !val;
        if(empty) {
            if(e.which in {46:1, 8:1} && count>1) {
                $('#videos .active').next().find('input').focus();
                $(this).parents('tr').remove();
            }
        } else {
            $wrapper.find('td').attr('id', 'vimeo-'+val);
            $wrapper.find('.vimeo-description').html('<strong>video not found</strong>');
            update_vimeo(val);
            if(!$('#videos .active').next().length) {
                var $newline = $('#videos tr:last').clone();
                var $input = $newline.find('input');
                $input.val('');
                var name = $input.attr('name');
                var id = parseInt(name.replace(/([^0-9])/gi, ''));
                var new_id = id+1;
                name = name.replace(/([0-9])/gi, '') + new_id;
                $input.attr('name', name);
                $input.attr('id', name);
                var $label = $newline.find('label');
                var text = $label.text();
                text = text.replace(id, new_id);
                $label.text(text);
                var for_attr = $label.attr('for');
                for_attr.replace(id, new_id);
                $label.attr('for', for_attr);
                $('#videos').append($newline);
                $('#event_video_count').val(new_id);
            }
        }
    })
})
</script>
<?php
	echo '<table id="videos" class="form-table">';

	foreach ($videos as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);

		echo
            '<tr>',
            '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
            '<td id="', $meta ? 'vimeo-'.$meta : '','">',
                '<input type="hidden" class="vimeo-thumb" name="thumb-', $field['id'], '" id="thumb-', $field['id'], '"/>',
                '<input placeholder="',$field['desc'],'" class="vimeo" autocomplete="off" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
            '<div class="vimeo-description"></div></td></tr>';
    }

	echo '</table>';
}

function event_show_box_info() {
    global $info_box;
    event_show_box($info_box, 'event_meta_box_info_nonce');
}

// Callback function to show fields in meta box
function event_show_box($meta_box, $nonce) {
	global $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="'.$nonce.'" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];
				break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>';
				break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
			case 'datepicker':
				echo '<input type="text" class="datepicker" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;                 
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'event_save_data');

function event_save_data($post_id) {
    global $info_box, $prefix;

    event_save_data_type($post_id, $info_box, 'event_meta_box_info_nonce');
    event_save_data_type($post_id, null, 'event_meta_box_video_nonce');
}

// Save data from meta box
function event_save_data_type($post_id, $meta_box, $nonce) {
    global $prefix;
	// verify nonce
	if (!wp_verify_nonce($_POST[$nonce], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	if($nonce == 'event_meta_box_video_nonce') {
        $count = 1;

        if(isset($_POST[$prefix . 'event_video_count']))
            $count = $_POST[$prefix . 'event_video_count'];

        $number = 1;
        $delta = 0;
        $values = array();
        do {
            $old = get_post_meta($post_id, $prefix . 'event_video_'.$number, true);
            if(isset($_POST[$prefix . 'event_video_'.$number])) {
                $new = $_POST[$prefix . 'event_video_'.$number];
                $new = str_replace('http://vimeo.com/', '', $new);
            } else
                $new = '';

            if ($new && !in_array($new, $values)) {
                $values[] = $new;
                update_post_meta($post_id, $prefix . 'event_video_'.($number-$delta), $new);
                update_post_meta($post_id, 'thumb-'.$prefix . 'event_video_'.($number-$delta), $_POST['thumb-'.$prefix . 'event_video_'.$number]);
                if($delta) {
                    delete_post_meta($post_id, $prefix . 'event_video_'.$number, $old);
                    delete_post_meta($post_id, 'thumb-'.$prefix . 'event_video_'.$number);
                }
            } else {
                delete_post_meta($post_id, $prefix . 'event_video_'.$number, $old);
                delete_post_meta($post_id, 'thumb-'.$prefix . 'event_video_'.$number);
                $delta++;
            }

            $number++;
        } while($number <= $count);

        update_post_meta($post_id, $prefix . 'event_video_count', $number-$delta-1);

    } else {
        foreach ($meta_box['fields'] as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];

            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}