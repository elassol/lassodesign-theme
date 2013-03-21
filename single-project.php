<?php get_header(); ?>
 
    <div id="main">
        
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php 
            global $portfolio_meta;
            global $media_attach;
            
            $meta = get_post_meta(get_the_ID(), $portfolio_meta->get_the_id(), TRUE);
        ?>
        <div class="porfolio-preview clearfix">
            
             <?php 
                    if ($meta['featured_attachment_type'] == "images") {
                ?>
                <div class="image-work">
                    <div id="portfolio_flexslider" class="flexslider">
                        <ul class="slides">
                        <script>
                            /*
                                Slider
                            */
                            $(window).load(function() {
                                $('.flexslider').flexslider({
                                    animation: "slide"
                                });
                            });
                        </script>
                            <?php 
                            foreach ($meta['work_images_group'] as $work_img) { ?>
                            <li data-thumb="<?php echo $work_img['work_img']; ?>">
                                <img src="<?php echo $work_img['work_img']; ?>">
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div id="portfolio_flexslider" class="flexslider">
                        <ul class="slides">
                            <li data-thumb="<?php echo $meta['portfolio_image']; ?>">
                                <img src="<?php echo $meta['portfolio_image']; ?>" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
<<<<<<< HEAD


                


        </div>

=======
        </div>
>>>>>>> 544a6e702f72ee9f461e7e7b249e360384e6122a
        <div class="info-work">
                         
                    <div class="navigation clearfix">  
                        <span class="previews"><?php previous_post_link('%link', 'Previous'); ?></span>
                        <span class="next"><?php next_post_link('%link','Next') ?></span>
                    </div> 
                

                <h1><?php the_title(); ?></h1>  
                

                <p><?php echo get_the_content(); ?></p>
                <?php if($meta['url'] != ""){ ?>
                        <p><strong>URL</strong> <a href="<?php echo $meta['url']; ?>" target="_blank"><?php echo $meta['url']; ?></a></p>
                 <?php } ?>

<<<<<<< HEAD
                 </div>
          
                 
    </div>  

=======
        </div>   
                 
    </div>       
>>>>>>> 544a6e702f72ee9f461e7e7b249e360384e6122a
            <?php endwhile; ?>
        <?php endif; ?>
 

<?php get_footer(); ?>