<?php
/**
Template Name: contacts
 */
get_header(); ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
    <header class="supplierspageheader contacts">
        <hr>
        <?php the_title(); ?>
        <hr>
    </header>
    <?php endwhile;  ?>
    <section class="supplierspagemaincontent_contacts">
        <div class="container-fluid">
            <div class="row">
                        <ul  class="nav nav-pills">

                            <li class="active">
                                <?php $the_query = new WP_Query('cat=77'); ?>
                                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                                <a  href="#1a" data-toggle="tab"><?php the_title(); ?></a>
                                <?php endwhile; ?>
                            </li>

                            <li>
                                <?php $the_query = new WP_Query('cat=79'); ?>
                                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                                <a href="#2a" data-toggle="tab"><?php the_title(); ?></a>
                                <?php endwhile; ?>
                            </li>
                        </ul>

                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="1a">
                                <?php $the_query = new WP_Query('cat=77'); ?>
                                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="address_block mainaddress">

                        <?php the_content(); ?>

                                </div>
                                <?php endwhile; ?>


                                <div id="map"></div>
                            </div>
                            <div class="tab-pane" id="2a">
                                <?php $the_query = new WP_Query('cat=79'); ?>
                                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="address_block  ecaddress">

                        <?php the_content(); ?>

                                </div>
                                <?php endwhile; ?>
                                <div id="map2"></div>
                            </div>
                        </div>
            </div>
         </div>
    </section>


<?php get_footer('with-map'); ?>