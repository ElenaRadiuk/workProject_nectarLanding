<?php get_header(); ?>
<main class="container-fluid">
<div class="row">
<div class="htcategoryname">
    <div class="htcategorynamewrapper">
      <hr/>
        <?php single_cat_title(); ?>
      <hr/>
    </div>
  </div>
<div class="container">
   
  <section class="htpostss">    
    <div class="catdesc">
      <?php echo category_description(); ?>
    </div>
    <div class="row">
  <?php if(have_posts()){
    while (have_posts()){
      the_post(); ?>    
    <article class="col-xs-12 col-sm-6">
      <div class="postwrapper_n">
        <a href="<?php the_permalink(); ?>">
          <?php echo get_the_post_thumbnail(); ?>
        </a>        
        <header>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </header>
        <?php if(is_category('5') || in_category('52')) { ?>
          <div class="postdate">
            <?php the_date('F j Y');  ?>
          </div>        
          <hr/>
        <?php } ?>
        <p>
          <a href="<?php the_permalink(); ?>">
            <?php if(has_excerpt()){
              the_excerpt();               
            } else {
              the_content();
            } ?>
          </a>
        </p>
      </div>
    </article>
    <?php }
    } ?>
    </div>
  </section>
</div>
 

</div>
  
<script>
  console.log('rrrr');
</script>
</main>
<?php get_footer();