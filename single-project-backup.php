<?php get_header(); ?>
 
    <div id="blog">
        
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="porfolio-preview clearfix">

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
                <a href="<?php echo $infos[0]; ?>" target="_blank">Live Preview</a>
            </div>

            <div class="image-work">
                   <p>some image here</p>  
            </div>
        </div>
 

</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>