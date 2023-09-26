<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); 

global $wp_query;
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="search_main">
				<div class="container">
					<div class="search_main_wrapper">
						
						<div class="search_main_form m-auto">
							<?php get_search_form(); ?>
							<!-- <a href="javascript:void(0)" class="search-close">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="12" cy="12" r="12" fill="white" fill-opacity="0.8"/>
									<path d="M16.2008 8.64678L15.3548 7.80078L12.0008 11.1548L8.64678 7.80078L7.80078 8.64678L11.1548 12.0008L7.80078 15.3548L8.64678 16.2008L12.0008 12.8468L15.3548 16.2008L16.2008 15.3548L12.8468 12.0008L16.2008 8.64678Z" fill="#434343" fill-opacity="0.4"/>
								</svg>
							</a> -->
						</div>

						<?php // if ( have_posts() ) : ?>

							<div class="tabs">
								<ul class="tabs-nav">
									
									<li class="active"><a href="#all">All</a></li>
									<li ><a href="#insights">Insights and Resources</a></li>
									<li><a href="#events">Events</a></li>
									<li><a href="#news">News</a></li>
									<li><a href="#explore">Explore</a></li>
								</ul>								
								<div class="tabs-stage">
								<div id="all" class="Search_list" >
										<?php 
										$postQuery = new WP_Query(array(
											'nopaging' => true,
											'post_type'        =>  'post',
											'post_status'    => 'publish',
											'fields' => 'ids',
											// 'content_type' =>'insight',
											
											's' => get_search_query(),
											// 'date_query' => array(
											// 	array(
											// 		'after'     => 'January 1st, 2022',
											// 		'before'    => 'January 1st, 2024',
											// 		'inclusive' => true,
											// 	),
											// ),
										));
										$postList = $postQuery->posts;
										// $maxPages = $postQuery->max_num_pages;
										// echo '<pre>'; print_r( $postList ); echo '</pre>';
										if( count( $postList ) > 0 ):
										?>
										
										<div class="search_count"><?php echo $postQuery->found_posts.' results found'; ?></div>
										<h6 class="heading h6">Explore</h6>
										<?php
											foreach ( $postList as $key => $post_id ) {
												set_query_var( 'post_id', $post_id );
												get_template_part( 'template-parts/content', 'search' );
											}
										else:
											get_template_part( 'template-parts/content', 'none' );				
										endif; 
										?>										
									</div>
									<div id="insights" class="Search_list" style="display: none;">
										<?php 
										$postQuery = new WP_Query(array(
											'nopaging' => true,
											'post_type'        => 'insight',
											
											'post_status'    => 'publish',
											'fields' => 'ids',
											// 'content_type' => 'insight',
											's' => get_search_query(),
											// 'date_query' => array(
											// 	array(
											// 		'after'     => 'January 1st, 2022',
											// 		'before'    => 'December 31st, 2023',
											// 		'inclusive' => true,
											// 	),
											// ),
											
											
										));
										$postList = $postQuery->posts;
										// $maxPages = $postQuery->max_num_pages;
										// echo '<pre>'; print_r( $postList ); echo '</pre>';
										if( count( $postList ) > 0 ):

										?>
										<div class="search_count"><?php echo $postQuery->found_posts.' results found'; ?></div>
										<h6 class="heading h6">Insights</h6>
										<?php
											foreach ( $postList as $key => $post_id ) {
												set_query_var( 'post_id', $post_id );
												get_template_part( 'template-parts/content', 'search' );
											}										
										else:
											get_template_part( 'template-parts/content', 'none' );				
										endif;
										?>										
									</div>
									<div id="events" class="Search_list" style="display: none;">
										<?php 
										$postQuery = new WP_Query(array(
											'nopaging' => true,
											'post_type'        => 'post',
											'post_status'    => 'publish',
											'fields' => 'ids',
											'category_name' => 'events',
											// 'orderby' => 'date',
											'date_query' => array(
												array(
													'after'     => 'January 1st, 2022',
													'before'    => 'December 31st, 2023',
													'inclusive' => true,
												),
											),

											
											's' => get_search_query(),
										));
										
										$postList = $postQuery->posts;


										// $maxPages = $postQuery->max_num_pages;
										// echo '<pre>'; print_r( $postList ); echo '</pre>';
										if( count( $postList ) > 0 ):
										?>
										<div class="search_count"><?php echo $postQuery->found_posts.' results found'; ?></div>
										<h6 class="heading h6">Events</h6>
										<?php
											foreach ( $postList as $key => $post_id ) {
												set_query_var( 'post_id', $post_id );
												get_template_part( 'template-parts/content', 'search' );
											}											
										else:
											get_template_part( 'template-parts/content', 'none' );				
										endif;
										?>										
									</div>
									<div id="news" class="Search_list" style="display: none;">
									<?php 
										$postQuery = new WP_Query(array(
											'nopaging' => true,
											'post_type'        => 'post',
											'post_status'    => 'publish',
											'fields' => 'ids',
											// 'category_name' => 'news',
											'content_type' => 'news',
											's' => get_search_query(),
											'date_query' => array(
												array(
													'after'     => 'January 1st, 2022',
													'before'    => 'December 31st, 2023',
													'inclusive' => true,
												),
											)
										));
										$postList = $postQuery->posts;
										// $maxPages = $postQuery->max_num_pages;
										// echo '<pre>'; print_r( $postList ); echo '</pre>';
										if( count( $postList ) > 0 ):
									?>
										<div class="search_count"><?php echo $postQuery->found_posts.' results found'; ?></div>
										<h6 class="heading h6">News</h6>
										<?php
											foreach ( $postList as $key => $post_id ) {
												set_query_var( 'post_id', $post_id );
												get_template_part( 'template-parts/content', 'search' );
											}
										else:
											get_template_part( 'template-parts/content', 'none' );				
										endif;
										?>										
									</div>
									<div id="explore" class="Search_list" style="display: none;">
										<?php 
										$postQuery = new WP_Query(array(
											'nopaging' => true,
											'post_type'        => 'page',
											'post_status'    => 'publish',
											'fields' => 'ids',											
											's' => get_search_query(),
											'date_query' => array(
												array(
													'after'     => 'January 1st, 2022',
													'before'    => 'December 31st, 2023',
													'inclusive' => true,
												),
											)
										));
										$postList = $postQuery->posts;
										// $maxPages = $postQuery->max_num_pages;
										// echo '<pre>'; print_r( $postList ); echo '</pre>';
										if( count( $postList ) > 0 ):
										?>
										<div class="search_count"><?php echo $postQuery->found_posts.' results found'; ?></div>
										<h6 class="heading h6">Explore</h6>
										<?php
											foreach ( $postList as $key => $post_id ) {
												set_query_var( 'post_id', $post_id );
												get_template_part( 'template-parts/content', 'search' );
											}
										else:
											get_template_part( 'template-parts/content', 'none' );				
										endif; 
										?>										
									</div>
									
								</div>
							</div>

						<?php /* else :

							get_template_part( 'template-parts/content', 'none' );

						endif; */ ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
