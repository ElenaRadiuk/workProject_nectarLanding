<?php get_header(); ?>
<main>  
  <div class="htproductsname">
      <hr/>
        <?php echo get_cat_name(30); ?>
      <hr/>
  </div>  
  <nav class="productstopnav">  
    <?php wp_nav_menu(array('menu' => 'ProductsTopMenu'));?>
  </nav>
  <div class="htwrapper">
    <section class="htcatalog">
      <ul>
<?php $ul_id = 32; ?>
      <?php query_posts("cat=$ul_id"); ?>
      <li><a href="<?php echo get_category_link($ul_id); ?> "><?php echo get_cat_name($ul_id);?></a>
      <hr/>
        <ul>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>
          <?php endwhile; endif; ?>

          <?php wp_reset_query(); ?>
        </ul>
      </li>

        
<!--       <?php  
        $productscategories = get_terms('category', array(
            'child_of' => 30
        ));
        foreach ($productscategories as $productscategory){        
          echo '<li>';
          echo '<a href="'.get_term_link($productscategory->term_id).'">'.$productscategory->name.'</a>';
          echo '<hr/>';
        $args = array(
            'post_type' => 'product',
            'productscategory' => $productscategory->slug
            );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
          echo '<ul>';
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>';
              echo '<a href="'.get_the_permalink().'">' . get_the_title() . '</a>';
            echo '</li>';
          }
        echo '</ul>';
        }
        echo '</li>';
        wp_reset_postdata();
        }
      ?> -->

      </ul>
    </section>      
    <section class="htproducts">

        <?php query_posts("cat=30"); ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article>
        <div class="productwrapper">
          <div class="productimage">
            <a href="<?php the_permalink(); ?>">
              <?php echo get_the_post_thumbnail(); ?>
            </a>
          </div>
          <div class="productinfo">
            <header>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <hr/>
            </header>        
            <div class="singleproductcontent">
            <a href="<?php the_permalink(); ?>">
            <?php if ( ! has_excerpt() ) { 
              the_content(); 
            } else { 
              the_excerpt();
            } ?>
            </a>            
            </div>
            <a href="<?php the_permalink(); ?>">
              <button><?php echo __('ДЕТАЛЬНІШЕ'); ?></button>
            </a>            
          </div>
        </div>
        </article>
          <?php endwhile; endif; ?>

          <?php wp_reset_query(); ?>



<!--     <?php if(have_posts()){
      while (have_posts()){
        the_post(); ?>    
      <article>
        <div class="productwrapper">
          <div class="productimage">
            <a href="<?php the_permalink(); ?>">
              <?php echo get_the_post_thumbnail(); ?>
            </a>
          </div>
          <div class="productinfo">
            <header>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <hr/>
            </header>        
            <div class="singleproductcontent">
            <a href="<?php the_permalink(); ?>">
            <?php if ( ! has_excerpt() ) { 
              the_content(); 
            } else { 
              the_excerpt();
            } ?>
            </a>            
            </div>
            <a href="<?php the_permalink(); ?>">
              <button><?php echo __('ДЕТАЛЬНІШЕ'); ?></button>
            </a>            
          </div>
        </div>
      </article>
      <?php }
      } ?> -->
    </section>
  </div>
</main>

<?php get_footer();