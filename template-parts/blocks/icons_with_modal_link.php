
<div class="container"> 
            <div class="icons_with_modal_inner">
                <div class="icon_with_modal_list">

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
if( have_rows('icon_list') ):
	$i = 1; // Set the increment variable
 	// loop through the rows of data
    while ( have_rows('icon_list') ) : the_row();
		
		$modal_header = get_sub_field('modal_header');
		$modal_body = get_sub_field('modal_body');
		$modal_footer = get_sub_field('modal_footer');
        $icon = get_sub_field('icon');
        $icon_modal_header = get_sub_field('icon_modal_header');
        $background_color = get_sub_field('background_color');
        $title_color = get_sub_field('title_color');
        $btn_url = get_sub_field('btn_url');
        $btn_download = get_sub_field('btn_download');
        $download_modal_footer = get_sub_field('sub_btn_download');
        $sub_btn_url = get_sub_field('sub_btn_url');
        $sub_modal_footer = get_sub_field('sub_modal_footer');
        
	?>
	
            
                            <div class="item_icon_modal" style="background-color:<?php echo $background_color ?>;">
                                <div class="item_icon_modal_inner">            
                                    <a data-toggle="modal" data-target="#myModal-<?php echo $i;?>">
                                        <div class="icon_img" style="background-image:url('<?php echo $icon; ?>')">
                                            <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_260_260.png" alt="icon_img" />
                                        </div>
                                        <h4 class="icon_modal_header"  style="color:<?php echo $title_color ?> !important;"><?php echo $icon_modal_header;?></h4>
                                    </a>
                                </div>
                            </div>
                       
                        
                        <!-- The Modal -->
                        <div class="modal zindex_top icon_modal" id="myModal-<?php echo $i;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="">
                                    <h4 class="text-center"><?php echo $modal_header;?></h4>
                                    <button type="button" class="close pr-4 d-flex justify-content-end" data-dismiss="modal">×</button>
                                </div>
                            
                                <!-- Modal body -->
                                <div class="modal-body m-4">
                                <?php echo $modal_body; ?>
                                </div>
                            
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                   
                                    <?php if( get_sub_field('button_switch') ): ?>
                                        
                                        <?php if( get_sub_field('btn_url') ): ?>
                                            <a href="<?php echo $btn_url; ?>" class="btn btn-danger" role="button"><?php echo $modal_footer; ?></a>
                                        <?php endif; ?>                   

                                        <?php else: ?>
                                    
                                        <?php if( get_sub_field('sub_btn_url') ): ?>
                                        <a href="<?php echo $sub_btn_url; ?>" class="btn btn-danger" role="button"><?php echo $sub_modal_footer; ?></a>
                                        <p><a href="<?php echo $btn_download; ?>" class="" ><?php echo $download_modal_footer; ?></a></p>
                                        <?php endif; ?> 

                                    <?php endif; ?>
                                    
                                </div>

                                <!-- switch -->

                                


                                </div>
                            </div>
                        </div>
                


	<?php   $i++; // Increment the increment variable
	
	endwhile; //End the loop 

else :

    // no rows found

endif;

?>

</div>
</div>
</div>