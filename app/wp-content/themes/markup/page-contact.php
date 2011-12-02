<?php get_header(); ?>
<div id="content-internal">
    <div id="content-internal-header">
        <div id="content-internal-header-title">Contacts</div>
        <div style="clear:both"></div>
    </div>
    <div id="content-internal-center">
        <div class="contacts">
            <div class="icq"><span class="yellow">ICQ</span><?php echo get_user_meta('1','icq',true);?></div>
            <div class="skype"><span class="yellow">Skype</span><?php echo get_user_meta('1','skype',true);?></div>
            <div class="email"><span class="yellow">Email</span><?php echo $current_user->user_email; ?></div>
            <div style="clear:both;"></div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="75" title="Contact"]') ?>
        <div style="clear:both;">
        </div>
    </div>
</div>

<?php get_footer(); ?>


