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
        <?php $value =  get_post_meta($post->ID, "Youtube", true);?>
        <?php if (!empty($value)){?>
           <iframe width="560" height="315" src="$value" frameborder="0" allowfullscreen></iframe> <?php }
        else {
            the_post_thumbnail(); }?>
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

    <div class="contentpaneopen-portfolio-inherit-page">
        <p class="yellow">
            Youtube </p>
        <p><?php echo get_post_meta($post->ID, "Youtube", true);?></p>
    </div>
        
</div>
         <?php endwhile; ?>
		<div style="clear:both;">
        </div>
	</div>
</div>


    <div id="content-internal">
    <div id="content-internal-header">
        <div id="content-internal-header-title">best works</div>
        <div style="clear:both"></div>
    </div>
    <div id="content-internal-center">
        <ul id="mainlevel">

            <?php query_posts('post_type=portfolio&portfolio-category=' . $category . ''); ?>

            <?php while (have_posts()) : the_post(); ?>
<!--            <li><a href="--><?php //the_permalink();?><!--portfolio/?portfolio-category=--><?php //echo $term->slug; ?><!--&portfolio-category-name=--><?php //echo $term->name; ?><!--">-->
            <li><a href="<?php the_permalink() ?>?portfolio-category=<?php ?>" class="mainlevel">
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