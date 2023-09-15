<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php 
	$id = get_query_var( 'post_id' );
    // $id = get_the_ID();
    $link = get_the_permalink($id);
    $img_url = get_the_post_thumbnail_url($id);    
    $heading = get_the_title($id);
    $date = get_the_date( 'j M Y', $id);
    $short_description = get_field('short_description', $id); 
?>

<?php if (get_post_type( $id ) === 'page') { ?>
	<div class="item page">
		<div class="post_section">
			<div class="heading">
				<a class="h5" href="<?php echo $link; ?>">
					<?php echo $heading; ?>
				</a>
			</div>
			<?php if( $short_description ): ?>
				<div class="short_description">
					<?php echo $short_description; ?>
				</div>
			<?php endif; ?>
			<a href="<?php echo $link; ?>" class="link"><?php echo $link; ?></a>
		</div>
	</div>
<?php } else { ?>
	<div class="item post">
		<div class="image_section">
			<div class="post_img" style="background-image:url('<?php echo $img_url ?>')">
				<a href="<?php echo $link; ?>">
					<img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_140_140.png" alt="<?php echo $heading ?>" />
				</a>
			</div>
		</div>
		<div class="post_section">
			<div class="heading">
				<a class="h5" href="<?php echo $link; ?>">
					<?php echo $heading; ?>
				</a>
			</div>
			<?php if( $short_description ): ?>
				<div class="short_description">
					<?php echo wp_trim_words($short_description, 12,''); ?>
				</div>
			<?php endif; ?>
			<div class="icon_list">
				<div class="date icon_list_item">
					<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 2H17V0H15V2H5V0H3V2H2C0.9 2 0 2.9 0 4V20C0 21.1 0.9 22 2 22H18C19.1 22 20 21.1 20 20V4C20 2.9 19.1 2 18 2ZM18 20H2V9H18V20ZM18 7H2V4H18V7Z" fill="#83AC16"/>
					</svg>
					<?php echo $date; ?>
				</div>
				<div class="time icon_list_item">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20Z" fill="#83AC16"/>
						<path d="M12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z" fill="#83AC16"/>
					</svg>
					<?php echo get_the_time( 'G:i', $id); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
