<?php get_header(); ?>
    
    <div id="main">
    <div class="tag-line"><h2>Lassodesign is a estudy design run by Eduardo Lasso, doing simple and beutiful sites</h2></div>

    <div id="portfolio-wrapper">   
            <h3>Latest Work</h3>
            <ul  id="portfolio-list">

                <?php $loop = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => 3 ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

               

                <li class="portfolio-item <?php echo strtolower($tax); ?> all">  
                    <div class="thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( array(270, 225) ); ?></a></div>  
                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>  
                     
                    <p class="links"><a href="<?php the_permalink() ?>">More Details</a></p>  
                </li> 
                <?php endwhile; ?>
                

               

            </ul>
    </div>
    </div>






<?php get_sidebar(); ?>   
<?php get_footer(); ?>