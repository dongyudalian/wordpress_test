<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_template_part('jaime/jaime_calendar');
get_template_part('ajax/jaime_ajax');
get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<p style="text-align: center; margin-top:-80px"><b>Input a test name:</b></p>
<form style="text-align: center; margin-top:-80px"> 
<input type="text" onkeyup="showHint(this.value)">
</form>
<p style="text-align: center; margin-top:-60px" id="txtHint"><b>return: </b></p>

<?php 
if ( have_posts() ) {
	echo '  <form style="text-align: center; margin-top:-60px">
					<select name="users" onchange="showSite(this.value)">
					<option value="">select a post</option>
			';

	while ( have_posts() ) {
		the_post();
		echo '
			<option value="'.get_the_id().'">'.get_the_title().'</option>
		';
	}
	echo '
		</select>
		</form>
	';
}
?>

<div class="wrapper">
	
	<div id="txtHint_sql" style="text-align: center; margin-top:-60px"><b>Show your post: </b></div><br>
    <!-- xxxx年xx月を表示 -->
    <h1 id="header"></h1>
    <!-- ボタンクリックで月移動 -->
    <div id="next-prev-button">
        <button id="prev" onclick="prev()">‹</button>
        <button id="next" onclick="next()">›</button>
    </div>
    <!-- カレンダー -->
    <div id="calendar"></div>
</div>
<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
