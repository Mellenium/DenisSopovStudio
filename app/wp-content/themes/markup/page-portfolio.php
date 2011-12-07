<?php get_header(); ?>
<div id="content-internal">
    <div id="content-internal-header">
        <div id="content-internal-header-title">Portfolio</div>
        <div style="clear:both"></div>
    </div>
    <div id="content-internal-center">
        <ul id="mainlevel">

           <?php query_posts('post_type=portfolio&portfolio-category=architectural-exteriors'); ?>

            <?php while (have_posts()) : the_post(); ?>

            <li><a href="<?php the_permalink() ?>" class="mainlevel">
                <?php the_post_thumbnail(array(295, 172)); ?>
                 <span><?php the_title(); ?></span></a></li>

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </ul>

        <!-- / featured post -->

        <div style="clear:both;"></div>
    </div>
</div>
<?php get_footer(); ?>
