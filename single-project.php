<?php get_header(); ?>
 
    <div id="blog">
        
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <?php 
            global $portfolio_meta;
            global $media_acess;
            
            $meta = get_post_meta(get_the_ID(), $portfolio_meta->get_the_id(), TRUE);
        ?>
        <div class="porfolio-preview clearfix">
            <?php echo "<pre>"; print_r($meta); echo "</pre>"; ?>
            <div class="info-work">

                <?php endwhile; ?>                     
                    <div class="navigation clearfix">  
                        <span class="previews"><?php previous_post_link('%link', 'Previous'); ?></span>
                        <span class="next"><?php next_post_link('%link','Next') ?></span>
                    </div> 
                <?php endif; ?>

                <h1><?php the_title(); ?></h1>  
                <h2 class="excerpt"><?php echo get_the_excerpt(); ?></h2>  

                
                <p><?php echo get_the_content(); ?></p>
                <?php if($meta['url'] != ""){ ?>
                        <p><strong>URL</strong> <a href="<?php echo $meta['url']; ?>" target="_blank"><?php echo $meta['url']; ?></a></p>
                 <?php } ?>

            </div>

            <div class="image-work">

                <!-- <div class="flex-container">
                    <div class="flexslider">
                    <ul class="slides">
                        <?php
                        query_posts(array('category_name' => 'featured', 'posts_per_page' => 3));
                        if(have_posts()) :
                            while(have_posts()) : the_post();
                        ?>
                          <li>
                            <?php the_post_thumbnail(); ?>
                            <p class="flex-caption"><?php the_excerpt(); ?></p>
                          </li>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                        </ul>
                    </div>
                </div> -->

                <?php if ($meta['portfolio_image'] != "") { ?>
                   <img src="<?php echo $meta['portfolio_image']; ?>" />
                <?php } ?>  
            </div>
        </div>
 

</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>