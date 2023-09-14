<?php
/**
 * The template for displaying single sponsor
 */

get_header();
$content = get_the_content();
?>

<section class="container firstmain-sidebar-primary">
            <div>
                <div class="float-right d-block firstmain-sidebar bg-white">
                        <h3>CONTACT INFO</h3>
                        <div class="firstmain-side-add-pho">
                            <?php if( get_field('address') ): ?>
                                    <i class="fas fa-map-marker-alt float-left mr-3"></i>
                                    <div class="address-side"><?php the_field('address'); ?></div>
                            <?php endif; ?>
                            <br/>
                                <?php if( get_field('phone_number') ): ?>
                                    <i class="fas fa-phone float-left mr-3"></i>
                                    <div class="phoone-side"><?php the_field('phone_number'); ?></div>
                                <?php endif; ?>
                        </div>
                    
                        <hr>
                        <h3>PRIMARY ACTIVITIES</h3>
                        <?php //the_field('primary_activities'); 
                            $terms = get_the_terms( $post->ID, 'product' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            echo '<div class="secondTag">';
                        
                        //$x = 0;
                        foreach ( $terms as $term ) {
                            echo '<p>' . $term->name . '</p>';
                        }
                        echo '</div>';
                        }
                        ?>

                        <?php if ( 'yes' == get_field('paid_version') ): ?>
                            <?php
                                $terms = get_the_terms( get_the_ID(), 'modality' );
                                if ( $terms && ! is_wp_error( $terms ) ) :
                                ?>
                                <hr>
                            <h3>COMPANY TYPE</h3>
                            <?php
                            $terms = get_the_terms( $post->ID, 'modality' );
                            if ( $terms && ! is_wp_error( $terms ) ) {
                                echo '<div class="firstTag">';
                            
                            $x = 0;
                            foreach ( $terms as $term ) {
                                echo '<span class="comma'.  $x++ .'">/ </span><p>' . $term->name . '</p>';
                            }
                            echo '</div>';
                            } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                </div>
            </div>
</section>
<!-- section separator a -->
    <section class="main_bg_directory">
        <section class="container">

            <section class="firstSec-singleSponsor d-flex">
                <div class="container mobile-sidebar">
                <div class="float-right d-block firstmain-sidebar bg-white mobile-sidebar-secondary">
                    <h3>CONTACT INFO</h3>
                    <div class="firstmain-side-add-pho">
                        <?php if( get_field('address') ): ?>
                                <i class="fas fa-map-marker-alt float-left mr-3"></i>
                                <div class="address-side"><?php the_field('address'); ?></div>
                        <?php endif; ?>
                        <br/>
                            <?php if( get_field('phone_number') ): ?>
                                <i class="fas fa-phone float-left mr-3"></i>
                                <div class="phoone-side"><?php the_field('phone_number'); ?></div>
                            <?php endif; ?>
                    </div>
                    
                    
                        <!-- <hr>
                    <h3>COMPANY TYPE</h3> -->
                    <?php
                    //$terms = get_the_terms( $post->ID, 'modality' );
                    //if ( $terms && ! is_wp_error( $terms ) ) {
                        //echo '<div class="firstTag">';
                    
                    //$x = 0;
                    //foreach ( $terms as $term ) {
                        //echo '<span class="comma'.  $x++ .'">/ </span><p>' . $term->name . '</p>';
                    //}
                    //echo '</div>';
                    //} ?>
                    

                    <hr>
                    <h3>PRIMARY ACTIVITIES</h3>
                    <?php //the_field('primary_activities'); 
                        $terms = get_the_terms( $post->ID, 'product' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        echo '<div class="secondTag">';
                    
                    //$x = 0;
                    foreach ( $terms as $term ) {
                        echo '<p>' . $term->name . '</p>';
                    }
                    echo '</div>';
                    }
                    ?>
                
                    
                </div>
                <?php breadcrumbs($id); ?>
                    <div class="top-section-free float-left bg-white mr-2">
                    <div class="free_banner"><img src="<?php the_field('free_banner'); ?>"/></div>
                        <div class="featureSponsor float-left"> 
                            <?php the_post_thumbnail( 'full', array( 'class' => 'sponsorImg' ) ); ?>
                        </div>

                        <div class="top_section_dir">

                        <div class="contentArea mw-100">
                            <div class="title_tick"><h2><?php the_title(); ?></h2>
                            <?php if ( 'yes' == get_field('paid_version') ): ?>
                                                <img src="/wp-content/uploads/2023/06/verified-gold.png" alt="verfied" style="width: 16px;height: 16px;margin-left: 4px;">
                            <?php else: ?>       
                            <?php endif; ?>
                            </div>
                            <p class="titleSub-single"><?php the_field('heading_sub_title_single_page_'); ?></p>
                        
                            

                            <div class="social_contactus">
                            <?php if ( 'yes' == get_field('paid_version') ): ?>
                                <div class="socialMedia-single">
                                        <ul>
                                        <?php if( get_field('email_link') ): ?>
                                                <li><a href="<?php the_field('email_link'); ?>"><i class="fas fa-envelope"></i></a></li>
                                            <?php endif; ?>
                                            <?php if( get_field('url_link') ): ?>
                                                <li><a href="<?php the_field('url_link'); ?>"target="_blank"><i class="fas fa-link"></i></a></li>
                                            <?php endif; ?>
                                            <?php if( get_field('linkedin_link') ): ?>
                                                <li><a href="<?php the_field('linkedin_link'); ?>"target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                            <?php endif; ?>
                                            <?php if( get_field('twitter_link') ): ?>
                                                <li><a href="<?php the_field('twitter_link'); ?>"target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                            <?php else: ?>       
                            <?php endif; ?>

                            <?php if ( 'yes' == get_field('paid_version') ): ?>

                                <?php if( get_field('contact_us') ): ?>
                                <div class="contact_paid_dir">
                                <a class="btn" href="<?php the_field('contact_us'); ?>" target="_blank" >CONTACT US</a>
                                </div>
                                <?php endif; ?>

                            <?php else: ?>     
                            <?php endif; ?>

                            </div>

                        </div>
                                
                                

                                

                                </div>

                                </div>
                            

                            <?php if ( 'yes' == get_field('paid_version') ): ?>
                                <div class="firstSec-Maincontent float-left mr-2 bg-white">
                                    <div class="firstSec-topcontent">
                                        <div>Year Founded<br/><strong><?php the_field('founder_year'); ?></strong></div>
                                        <div>Stage<br/><strong><?php the_field('stage'); ?></strong></div>
                                        <div>Member Since<br/><strong><?php the_field('member_since'); ?></strong></div>
                                        <div class="employer_profile">Employees<br/><strong><i style="margin-right:12px;" class="fas fa-users"></i><?php the_field('employees'); ?></strong></div>
                                    </div>
                                    <hr>
                                    <div><?php the_content(); ?><?php the_field('main_content'); ?>
                                </div>     
                            <?php else: ?>     
                            <?php endif; ?>






            <?php if ( 'paid' == get_field('paid__unpiad') ): ?>
        


            </section>
        <!-- divider -->
        </section>
    </section>
    <section class="bg-white">
        <section class="container">
        <!-- divider -->
            <section class="secondarymain-primary">

            <?php if( get_field('about_company') ): ?>
                <section class="bannerArea">
                    <div class="container">
                        <div class="centerBanner">
                            <?php if( get_field('center_banner') ): ?>
                                <img src="<?php the_field('center_banner'); ?>"/>
                            <?php endif; ?>
                            <div class="jumpButtons">
                                <p>Jump to:</p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php if( get_field('about_company') ): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?php the_field('about_company'); ?></button>
                                    </li>
                                    <?php endif; ?>
                                    <?php if( get_field('products_&_services') ): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php the_field('products_&_services'); ?></button>
                                    </li>
                                    <?php endif; ?>
                                    <?php if( get_field('feautred_content') ): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="feautredcontent-tab" data-toggle="tab" data-target="#feautredcontent" type="button" role="tab" aria-controls="feautredcontent" aria-selected="false"><?php the_field('feautred_content'); ?></button>
                                        </li>
                                    <?php endif; ?>
                                    <?php if( get_field('contact') ): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><?php the_field('contact'); ?></button>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

                <section>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" style="opacity:1 !important;" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- repeater content -->
                            
                            <section class="w-100">
                                <!-- content 1 -->
                                <div class="card-directory content-center mt-4 mb-4 mobile-card-h">
                                        <div class="w-100 bg-white">

                                                    <?php 
                                                    
                                                    $text_box_title_a_one = get_field('text_box_title_a_one'); 
                                                    $text_box_title_a_two = get_field('text_box_title_a_two');
                                                    $text_box_title_a_three = get_field('text_box_title_a_three');
                                                    $text_box_title_a_four = get_field('text_box_title_a_four');
                                                    $text_box_title_a_five = get_field('text_box_title_a_five'); 
                                                    $text_box_title_a_six = get_field('text_box_title_a_six'); 
                                                    $text_box_title_a_seven = get_field('text_box_title_a_seven'); 
                                                    $text_box_title_a_eight = get_field('text_box_title_a_eight'); 
                                                    $text_box_title_a_nine = get_field('text_box_title_a_nine'); 
                                                    $text_box_title_a_ten = get_field('text_box_title_a_ten'); 
                    
                                                    $text_box_image_a_one = get_field('text_box_image_a_one'); 
                                                    $text_box_image_a_two = get_field('text_box_image_a_two');
                                                    $text_box_image_a_three = get_field('text_box_image_a_three');
                                                    $text_box_image_a_four = get_field('text_box_image_a_four');
                                                    $text_box_image_a_five = get_field('text_box_image_a_five');
                                                    $text_box_image_a_six = get_field('text_box_image_a_six');
                                                    $text_box_image_a_seven = get_field('text_box_image_a_seven');
                                                    $text_box_image_a_eight = get_field('text_box_image_a_eight');
                                                    $text_box_image_a_nine = get_field('text_box_image_a_nine');
                                                    $text_box_image_a_ten = get_field('text_box_image_a_ten');

                                                    $paragraph_a_one = get_field('paragraph_a_one'); 
                                                    $paragraph_a_two = get_field('paragraph_a_two'); 
                                                    $paragraph_a_three = get_field('paragraph_a_three'); 
                                                    $paragraph_a_four = get_field('paragraph_a_four'); 
                                                    $paragraph_a_five = get_field('paragraph_a_five');
                                                    $paragraph_a_six = get_field('paragraph_a_six');
                                                    $paragraph_a_seven = get_field('paragraph_a_seven');
                                                    $paragraph_a_eight = get_field('paragraph_a_eight');
                                                    $paragraph_a_nine = get_field('paragraph_a_nine');
                                                    $paragraph_a_ten = get_field('paragraph_a_ten');
                                                    
                                                    
                                                    ?>

                                                    <h2><?php the_field('about_company'); ?></h2>

                                                    <div class="accordion" id="accordionExample">

                                                            <?php if( get_field('text_box_title_a_one') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h3 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                <?php echo $text_box_title_a_one ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                            </button>
                                                                        </h3>
                                                                    </div>
                                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <p class="">
                                                                                <?php if( get_field('text_box_image_a_one') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php echo $text_box_image_a_one ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_one ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_two') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        <?php echo $text_box_title_a_two ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_two') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php echo $text_box_image_a_two ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_two ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_three') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        <?php echo $text_box_title_a_three ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_three') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_field('text_box_image_a_three'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_three ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_four') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        <?php echo $text_box_title_a_four ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_four') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_four'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_four ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_five') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFive">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        <?php echo $text_box_title_a_five ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_five') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_five'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_five ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_six') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSix">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        <?php echo $text_box_title_a_six ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_six') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_six'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_six ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_seven') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSeven">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        <?php echo $text_box_title_a_seven ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_seven') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_seven'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_seven ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_eight') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingEight">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        <?php echo $text_box_title_a_eight ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_eight') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_eight'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_eight ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_nine') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingNine">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                        <?php echo $text_box_title_a_nine ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_nine') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_nine'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_nine ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_a_ten') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTen">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                        <?php echo $text_box_title_a_ten ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_ten') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_ten'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_a_ten ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        
                                                    </div>

                                            


                                        
                                        </div>
                                </div>
                                <!-- content end -->
                            </section>

                            <!-- repeater end -->
                        </div>
                        <div class="tab-pane fade" style="opacity:1 !important;" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                        <section class="w-100">
                                <!-- content 1 -->
                                <div class="card-directory content-center mt-4 mb-4 mobile-card-h">
                                        <div class="w-100 bg-white">

                                                    <?php 
                                                    
                                                    $text_box_title_b_one = get_field('text_box_title_b_one'); 
                                                    $text_box_title_b_two = get_field('text_box_title_b_two');
                                                    $text_box_title_b_three = get_field('text_box_title_b_three');
                                                    $text_box_title_b_four = get_field('text_box_title_b_four');
                                                    $text_box_title_b_five = get_field('text_box_title_b_five'); 
                                                    $text_box_title_b_six = get_field('text_box_title_b_six'); 
                                                    $text_box_title_b_seven = get_field('text_box_title_b_seven'); 
                                                    $text_box_title_b_eight = get_field('text_box_title_b_eight'); 
                                                    $text_box_title_b_nine = get_field('text_box_title_b_nine'); 
                                                    $text_box_title_b_ten = get_field('text_box_title_b_ten'); 
                    
                                                    $text_box_image_b_one = get_field('text_box_image_b_one'); 
                                                    $text_box_image_b_two = get_field('text_box_image_b_two');
                                                    $text_box_image_b_three = get_field('text_box_image_b_three');
                                                    $text_box_image_b_four = get_field('text_box_image_b_four');
                                                    $text_box_image_b_five = get_field('text_box_image_b_five');
                                                    $text_box_image_b_six = get_field('text_box_image_b_six');
                                                    $text_box_image_b_seven = get_field('text_box_image_b_seven');
                                                    $text_box_image_b_eight = get_field('text_box_image_b_eight');
                                                    $text_box_image_b_nine = get_field('text_box_image_b_nine');
                                                    $text_box_image_b_ten = get_field('text_box_image_b_ten');

                                                    $paragraph_b_one = get_field('paragraph_b_one'); 
                                                    $paragraph_b_two = get_field('paragraph_b_two'); 
                                                    $paragraph_b_three = get_field('paragraph_b_three'); 
                                                    $paragraph_b_four = get_field('paragraph_b_four'); 
                                                    $paragraph_b_five = get_field('paragraph_b_five');
                                                    $paragraph_b_six = get_field('paragraph_b_six');
                                                    $paragraph_b_seven = get_field('paragraph_b_seven');
                                                    $paragraph_b_eight = get_field('paragraph_b_eight');
                                                    $paragraph_b_nine = get_field('paragraph_b_nine');
                                                    $paragraph_b_ten = get_field('paragraph_b_ten');
                                                    
                                                    ?>

                                                    <h2><?php the_field('products_&_services'); ?></h2>

                                                    <div class="accordion" id="accordionExample">

                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            <?php echo $text_box_title_b_one ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                            <?php if( get_field('text_box_image_b_one') ): ?>
                                                                                <img class="innerImageTextBox" src="<?php echo $text_box_image_b_one ?>"/>
                                                                            <?php endif; ?>
                                                                        <?php echo $paragraph_b_one ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php if( get_field('text_box_title_b_two') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        <?php echo $text_box_title_b_two ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_two') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php echo $text_box_image_b_two ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_two ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_three') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        <?php echo $text_box_title_b_three ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_three') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_field('text_box_image_b_three'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_three ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_four') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        <?php echo $text_box_title_b_four ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_four') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_four'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_four ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_five') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFive">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        <?php echo $text_box_title_b_five ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_five') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_five'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_five ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_six') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSix">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        <?php echo $text_box_title_b_six ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_six') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_six'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_six ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_seven') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSeven">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        <?php echo $text_box_title_b_seven ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_seven') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_seven'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_seven ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_eight') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingEight">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        <?php echo $text_box_title_b_eight ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_eight') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_eight'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_eight ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_nine') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingNine">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                        <?php echo $text_box_title_b_nine ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_nine') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_a_nine'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_nine ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_b_ten') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTen">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                        <?php echo $text_box_title_b_ten ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_ten') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_b_ten'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_b_ten ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        
                                                    </div>

                                            


                                        
                                        </div>
                                </div>
                                <!-- content end -->
                            </section>
                        
                        </div>
                        <div class="tab-pane fade" style="opacity:1 !important;" id="feautredcontent" role="tabpanel" aria-labelledby="feautredcontent-tab">
                            
                        <section class="w-100">
                                <!-- content 1 -->
                                <div class="card-directory content-center mt-4 mb-4 mobile-card-h">
                                        <div class="w-100 bg-white">

                                        <?php 
                                                    
                                                    $text_box_title_c_one = get_field('text_box_title_c_one'); 
                                                    $text_box_title_c_two = get_field('text_box_title_c_two');
                                                    $text_box_title_c_three = get_field('text_box_title_c_three');
                                                    $text_box_title_c_four = get_field('text_box_title_c_four');
                                                    $text_box_title_c_five = get_field('text_box_title_c_five'); 
                                                    $text_box_title_c_six = get_field('text_box_title_c_six'); 
                                                    $text_box_title_c_seven = get_field('text_box_title_c_seven'); 
                                                    $text_box_title_c_eight = get_field('text_box_title_c_eight'); 
                                                    $text_box_title_c_nine = get_field('text_box_title_c_nine'); 
                                                    $text_box_title_c_ten = get_field('text_box_title_c_ten'); 
                    
                                                    $text_box_image_c_one = get_field('text_box_image_c_one'); 
                                                    $text_box_image_c_two = get_field('text_box_image_c_two');
                                                    $text_box_image_c_three = get_field('text_box_image_c_three');
                                                    $text_box_image_c_four = get_field('text_box_image_c_four');
                                                    $text_box_image_c_five = get_field('text_box_image_c_five');
                                                    $text_box_image_c_six = get_field('text_box_image_c_six');
                                                    $text_box_image_c_seven = get_field('text_box_image_c_seven');
                                                    $text_box_image_c_eight = get_field('text_box_image_c_eight');
                                                    $text_box_image_c_nine = get_field('text_box_image_c_nine');
                                                    $text_box_image_c_ten = get_field('text_box_image_c_ten');

                                                    $paragraph_c_one = get_field('paragraph_c_one'); 
                                                    $paragraph_c_two = get_field('paragraph_c_two'); 
                                                    $paragraph_c_three = get_field('paragraph_c_three'); 
                                                    $paragraph_c_four = get_field('paragraph_c_four'); 
                                                    $paragraph_c_five = get_field('paragraph_c_five');
                                                    $paragraph_c_six = get_field('paragraph_c_six');
                                                    $paragraph_c_seven = get_field('paragraph_c_seven');
                                                    $paragraph_c_eight = get_field('paragraph_c_eight');
                                                    $paragraph_c_nine = get_field('paragraph_c_nine');
                                                    $paragraph_c_ten = get_field('paragraph_c_ten');
                                                    
                                                    ?>

                                                    <h2><?php the_field('products_&_services'); ?></h2>

                                                    <div class="accordion" id="accordionExample">

                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            <?php echo $text_box_title_c_one ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                            <?php if( get_field('text_box_image_c_one') ): ?>
                                                                                <img class="innerImageTextBox" src="<?php echo $text_box_image_c_one ?>"/>
                                                                            <?php endif; ?>
                                                                        <?php echo $paragraph_c_one ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php if( get_field('text_box_title_c_two') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        <?php echo $text_box_title_c_two ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_b_two') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php echo $text_box_image_c_two ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_two ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_three') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        <?php echo $text_box_title_c_three ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_three') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_field('text_box_image_c_three'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_three ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_four') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        <?php echo $text_box_title_c_four ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_four') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_four'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_four ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_five') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFive">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        <?php echo $text_box_title_c_five ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_five') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_five'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_five ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_six') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSix">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        <?php echo $text_box_title_c_six ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_six') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_six'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_six ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_seven') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSeven">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        <?php echo $text_box_title_c_seven ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_seven') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_seven'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_seven ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_eight') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingEight">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        <?php echo $text_box_title_c_eight ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_eight') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_eight'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_eight ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_nine') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingNine">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                        <?php echo $text_box_title_c_nine ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_nine') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_nine'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_nine ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_c_ten') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTen">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                        <?php echo $text_box_title_c_ten ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_c_ten') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_c_ten'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_c_ten ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        
                                                    </div>

                                            


                                        
                                        </div>
                                </div>
                                <!-- content end -->
                            </section>

                        </div>
                        <div class="tab-pane fade" style="opacity:1 !important;" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            
                        <section class="w-100">
                                <!-- content 1 -->
                                <div class="card-directory content-center mt-4 mb-4 mobile-card-h">
                                        <div class="w-100 bg-white">

                                        <?php 
                                                    
                                                    $text_box_title_d_one = get_field('text_box_title_d_one'); 
                                                    $text_box_title_d_two = get_field('text_box_title_d_two');
                                                    $text_box_title_d_three = get_field('text_box_title_d_three');
                                                    $text_box_title_d_four = get_field('text_box_title_d_four');
                                                    $text_box_title_d_five = get_field('text_box_title_d_five'); 
                                                    $text_box_title_d_six = get_field('text_box_title_d_six'); 
                                                    $text_box_title_d_seven = get_field('text_box_title_d_seven'); 
                                                    $text_box_title_d_eight = get_field('text_box_title_d_eight'); 
                                                    $text_box_title_d_nine = get_field('text_box_title_d_nine'); 
                                                    $text_box_title_d_ten = get_field('text_box_title_d_ten'); 
                    
                                                    $text_box_image_d_one = get_field('text_box_image_d_one'); 
                                                    $text_box_image_d_two = get_field('text_box_image_d_two');
                                                    $text_box_image_d_three = get_field('text_box_image_d_three');
                                                    $text_box_image_d_four = get_field('text_box_image_d_four');
                                                    $text_box_image_d_five = get_field('text_box_image_d_five');
                                                    $text_box_image_d_six = get_field('text_box_image_d_six');
                                                    $text_box_image_d_seven = get_field('text_box_image_d_seven');
                                                    $text_box_image_d_eight = get_field('text_box_image_d_eight');
                                                    $text_box_image_d_nine = get_field('text_box_image_d_nine');
                                                    $text_box_image_d_ten = get_field('text_box_image_d_ten');

                                                    $paragraph_d_one = get_field('paragraph_d_one'); 
                                                    $paragraph_d_two = get_field('paragraph_d_two'); 
                                                    $paragraph_d_three = get_field('paragraph_d_three'); 
                                                    $paragraph_d_four = get_field('paragraph_d_four'); 
                                                    $paragraph_d_five = get_field('paragraph_d_five');
                                                    $paragraph_d_six = get_field('paragraph_d_six');
                                                    $paragraph_d_seven = get_field('paragraph_d_seven');
                                                    $paragraph_d_eight = get_field('paragraph_d_eight');
                                                    $paragraph_d_nine = get_field('paragraph_d_nine');
                                                    $paragraph_d_ten = get_field('paragraph_d_ten');
                                                    
                                                    
                                                    ?>

                                                    <h2><?php the_field('about_company'); ?></h2>

                                                    <div class="accordion" id="accordionExample">

                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            <?php echo $text_box_title_d_one ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                            <?php if( get_field('text_box_image_a_one') ): ?>
                                                                                <img class="innerImageTextBox" src="<?php echo $text_box_image_d_one ?>"/>
                                                                            <?php endif; ?>
                                                                        <?php echo $paragraph_d_one ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php if( get_field('text_box_title_d_two') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        <?php echo $text_box_title_d_two ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_two') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php echo $text_box_image_d_two ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_two ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_three') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        <?php echo $text_box_title_d_three ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_three') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_field('text_box_image_d_three'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_three ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_four') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        <?php echo $text_box_title_d_four ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_four') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_four'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_four ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_five') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFive">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        <?php echo $text_box_title_d_five ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_five') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_five'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_five ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_six') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSix">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        <?php echo $text_box_title_d_six ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_six') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_six'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_six ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_seven') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSeven">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        <?php echo $text_box_title_d_seven ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_a_seven') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_seven'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_seven ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_eight') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingEight">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        <?php echo $text_box_title_d_eight ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_eight') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_eight'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_eight ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_nine') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingNine">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                        <?php echo $text_box_title_d_nine ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_nine') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_nine'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_nine ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if( get_field('text_box_title_d_ten') ): ?>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTen">
                                                                    <h3 class="mb-0">
                                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                        <?php echo $text_box_title_d_ten ?><img src="/wp-content/uploads/2021/09/favicon.png" style="height:29pt;">
                                                                        </button>
                                                                    </h3>
                                                                    </div>
                                                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <p class="">
                                                                                <?php if( get_field('text_box_image_d_ten') ): ?>
                                                                                    <img class="innerImageTextBox" src="<?php the_sub_field('text_box_image_d_ten'); ?>"/>
                                                                                <?php endif; ?>
                                                                            <?php echo $paragraph_d_ten ?>
                                                                        </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        
                                                    </div>

                                            


                                        
                                        </div>
                                </div>
                                <!-- content end -->
                            </section>
                        

                        </div>
                    </div>  
                </section>

                
                <section id="gallerySection">
                    <div class="container">
                        <?php if( get_field('product_video') ): ?>
                            <a data-fancybox="" href="<?php the_field('product_video'); ?>" >
                                <img class="innerImage" src="<?php the_field('product_thumbnail'); ?>"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </section>
                
                <!-- <section id="reltedPost-sp">
                    <div class="container">
                        <h2 class="sectionTitle">
                            Featured Content
                        </h2>
                        <div class="row">
                            <?php
                                $current_post_id = get_the_ID();
                                $related_posts = get_field('featured_posts', $current_post_id);    
                                if($related_posts) {
                                    foreach($related_posts as $post) {
                                        $relatedPostname = $post_type;
                                        setup_postdata($post);
                                        $post_type = get_post_type($post);
                                        $content= get_the_excerpt();
                                ?>
                                <div class="col-md-6">
                                    <a href="<?php the_permalink(); ?>">
                                    <div class="singleRelated">
                                    
                                    <div class="leftImg">
                                        <?php the_post_thumbnail( 'full', array( 'class' => 'relatedimage' ) ); ?>
                                    </div>
                                    <div class="contentRelated">
                                    <h4><?php echo $relatedPostname; ?></h4>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php echo $content ?></p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <?php
                        
                                wp_reset_postdata();
                            }
                                }
                                ?>
                        </div>
                        </div>
                    </section> -->
            </section>
        
            <!-- cta -->
                <section id="bottomCta">
                    <div class="container">
                        <h2>Would you like to learn more about us?</h2>
                        <a href="<?php the_field('contact_us'); ?>">Get In Touch</a>
                    </div>
                </section>


        <!-- section separator a -->
        </section>
    </section>

            <!-- <section id="bottomCta">
            <div class="container">
                <h2>Would you like to learn more about us?</h2>
                <a href="/contact-us/">Get In Touch</a>
            </div>
        </section> -->
    <!-- cut off -->
        </div>
        </div>

    <?php else: ?>

        <?php if ( 'on' == get_field('paid_version') ): ?>     
                    <?php else: ?>  
                        <div class="url_end"><a href="/cell-and-gene-directory-form/">Own this company? Get in touch with us to update and unlock all the directory features</a></div>
                    <?php endif; ?>

            
            </div>
        </div>
            </section>
            
        
    <?php endif; ?>



<?php get_footer();?>















