<?php get_header(); ?>
<div id="content-internal">
    <div id="content-internal-center">
		<div id="right-top">
                   </div>
<div id="flexicontent" class="flexicontent item16 type2" style="padding-bottom:10px">

<div id="content-internal-header">
    	<div id="content-internal-header-title">
 <?php while (have_posts()) : the_post(); ?>
    <h2 class="contentheading flexicontent">
        <?php the_title(); ?></h2>
</div>
        <div style="clear:both"></div>
	</div>

<div class="topblock">
    <div class="image">
        <?php the_post_thumbnail(); ?>
        <div class="clear"></div>
    </div>
</div>

    <div class="contentpaneopen-portfolio-inherit-page">
        <p class="yellow">
            Technologies </p>
        <p><?php echo get_post_meta($post->ID, "Technologies", true);?></p></div>

    <div class="contentpaneopen-portfolio-inherit-page">
        <p class="yellow">
            Client </p>
        <p><?php echo get_post_meta($post->ID, "Clients", true);?></p></div>

    <div class="contentpaneopen-portfolio-inherit-page">
        <p class="yellow">
            Description </p>
        <p><?php echo get_post_meta($post->ID, "Description", true);?></p>
    </div>
        
</div>
         <?php endwhile; ?>
		<div style="clear:both;">
        </div>
	</div>
</div>
<?php get_footer(); ?>