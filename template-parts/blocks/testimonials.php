<?php
/**
* Bootstrap ACF While Loop Modals
*/

// *Repeater
// modal_repeater
// *Sub-Fields
// modal_header
// modal_body
// modal_footer


        $testimonial_quote = get_field('testimonial_quote');
        $testimonial_image = get_field('testimonial_image');
        $testimonial_name = get_field('testimonial_name');
        $testimonial_position = get_field('testimonial_position');
        $testimonial_colour_border = get_field('testimonial_colour_border');
        $testimonial_background_color = get_field('testimonial_background_color'); 
        
	?>

<div id="testimonial_001" class=""> 
      
        <div class="item_data">
                
                <div class="content_section testimonial_container" style="background-color: <?php echo $testimonial_background_color; ?>">
                    <div class="testimoial_quote">
                        <q><?php echo $testimonial_quote; ?></q>
                    </div>
                    <div class="image_section_testimonial">
                            <div class="testimonial_img" style="background-image:url('<?php echo $testimonial_image; ?>'); border:solid thin <?php echo $testimonial_colour_border; ?>;">
                                <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_circle.png" alt="icon_img" />
                            </div>
                                <div class="title">
                                    <h4 style="margin-bottom: 0px;"><?php echo $testimonial_name ; ?></h4>
                                </div>
                                <div class="person_detail body2">
                                               <?php echo $testimonial_position; ?>
                               </div>
                    </div>
                        
                                    
                           
                </div>
                   
        </div>

</div>