<?php get_header(); ?>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="#">Features</a><i class="icon-angle-right"></i></li>
				
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		
		
		<!-- end divider -->
		<!-- Lists -->
		
		<!-- divider -->
		
		<!-- end divider -->
		<div class="row">
			<div class="col-md-12">
              <div class="internal_content">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php the_content(); ?>
                            <?php endwhile; ?>
                            <?php else : ?>
                        <h3><?php _e('404 Error&#58; Not Found'); ?></h3>
                   <?php endif; ?>
			      <h2></h2>
			  </div>
				
			</div>
			
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
	
	</div>
	</section>
	<?php get_footer(); ?>