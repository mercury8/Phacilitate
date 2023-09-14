 <?php
 /**
 * Template Name: Phacilitate Directory
 *
 */ 
 get_header();
?>
<section id="feature-spo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="sectionTitle"><?php the_field('main_heading') ?></h2>
                <h4 class="sectionSubTitle"><?php the_field('featured_heading') ?></h4>
                <?php echo do_shortcode('[featured-sponsors]') ?>
            </div>
        </div>
    </div>
</section>
<section id="mainSponsors">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="sectionTitle"><?php the_field('explore_heading') ?></h2>
                <h3 class="productCount"><?php echo do_shortcode('[total_posts]')?></h3>
                <p class="subContent"><?php echo the_field('explore_sub_title')?></p>
                <?php echo do_shortcode('[main-sponsors]') ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();