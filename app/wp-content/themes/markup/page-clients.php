<?php get_header(); ?>
<div id="content-internal-no-js">
    <div id="content-internal-header">
        <div id="content-internal-header-title">Clients</div>
        <div style="clear:both"></div>
    </div>
    <div id="content-internal-center">
        <div style="clear:both;">
            <table class="blog-clients" cellpadding="0" cellspacing="0">
                <td valign="top">
                    <div id="content">
                        <ul id="blog-clients">
                            <?php query_posts('post_type=client')?>
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post();  ?>
                                <li>
                                    <p style="text-align: center;" class="yellow"><?php the_title();?></p>
                                    <?php the_thumb(280, 200); ?>
                                    <p style="text-align: center;">
                                        <a href='http://<?php echo get_post_meta($post->ID, "URL_Clients", true);?>'><?php echo get_post_meta($post->ID, "URL_Clients", true);?></a>
                                    </p>
                                </li>
                                <?php endwhile; ?>
                            <?php endif;?>
                        </ul>
                    </div>
                </td>
            </table>
        </div>
    </div>
</div>
<?php get_footer(); ?>