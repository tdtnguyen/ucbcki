<?php
	/** Project Name: UCBCKI Under Construction
	 ** Website Home (index.php)
	 **
	 ** Author: Jerry Bao (jbao@berkeley.edu)
	 ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
	 ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
	 ** Author: Sock Ryu (cki.sock@gmail.com)
	 ** Author: Tao Ong (cki.taoong@gmail.com)
	 **
	 ** CIRCLE K INTERNATIONAL
	 ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
	 **/
	$pageTitle = "Home";
  require_once "admin/dbfunc.php";
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
  $blogdb = new BlogFunctions;
  $todayevents = $eventdb->getEventsByDate(strtotime('today midnight'));
  $start = 0;
  $numposts = 3;
  $posts = $blogdb->getRecentPosts($start,$numposts);
	$totalHours = $userdb->getTotalHours("all", null, strtotime("March 1 2016"));
?>

<!DOCTYPE html>
<html>
<head>
	<? require_once "header.php"; ?>
</head>
<body>


	<header>
			<div class="header-content">
					<div class="header-content-inner">
							<p> </p>
							<a href="https://www.ocf.berkeley.edu/~circlek/calendar/calendar.php" class="btn btn-primary btn-xl page-scroll">Get Involved</a>
					</div>
			</div>
	</header>

	<section class="bg-primary" id="about">
			<div class="container">
					<div class="row">
							<div class="col-lg-8 col-lg-offset-2 text-center">
									<h2 class="section-heading">What is Circle K International?</h2>
									<hr class="light">
									<p class="text-faded">Circle K is the largest collegiate community service, leadership development, and friendship organization in the world. Circle K clubs are organized and sponsored by a Kiwanis club on a college or university campus. With more than 13,770 members in 17 nations, CKI is making a positive impact on the world every day.</p>
									<a href="https://www.ocf.berkeley.edu/~circlek/about/about.php" class="page-scroll btn btn-default btn-xl sr-button">Find out more</a>
							</div>
					</div>
			</div>
	</section>




	<section class="no-padding" id="recent-events">

			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-center">
						<h2 class="section-heading"></br>Events</h2>
						<hr class="light">
						<p class="text-faded">Check out what our members have been up to</p>
					</div>
				</div>
			</div>



			<div class="container" id="recent-events-gallery">
					<div class="row popup-gallery">
							<div class="col-lg-4 col-md-12">
									<a class="portfolio-box">
											<img src="/~circlek/images/pictures/events/event1.jpg" class="img-responsive" alt="">
											<div class="portfolio-box-caption">
													<div class="portfolio-box-caption-content">
															<div class="project-category text-faded">
																	February 11, 2017
															</div>
															<div class="project-name">
																	District Large-Scale Service Project
															</div>
													</div>
											</div>
									</a>
									<h3 style="text-align: center">DLSSP</h3>
									<p>CNH District hosted a large scale service project for all clubs in the North to join! Members served to conserve at a local Albany farm that aims to supply fresh organic food to those who lack access to it in the East Bay region. </p>
							</div>
							<div class="col-lg-4 col-md-12">
									<a class="portfolio-box">
											<img src="/~circlek/images/pictures/events/event2.jpg" class="img-responsive" alt="">
											<div class="portfolio-box-caption">
													<div class="portfolio-box-caption-content">
															<div class="project-category text-faded">
																	February 5, 2017
															</div>
															<div class="project-name">
																	Bridgeview Park Restoration
															</div>
													</div>
											</div>
									</a>
									<h3 style="text-align: center">Bridgeview Park Restoration</h3>
									<p>At Bridgeview we worked to maintain and promote diverse local flora! Activities included weeding, invasive plant removal, and general maintenance of the local bee garden. We also explored the possibility of setting up a water storage for the area.</p>
							</div>
							<div class="col-lg-4 col-md-12">
									<a class="portfolio-box">
											<img src="/~circlek/images/pictures/events/event3.jpg" class="img-responsive" alt="">
											<div class="portfolio-box-caption">
													<div class="portfolio-box-caption-content">
															<div class="project-category text-faded">
																	January 24, 2017
															</div>
															<div class="project-name">
																	Pieology Social
															</div>
													</div>
											</div>
									</a>
									<h3 style="text-align: center">Pieology Social</h3>
									<p>After our first general meeting of the semester, members headed over to southside to grab some pizza at Pieology!</p>
							</div>
					</div>
			</div>
	</section>


	<section class="no-padding" id="hours">
			<div class="container">
					<div class="row">
							<div class="col-lg-12 text-center">
									<h2 class="section-heading">Club Hours</h2>
									<hr class="light">
							</div>
					</div>
			</div>
			<div class="container">
					<div class="row">
							<div class="col-lg-4 col-md-12 text-center">
									<div class="service-box">
											<i class="fa fa-4x fa-globe text-primary sr-icons"></i>
											<h3>Service</h3>
											<p class="text-muted"><h2><?= number_format($totalHours['service_hours']) ?> <span>hours*</span></h2></p>
									</div>
							</div>
							<div class="col-lg-4 col-md-12 text-center">
									<div class="service-box">
											<i class="fa fa-4x fa-user text-primary sr-icons"></i>
											<h3>Leadership</h3>
											<p class="text-muted"><h2><?= number_format($totalHours['admin_hours']) ?> <span>hours*</span></h2></p>
									</div>
							</div>
							<div class="col-lg-4 col-md-12 text-center">
									<div class="service-box">
											<i class="fa fa-4x fa-heart text-primary sr-icons"></i>
											<h3>Fellowship</h3>
											<p class="text-muted"><h2><?= number_format($totalHours['social_hours']) ?> <span>hours*</span></h2></p>
									</div>
							</div>
					</div>
					<div class="row">
						<p align="center">*Data from March 1, 2016 to present.</p>
					</div>
			</div>
	</section>

	<footer>
		<div class="header-content" id="final-signup">
			<div class="header-content-inner">
				<h2>Sign up for events now!</h2>
				<a href="https://www.ocf.berkeley.edu/~circlek/calendar/calendar.php" class="btn btn-primary btn-xl sr-button">Calendar</a>
			</div>
		</div>
	</footer>

<!--
	<section>
		<div class="header-content">
			<div class="header-content-inner">
				<div id="final-signup">
						<div class="container text-center">
								<div class="call-to-action">
										<h2>Sign up for events now!</h2>
										<a href="https://www.ocf.berkeley.edu/~circlek/calendar/calendar.php" class="btn btn-default btn-xl sr-button">Calendar</a>
								</div>
						</div>
				</div>
			</div>
		</div>
	</section>
-->
	<? /* Updates
	<div style="font-family: sans-serif">
		<br>
		<p> what up board. updates below.</p>
		<p>8/17: your browser now autofills the last username logged in (yes, that means cookies). a message appears if your login is unsuccessful (try it!). thank you for sending emails--I've started inputing your content in parts of the website, like "continuous projects spotlight", "publications"</p>
		<p>8/16: renovated "board", "chair a project", and "socials" underneath mission. check them out.</p>
		<p>8/15: renovated calendar, blog, "my events" under login, "update user info". "my events" now provides access to filtered views of all your club activity. navbar in admin now has a link back to the front page. blog posting in admin is slightly different; interested parties should check it out.</p>
		<p>8/14: designed a kind of "workspace" background that ties in with construction theme</p>
		<p>8/10: spent the weekend in Canada, going camping in Ohio today. I'll be back Wednesday to answer emails and get back to work</p>
		<p>8/5: for privacy, list of event attendees is now hidden from users who are not logged in.</p>
		<p>8/4: designed footer (not shown), redesigned sticky notes, improved object responsiveness upon window resize</p>
		<p>8/3: today's events and spotlight became sticky notes</p>
		<p>8/1: added today's events & spotlight, fixed bugs in navbar and carousel</p>
		<p>7/31: watched M:I rogue nation. thumbs uppppppp</p>
		<p>7/30: added carousel. fixed navbar to top; upon scroll down navbar darkens</p>
		<p>7/28: fixed scaling on mobile devices (no longer zoomed out on mobile), fixed issue where clicking on tabs got dropdown menu stuck, most navbar links are now functional. login functionality added as well (if you log in here, you can access Admin) </p>
		<p>7/27: launched navbar and temporary banner (finished image will feature our calvin the builder, different colors) of homepage.what do you think so far? is it too impersonal? inspiration from <a href=http://www.airbnb.com>airbnb</a> as well as the SF skyline at sunrise</p>
	</div> */
	 ?>

	<? require_once "footer.php"; ?>
	<script type="text/javascript">
		var homepage = true;
		$(document).ready(function() {
			$('#carousel').slick({ // setting: autoplay
				dots: true,
				autoplay: true,
				autoplaySpeed: 6000,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
	    });
		});
	</script>
</body>
</html>
