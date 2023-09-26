
<div class="container content-center">
    <div class="card-center">

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

        // check if the repeater field has rows of data
        if( have_rows('pricing_block') ):
            $i = 1; // Set the increment variable
            // loop through the rows of data
            while ( have_rows('pricing_block') ) : the_row(); 

            $pricing_block = get_field('pricing_block'); 
            $button_url = get_field('button_url');
            $button_text = get_field('button_text');
            $button_colour = get_field('button_colour');

            $title = get_sub_field('title');
            $title_text_block = get_sub_field('title_text_block');
            $price_row = get_sub_field('price_row');
            $pricing_colour_background = get_sub_field('pricing_colour_background');

            $price_row_label = get_sub_field('price_row_label');
            $price_row_number = get_sub_field('price_row_number');
            $text_colour = get_sub_field('text_colour');

	?>

            <div class="card-animate mb-5"> 
                <div class="card-header card__top"  style="background-color:<?php echo $pricing_colour_background ?>;">
                <h5 class="card-title-main"><?php echo $title;?></h5>
                <p class="card-text"><?php echo $title_text_block;?></p>
                </div>
                
                        <div class="card__bottom">
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

                                // check if the repeater field has rows of data
                                if( have_rows('price_row') ):
                                    $i = 1; // Set the increment variable
                                    // loop through the rows of data
                                    while ( have_rows('price_row') ) : the_row(); 

                                    $price_row_label = get_sub_field('price_row_label');
                                    $price_row_number = get_sub_field('price_row_number');
                                    $text_colour = get_sub_field('text_colour');

                            ?>

                                <div class="card-bodybottom">
                                    <h5 class="card-subtitle" style="color:<?php echo $text_colour ?>;"><?php echo $price_row_label;?></h5>
                                    <h5 class="card-subtitle" style="color:<?php echo $text_colour ?>;"><?php echo $price_row_number;?></h5>
                                </div>
                            <?php   $i++; // Increment the increment variable
                                
                            endwhile; //End the loop 

                            else :

                            // no rows found

                            endif;

                            ?>    
                        </div>
            </div>

        <?php   $i++; // Increment the increment variable
	
        endwhile; //End the loop 

        else :

        // no rows found

        endif;

        ?>

    </div>
    <a href="<?php echo $button_url; ?>" class="btn btn-danger" role="button" style="background-color:<?php echo $button_colour ?>;"><?php echo $button_text;?></a>
</div>