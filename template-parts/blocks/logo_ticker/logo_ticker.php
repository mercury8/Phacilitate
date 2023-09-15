<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 customer-logos slider">

            <?php


if( have_rows('slide') ):
	$i = 1; // Set the increment variable
 	// loop through the rows of data
    while ( have_rows('slide') ) : the_row();

        $logos = get_sub_field('logos');

	?>

            <div class="slide">
                    <img src="<?php echo $logos; ?>" alt="logos_img" />
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


