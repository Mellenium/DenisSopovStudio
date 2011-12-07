<?php get_header(); ?>

<div id="sliderr">
    <div class="slider-wrapper theme-default">
        <div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
            <img src="<?php bloginfo('template_directory'); ?>/images/banners/art_750.jpg" alt=""/></a>
            <img src="<?php bloginfo('template_directory'); ?>/images/banners/art_750_3.jpg" alt=""/></a>
            <img src="<?php bloginfo('template_directory'); ?>/images/banners/art_4_750.jpg" alt=""/></a>
        </div>
        <div id="htmlcaption" class="nivo-html-caption">
        </div>
    </div>
</div>

<div id="our-works">
    <div id="our-works-header">Our <span class="yellow">works</span></div>
    <div id="our-works-center">
        <ul id="mainlevel">

            <?php $terms = get_terms("portfolio-category");
            $count = count($terms);
            if ($count > 0) {
                foreach ($terms as $term) {?>
                   
                    <li><a href="<?php the_permalink();?>portfolio/?portfolio-category=<?php echo $term->slug; ?>&portfolio-category-name=<?php echo $term->name; ?>">
                    <?php query_posts('post_type=portfolio&portfolio-category='.$term->slug.'&posts_per_page=1'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_post_thumbnail(array(295, 172)); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    <?php echo "<span>" . $term->name . "</span></a></li>";
                }
            }?>

        </ul>
        <div style="clear:both;"></div>
    </div>
</div>
<div id="content-internal">
    <div id="content-internal-header">
        <div id="content-internal-header-title"></div>
        <div style="clear:both"></div>
    </div>

    <div id="content-internal-center">
        <div style="clear:both;">
        </div>
    </div>
</div>
<div id="content">
    <table class="blog-bottom">

        <tr>
            <td valign="top">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>

                        <td valign="top" width="33%" class="article_column">

                            <table class="contentpaneopen-bottom">


                                <tr>
                                    <td valign="top" colspan="2">
                                        
                                     	<?php		
											$slug = 'outsource-development';									
											$page = get_page_by_path('outsource-development');
											echo '<div class="bottom-title"><a class="yellow" href="'.get_page_link('$page').'">';
											echo $page->post_title;
											echo '</a></div>';
											echo '<div class="entry">';
								            echo $page->post_content;
								            echo '</div>'; 
										?>
									</td>	
                                </tr>


                            </table>
                            <span class="article_separator">&nbsp;</span>
                        </td>
                        <td valign="top" width="33%" class="article_column column_separator">

                            <table class="contentpaneopen-bottom">


                                <tr>
                                    <td valign="top" colspan="2">
                                        <?php		
											$slug = 'why-choose-us';									
											$page = get_page_by_path('why_choose_us');
											echo '<div class="bottom-title"><a class="yellow" href="'.get_page_link('$page').'">';
											echo $page->post_title;
											echo '</a></div>';
											echo '<div class="entry">';
								            echo $page->post_content;
								            echo '</div>'; 
										?>
                                     	
									</td>
                                </tr>


                            </table>
                            <span class="article_separator">&nbsp;</span>

                        </td>
                        <td valign="top" width="33%" class="article_column column_separator">

                            <table class="contentpaneopen-bottom">


                                <tr>
                                    <td valign="top" colspan="2">
                                        <?php		
											$slug = 'words';									
											$page = get_page_by_path('words');
											echo '<div class="bottom-title"><a class="yellow" href="'.get_page_link('$page').'">';
											echo $page->post_title;
											echo '</a></div>';
											echo '<div class="entry">';
								            echo $page->post_content;
								            echo '</div>'; 
										?>
                                     	
									</td>	
                                </tr>


                            </table>
                            <span class="article_separator">&nbsp;</span>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <form method="post" action="http://denissopovstudio.com/modules/mod_simpleform2/engine.php" id="simpleForm2_350"
          name="simpleForm2_350" enctype="multipart/form-data" class="simpleForm"><input type="hidden" name="moduleID"
                                                                                         value="75"/><input
            type="hidden" name="task" value="sendForm"/><input type="hidden" name="Itemid" value="1"/><input
            type="hidden" name="url" value="http://denissopovstudio.com/"/>

        <div class="index-feedback-header">Quick contact</div>
        <p><label for="b0d2330f74d188ac18b24f04b339a0970">Name <span>*</span></label> <input
                onblur="if(this.value=='') this.value=this.defaultValue;"
                onfocus="if(this.value==this.defaultValue) this.value='';" type="text"
                name="b0d2330f74d188ac18b24f04b339a0970" id="b0d2330f74d188ac18b24f04b339a0970" class="inputtext"
                value="Name"/></p>

        <p><label for="65bc42618f62bcd13f600d1b9124645c1">Email <span>*</span></label> <input
                onblur="if(this.value=='') this.value=this.defaultValue;"
                onfocus="if(this.value==this.defaultValue) this.value='';" type="text"
                name="65bc42618f62bcd13f600d1b9124645c1" id="65bc42618f62bcd13f600d1b9124645c1" class="inputtext"
                value="Email"/></p>

        <p><label for="bbfc5aeebce5c210ca37877b20b9649c2">Phone <span>*</span></label> <input
                onblur="if(this.value=='') this.value=this.defaultValue;"
                onfocus="if(this.value==this.defaultValue) this.value='';" type="text"
                name="bbfc5aeebce5c210ca37877b20b9649c2" id="bbfc5aeebce5c210ca37877b20b9649c2" class="inputtext"
                value="Phone"/></p>

        <p><label for="dc82744740a189be37ff5bfd8ed1fc6e3">Country <span>*</span></label> <input
                onblur="if(this.value=='') this.value=this.defaultValue;"
                onfocus="if(this.value==this.defaultValue) this.value='';" type="text"
                name="dc82744740a189be37ff5bfd8ed1fc6e3" id="dc82744740a189be37ff5bfd8ed1fc6e3" class="inputtext"
                value="Country"/></p>

        <p class="fb-msg">Message</p>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="ifb-bg-tl"></td>
                <td class="ifb-bg-tc"></td>
                <td class="ifb-bg-tr"></td>
            </tr>
            <tr>
                <td class="ifb-bg-cl"></td>
                <td class="ifb-bg-cc">
                    <p><label for="f9d354619bd46c6e228970755012676d4">Message <span>*</span></label> <textarea
                            name="f9d354619bd46c6e228970755012676d4" id="f9d354619bd46c6e228970755012676d4"
                            class="inputtext"></textarea></p>
                </td>
                <td class="ifb-bg-cr"></td>
            </tr>
            <tr>
                <td class="ifb-bg-bl"></td>
                <td class="ifb-bg-bc"></td>
                <td class="ifb-bg-br"></td>
            </tr>
        </table>
        <p><input class="submit" type="submit" value="Submit!" id="simpleForm2_350_submit"/></p>
    </form>
    <div style="clear:both"></div>
</div>

<?php get_footer(); ?>
