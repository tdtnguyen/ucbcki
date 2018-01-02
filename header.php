<head>
	<?php
	/** Project: UCBCKI Under Construction
	 ** Website Header (header.php)
	 **
	 ** Author: Sock Ryu (cki.sock@gmail.com)
	 ** Author: Tao Ong (cki.taoong@gmail.com)
	 **
	 ** CIRCLE K INTERNATIONAL
	 ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
	 **/
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Circle K, UC Berkeley, UCBCKI, Kiwanis">
	<!-- Open Graph protocol -->
	<meta property="og:url" content="https://www.ocf.berkeley.edu/~circlek/index.php"/>
	<meta property="og:title" content="UC Berkeley Circle K"/>
	<meta property="og:description" content="UC Berkeley Circle K is one of the largest service organizations on campus. We offer service events to assist communities both near and far, as well as countless leadership and fellowship opportunities. All are welcome!" />
	<meta property="og:image" content="https://www.ocf.berkeley.edu/~circlek/images/tetris_banner.png" />

	<title>UCBCKI <?= $pageTitle; ?></title>
	<link rel="icon" type="image/png" href="/~circlek/images/logos/logo_CKI_seal_small.png">
	<!-- Custom Fonts -->
	<link rel="stylesheet" type='text/css' href="/~circlek/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
	<link href='//fonts.googleapis.com/css?family=Indie+Flower|Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type='text/css' href="/~circlek/css/bootstrap.min.css">
	<!-- Slick Carousel CSS -->
	<link rel="stylesheet" type="text/css" href="/~circlek/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/~circlek/slick/slick-theme.css"/>
	<!-- Full Calendar CSS -->
	<link rel="stylesheet" type='text/css' href="/~circlek/css/fullcalendar.css">
	<link rel="stylesheet" type='text/css' href="/~circlek/css/fullcalendar.print.css" media='print'>
	<!-- JQuery UI CSS -->
	<!-- <link href="/~circlek/jquery-ui/jquery-ui.css" rel="stylesheet"> -->
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="/~circlek/css/stylesheet-temp.css" media="all">

	<?php
		if(!isset($_SESSION))
		{
			session_start();
		}
		function randomPage() {
			$pageid  = rand(0, 17);
			switch ($pageid) {
				case 0: return "about/about.php";
				case 1: return "committees/tech.php";
				case 2: return "tenets/contproj.php";
				case 3: return "tenets/singleserve.php";
				case 4: return "tenets/chairaproject.php";
				case 5: return "tenets/board.php";
				case 6: return "tenets/family.php";
				case 7: return "tenets/socials.php";
				case 8: return "committees/pr.php";
				case 9: return "committees/hist.php";
				case 10: return "committees/kfam.php";
				case 11: return "committees/proj.php";
				case 12: return "committees/md.php";
				case 13: return "committees/spirit.php";
				case 14: return "committees/sserve.php";
				case 15: return "committees/publ.php";
				case 16: return "committees/fund.php";
				case 17: return "committees/mre.php";

				default: return "calendar/calendar.php";
			}
	 	}
	?>
</head>
<body <? if (isset($_SESSION['error_login'])) { ?>onload="loginOpen()"<? } ?>>
	<!-- Loading animation during page load -->
	<!-- <div id="loading">
	  <p><i class="fa fa-cog fa-spin fa-5x"></i></p>
	</div> -->
	<!-- Navbar -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <!-- Magic Gamepad -->
	      <a class="navbar-brand" id="random" title="Explore" href="/~circlek/<? echo randomPage(); ?>"><i class="fa fa-cutlery fa-fw"></i></a>
	      <a class="navbar-brand" href="/~circlek/index.php" title="Home">UC Berkeley Circle K</a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
					<li><a href="/~circlek/calendar/calendar.php">Calendar</a></li>
	      	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<i class="fa fa-angle-down fa-fw"></i></a>
	          <ul class="dropdown-menu">
		          <li><strong>Our Club</strong></li>
	          	<li><a href="/~circlek/about/about.php">About Us</a></li>
	          	<!-- Need to create History page -->
	          	<!-- <li><a href="#">History</a></li> -->
	          	<li><a href="https://www.facebook.com/pages/UC-Berkeley-Circle-K/201581529880338?sk=photos_stream&tab=photos_albums" target="_blank"><i class="fa fa-picture-o fa-fw"></i> Image Gallery</a></li>
	          	<li role="separator" class="divider"></li>
	            <li><strong>Our Family</strong></li>
	            <li><a href="http://berkeleykiwanis.org/">Berkeley Kiwanis Club</a></li>
	            <li><a href="https://dvccki.wixsite.com/webs">Diablo Valley College Circle K</a></li>
	            <li><a href="http://www.cnhcirclek.org/divisions/golden-gate/"><i class="fa fa-map-pin fa-fw"></i> Golden Gate Division </a></li>
	            <li><a href="http://cnhcirclek.org/"><i class="fa fa-map-marker fa-fw"></i> CNH District </a></li>
	            <li><a href="http://www.circlek.org/home.aspx"><i class="fa fa-globe fa-fw"></i> Circle K International </a></li>
	            <li><a href="http://www.kiwanis.org/"><i class="fa fa-sitemap fa-fw"></i> Kiwanis International </a></li>
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tenets<i class="fa fa-angle-down fa-fw"></i></a>
	          <ul class="dropdown-menu">
	          	<li><strong>Service</strong></li>
	            <li><a href="/~circlek/tenets/contproj.php">Continuous Projects Spotlight</a></li>
	            <li><a href="/~circlek/tenets/singleserve.php">Single Service Spotlight</a></li>
	            <li><a href="http://www.cnhcirclek.org/about/fundraising-initiatives/"><i class="fa fa-money fa-fw"></i> District Funding Initiatives</a></li>
	            <li><a href="http://www.cnhcirclek.org/about/service-initiatives/">District Service Initiatives</a></li>
	            <li role="separator" class="divider"></li>
	            <li><strong>Leadership</strong></li>
	          	<li><a href="/~circlek/tenets/board.php">Board Roster</a></li>
	          	<li><a href="/~circlek/tenets/chairaproject.php">Chair a Project</a></li>
	            <li><a href="/~circlek/tenets/chairasocial.php">Chair a Social</a></li>
	          	<li role="separator" class="divider"></li>
	            <li><strong>Fellowship</strong></li>
	          	<li><a href="/~circlek/tenets/socials.php">Socials Spotlight</a></li>
							<li><a href="/~circlek/tenets/family.php">Family System</a><li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Committees<i class="fa fa-angle-down fa-fw"></i></a>
	          <ul class="dropdown-menu">
	          	<li><a href="/~circlek/committees/fund.php">Fundraising</a></li>
	            <li><a href="/~circlek/committees/kfam.php">Kiwanis Family</a></li>
	            <li><a href="/~circlek/committees/md.php">Membership Development</a></li>
				<li><a href="/~circlek/committees/mre.php">Membership Education</a></li>
				<li><a href="/~circlek/committees/hist.php">Multimedia</a></li>
	            <li><a href="/~circlek/committees/pr.php">Public Relations</a></li>
	            <li><a href="/~circlek/committees/publ.php">Publications</a></li>
	            <li><a href="/~circlek/committees/proj.php">Projects</a></li>
	            <li><a href="/~circlek/committees/sserve.php">Single Service</a></li>
	            <li><a href="/~circlek/committees/spirit.php">Spirit & Social</a></li>
	            <li><a href="/~circlek/committees/tech.php">Technology</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources<i class="fa fa-angle-down fa-fw"></i></a>
	          <ul class="dropdown-menu">
	            <li><a href="/~circlek/resources/acronyms.php">Acronyms</a></li>
	          	<li><a href="http://tinyurl.com/membership1718" target="_blank"></i>Membership Application</a></li>
	          	<li><a href="http://resources.cnhcirclek.org/" target="_blank"><i class="fa fa-folder-open fa-fw"></i> District Resources</a></li>
				<li><a href="http://circlek.org/Resources.aspx" target="_blank"><i class="fa fa-folder-open fa-fw"></i> International Resources</a></li>
	          	<li><a href="http://ftc.cnhcirclek.org" target="_blank">Fall Training Conference</a></li>
	          	<li><a href="http://dcon.cnhcirclek.org/" target="_blank">District Convention</a></li>
				<li><a href="http://www.cnhcirclek.org/committees/fifun/crazy-kompetition-2017-games-playbook/" target="_blank">Crazy Kompetition for Infants - North</a><li>
                <li><a href="https://www.facebook.com/events/136408833700712/">DLSSP - North</a><li>
	          </ul>
	        </li>

	        <!-- checks whether user is logged in -->
	        <? if (isset($_SESSION['nimbus_user_id'])) { ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	          	<i class="fa fa-user fa-fw"></i>
	          	<?= $_SESSION['nimbus_first_name'] ?>
	          	<?= $_SESSION['nimbus_last_name'] ?>
	           	<i class="fa fa-angle-down fa-fw"></i>
	          </a>
	          <ul class="dropdown-menu">
	            <? if ($_SESSION['nimbus_access'] > 0) { ?>
	            <li><a href="/~circlek/admin/index.php"><i class="fa fa-certificate fa-fw"></i> Admin </a></li>
	            <? } ?>
	            <li><a href="/~circlek/selfinfo/events.php"><i class="fa fa-info-circle fa-fw"></i> My Events </a></li>
	            <li><a href="/~circlek/selfinfo/mrp.php"><i class="fa fa-users fa-fw"></i> My MRP Status </a></li>
	            <li><a href="/~circlek/selfinfo/updateinfo.php"><i class="fa fa-pencil fa-fw"></i> Update My Info </a></li>
	            <li><a href="/~circlek/logout.php?url=<? echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>"><i class="fa fa-sign-out fa-fw"></i> Logout </a></li>
	          </ul>
	        </li>
					<? } else { ?>
	        <li>
	        	<a class="btn" data-toggle="modal" href="#loginModal" ><i class="fa fa-user fa-fw"></i> Login</a>
	        </li>
	        <?}?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- Login Modal -->
	<div class="modal fade bs-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
	    	<br>
	    	<div class="bs-example bs-example-tabs">
	        <ul id="myTab" class="nav nav-tabs">
	          <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
	          <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
	          <li class=""><a href="#help" data-toggle="tab">Need help?</a></li>
	        </ul>
	    	</div>
	  		<div class="modal-body">
	    		<div id="myTabContent" class="tab-content">
	    			<div class="tab-pane fade in" id="help">
	    			<p></p>
		        <p></p>
		        <p><br>Please contact <a href="#">cki-webmaster@lists.berkeley.edu</a> for any other inquiries.</p>
		        </div>
	    			<div class="tab-pane fade active in" id="signin">
	        		<form action="/~circlek/login.php" method="post" enctype="multipart/form-data">
	            	<input type="hidden" name="form_submit_type" value="login">
	            	<div class="form-group">
	            		<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" autofocus <? if (isset($_COOKIE['username'])) { ?> value="<? echo $_COOKIE['username']; } ?>">
	            	</div>
	              <div class="form-group">
	                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
	              </div>
	              <!-- Remember Me: <input type="checkbox" name="rememberme" value="1"><br> -->
	              <input type="hidden" name="url" value="<? echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
	              <button type="submit" class="btn btn-lg btn-default btn-block">Login</button>
	          	</form>
	          	<? if (isset($_SESSION['error_login'])) { ?>
	            	<p id="login-error"><? echo $_SESSION['error_login']; ?></p>
	            	<? unset($_SESSION['error_login']); ?>
	          	<? } ?>
	      		</div>
	      		<div class="tab-pane fade" id="signup">
	          	<form action="/~circlek/register.php" method="post" enctype="multipart/form-data">
	              <input type="hidden" name="form_submit_type" value="create_account">
	              <div class="form-group">
	                <label>First Name</label>
	                <input type="text" name="first_name" class="form-control" required>
	              </div>
	              <div class="form-group">
	                <label>Last Name</label>
	                <input type="text" name="last_name" class="form-control" required>
	              </div>
	              <div class="form-group">
	                <label>Email Address</label>
	                <input type="email" name="email" class="form-control" required>
	              </div>
	              <div class="form-group">
	                <label>Username</label>
	                <input type="text" name="username" class="form-control" required>
	              </div>
	              <div class="form-group">
	                <label>Password</label>
	                <input required="" name="password" class="form-control" type="password" class="input-medium">
	              </div>
	              <div class="form-group">
	                <label>Phone Number</label>
	                <input type="text" name="phone" class="form-control phone" required>
	              </div>
	              <button type="submit" class="btn btn-success">Submit</button>
	              <button type="reset" class="btn">Reset Fields</button>
	          	</form>
	          </div>
					</div>
				</div><!-- /.modal-body -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- Start of page -->
</body>
