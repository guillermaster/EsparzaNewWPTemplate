<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
		</title>
		<!-- Bootstrap -->
    	<link href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap-responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="/favicon.ico">	
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

		<?php wp_head(); ?>
	</head>
	<body>
		<div class="top-header">
			<div class="container">
				<span class="pull-right"><a href="#">Login</a></span>
			</div>
      	</div><!-- top-header -->
      	<div class="masthead">
	      	<div class="container">
	        	<div class="navbar-header">
	          		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/main-logo-esparza.png" alt="Esparza Pest Control" title="Esparza Pest Control" />
	        	</div>
	        	<div class="pull-right">
	          		<ul class="list-inline masthead-contactinfo">
						<li>
							<address>
								5602 S. Sugar Rd.,<br />
								Edinburg, TX 78539	
							</address>
						</li>
						<li><adress>Call now for FREE consultation<br /> (956) 887-1237</address></li>
					</ul>
	        	</div><!-- pull-right -->
	      	</div><!-- container -->
      	</div><!-- masthead -->
		<div class="container">
			
		        <nav class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <?php

					$menu_pars = array(
						'menu'            => '',
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'bs-example-navbar-collapse-1',
						'menu_class'      => 'nav navbar-nav navbar-right'
					);

					wp_nav_menu( $menu_pars );

					?>
				  </div><!-- /.container-fluid -->
				</nav>
		    <!-- Jumbotron -->
		    <div class="row-fluid" style="margin-bottom: 0">
			    <div class="span8">
			    	<div class="jumbotron">
			    		<div style="background: url(img/banner-header.jpg); width: 727px; height: 373px; margin: -50px 0 0 -50px;">
			    				&nbsp;
			    		</div>
					    <!-- <h1>Marketing stuff!</h1>
					    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					    <a class="btn btn-large btn-success" href="#">Get started today</a>-->
					</div>
			    </div>
			    <div class="span4">
			    	<form class="contact-home">
			    		<h2>Schedule service now</h2>
			    		<blockquote>For your convenience and immediate attention fill out the form below</blockquote>
			    		<div class="row" style="margin-bottom: 5px;">
				            <div class="col-xs-6">
				                <div class="input-group">
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				                    <input type="text" class="form-control" placeholder="Name">
				                </div>
				            </div>
				            <div class="col-xs-6">
				                <select class="form-control">
				                    <option>Type of request</option>
				                </select>
				            </div>
				        </div>
				        <div class="row" style="margin-bottom: 5px;">
				            <div class="col-xs-6">
				      			<div class="input-group">
				                  <label class="sr-only" for="exampleInputEmail2">Email address</label>
				                  <div class="input-group-addon">@</div>
				                  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
				                </div>
				                </div>
				            <div class="col-xs-6">
				                <select class="form-control">
				                    <option>Desired service</option>
				                </select>
				            </div>
				        </div>
				        <div class="row" style="margin-bottom: 5px;">
				            <div class="col-xs-6">
				                <div class="input-group">
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-screenshot"></span></span>
				                    <input type="text" class="form-control" placeholder="Address">
				                </div>
				            </div>
				            <div class="col-xs-6">
				                <div class="input-group">
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
				                    <input type="text" class="form-control" placeholder="Phone number">
				                </div>
				            </div>
				        </div>
				        <div class="row" style="margin-bottom: 5px;">
				            <div class="col-xs-6">
				                <div class="input-group">
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				                    <input type="text" class="form-control" placeholder="Desired appointment date">
				                </div>
				            </div>
				            <div class="col-xs-6">
				                <div class="input-group">
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
				                    <input type="text" class="form-control" placeholder="Desired appointment time">
				                </div>
				            </div>
				        </div>
				        <p><a href="#" class="btn btn-primary btn-large">Get started &raquo;</a></p>
			    	</form>
			    </div>
			</div>
		    <hr />