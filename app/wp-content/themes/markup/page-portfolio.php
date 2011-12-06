<?php get_header(); ?>
<div id="content-internal">
    <div id="content-internal-header">
        <div id="content-internal-header-title">Portfolio</div>
        <div style="clear:both"></div>
    </div>
   <div id="content-internal-center">
        <ul id="mainlevel">

           <?php query_posts('post_type=portfolioui', 'category_name=architectural-exteriors'); ?>

            <?php while (have_posts()) : the_post(); ?>

            <li><a href="<?php the_permalink() ?>" class="mainlevel">
                <?php the_post_thumbnail(array(295, 172)); ?>
                 <span><?php the_title(); ?></span></a></li>
            <?php endwhile; ?>

            <?php wp_reset_query(); ?>
            </ul>

    <!-- / featured post -->

            
            <li><a href="/index.php/effects-a-commercial"
                   style="background:url(<?php bloginfo('template_directory'); ?>/images/anim1_250_4.jpg) no-repeat center center;"
                   class="mainlevel"><span>Effects &amp; commercial</span></a>
            </li>
            <li><a href="/index.php/characters"
                   style="background:url(<?php bloginfo('template_directory'); ?>/images/char_295_3.jpg) no-repeat center center;"
                   class="mainlevel"><span>Characters</span></a></li>
            <li><a href="/index.php/stereo-3d"
                   style="background:url(<?php bloginfo('template_directory'); ?>/images/stereo_6.jpg) no-repeat center center;"

                   class="mainlevel"><span>Stereo 3D</span></a></li>

        <div style="clear:both;"></div>
    </div>
</div>
<?php get_footer(); ?>
