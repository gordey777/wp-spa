<?php get_header(); 

 get_template_part('templates/page', 'header'); ?>
	<div id="content" class="container">
   	<div class="row">
    <div class="main <?php echo kadence_main_class(); ?>" role="main">
    	<div class="postclass pageclass clearfix entry-content" itemprop="mainContentOfPage">
			<?php get_template_part('templates/content', 'page'); ?>
		</div>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
		<?php do_action('kadence_page_footer'); ?>
</div><!-- /.main -->
  <?php get_footer(); ?>