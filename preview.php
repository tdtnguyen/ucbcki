<?php
	/** Project Name: UCBCKI Under Construction
	 ** Website Home (index.php)
	 **
	 ** Author: Jerry Bao (jbao@berkeley.edu)
	 ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
	 ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
	 ** Author: Sock Ryu (cki.sock@gmail.com)
	 ** 
	 ** CIRCLE K INTERNATIONAL
	 ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
	 **/
	$pageTitle = "Home";
  ini_set('display_errors', 1);
  require_once "admin/dbfunc.php";
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
  $blogdb = new BlogFunctions;
  $todayevents = $eventdb->getEventsByDate(strtotime('today midnight'));
  $start = 0;
  $numposts = 2;
  $posts = $blogdb->getRecentPosts($start,$numposts);
?>

<!DOCTYPE html>
<html>
<head>
	<? require_once "header.php"; ?>
</head>
<body>
	<div id="banner" class="jumbotron">
		<div class="container">
	    <h1>Building a better tomorrow</h1>
	    <h4>Circle K is one of the largest service organizations on campus. Join us today! </h4>
	    <a href="/~circlek/About/about.php">Learn more about CKI</a>
    </div>
	</div><!-- /.jumbotron -->

	<div class="row highlights">
		<div class="col-md-1"></div>
		<div class="col-md-7 announcements">
			<!-- go to js/script.js to change carousel settings -->
			<div id="carousel" class="autoplay transparent">
		    <div>
		    	<img src="/~circlek/images/graphics/committees2.png" alt="" >
		    </div>
		    <div>
		    	<img src="/~circlek/images/graphics/kfammeetings.png" alt="" >
		    </div>
		    <div>
		    	<img src="/~circlek/images/old/momseptember.png" alt="" >
		    </div>
		    <div>
		    	<img src="/~circlek/images/old/momsummer-01.png" alt="" >
		    </div>
		    <div>
		    	<img src="/~circlek/images/old/ckinorth.jpg" alt="" >
		    </div>
		    <div>
		    	<img src="/~circlek/images/old/ftc.jpg" alt="" >
		    </div>
		 	</div><!-- /.carousel -->
		</div>
		<div class="col-md-3 overlay club-stats">
			<h2>UCBCKI <span>by the numbers</span></h2>
			<? $totalHours = $userdb->getTotalHours("all", null, strtotime("27 August 2014")); ?>
			<h2><?= number_format($totalHours['service_hours']) ?> <span>service hours*</span></h2>
			<h2><?= number_format($totalHours['admin_hours']) ?> <span>leadership hours*</span></h2>
			<h2><?= number_format($totalHours['social_hours']) ?> <span>fellowship hours*</span></h2>
			<? $duesPaid = $userdb->getUsers("dues_paid"); ?>
			<h2><?= count($duesPaid); ?> <span>active members</span></h2>
			<? $eventsMonth = $eventdb->getEventsByMonth(strtotime("1 " . date("F Y"))); ?>
			<h2><?= count($eventsMonth); ?> <span>events this month</span></h2>
			<p>*Data from August 27, 2014 to present.</p>
		</div>
		<div class=" col-md-1"></div>
	</div>

	<div class="container">
		<div class="row">
			<h1 class="headings" align="middle">Want to get involved? Sign up for events!</h1>
			<div class="col-sm-4 postit tilted">
				<div id="featured1">
					<? 
						$event_id = 1126; // update event_id regularly!
						$featured = $eventdb->getEventInfo($event_id);
					?>
					<h3>*Upcoming* <strong><? echo $featured['name']; ?></strong></h3>
					<p><? echo date("D, F j, g:i A", $featured['start_datetime']); ?></p>
					<p class="description"><? echo $featured['description'];?></p>
					<a onClick="javascript:modalOpen(<?= $featured['event_id'] ?>);">Read more</a>
				</div>
			</div>
			<div class="col-sm-4 postit tilted">
				<div id="today">
					<h3><strong>Today, <? echo date("F j"); ?></strong></h3>
				<? if ($todayevents) { ?>
		    <? foreach ($todayevents as $event) { ?>
			    <p>
			      <? echo date("g:i A",$event['start_datetime']); ?><a onClick="javascript:modalOpen(<?= $event['event_id'] ?>);"> <? echo $event['name']; ?></a>
			    </p>
		    <? } ?>
		    <? } else { ?>
			    <h3 id="no-events">No events!</h3>
			    <? } ?>
			    <a class="btn btn-default" role="button" href="/~circlek/Calendar/calendar.php"><strong>Go to calendar &raquo;</strong></a>
			  </div>
			</div>
			<div class="col-sm-4 postit tilted">
				<div id="featured2">
					<? 
						$event_id = 1092; // update event_id regularly!
						$featured = $eventdb->getEventInfo($event_id);
					?>
					<h3>*Upcoming* <strong><? echo $featured['name']; ?></strong></h3>
					<p><? echo date("D, F j, g:i A", $featured['start_datetime']); ?></p>
					<p class="description"><? echo $featured['description'];?></p>
					<a onClick="javascript:modalOpen(<?= $featured['event_id'] ?>);">Read more</a>
				</div>
	  	</div>
	  </div>
	</div>
	<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

	<div class="container">
		<h1 class="headings" align="middle">Check out <a href="/~circlek/blog.php">our blog</a>! Here are some of our latest posts.</h1>
	</div>
	<div id="blog-preview">
		<? foreach ($posts as $post) { ?>
		<div class="overlay container">
	    <div class="blog-post">
	    	<div class="blog-content col-md-8"></div>
	      <h2 class="blog-post-title"><a href=<?echo "blogpost.php?id=".$post['post_id'];?>><?= $post['title'];?></a></h2>
	      <p class="blog-post-meta">Posted <?= date("F d, Y, h:i A",$post['publish_datetime']);?> by <a href="#"><? $author=$userdb->getUserInfo($post['author_id']); echo $author['first_name']; echo " "; echo $author['last_name']; ?></a></p>
	      <p><?= $post['story'];?></p>
	    </div><!-- /.blog-post -->
	  </div><!-- /.blog-main -->
	 </div>
	 <? } ?>
	<div class="container">
		<h1 class="headings" align="middle">Find us on social media.</h1>
	</div>

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