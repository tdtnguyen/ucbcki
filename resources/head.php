		<head> 
    <?php session_start(); ?>
		<title>UC Berkeley Circle K</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="/~circlek/images/graphics/icon.png">
    <link rel="stylesheet" type="text/css" href="/~circlek/css/bootstrap.css" media="all">
        <link rel="stylesheet" type="text/css" href="/~circlek/admin/font-awesome-4.1.0/css/font-awesome.css" media="all">
		</head>
	<body style="background-image: url('/~circlek/images/graphics/christmasbooks.png');background-size: 50%; background-repeat: repeat;  background-attachment: fixed;">
		      <img src="/~circlek/images/graphics/bannerchristmas.jpg" style="width: 100%; height: 100%;">
				
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class= "container" > 
				<div class = "navbar-header">
					<a href = "/~circlek/index.php" class = "navbar-brand"> UCBCKI</a>
						<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
							<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
						</button>
					</div>
					<div class = "collapse navbar-collapse navHeaderCollapse">
						<ul class = "nav navbar-nav navbar-right">

							<li><a href="/~circlek/Calendar/Calendar.php">Calendar</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
								<ul class="dropdown-menu">
									<li><a href="/~circlek/About/about.php">UCB CKI</a></li>
									<li><a href="https://www.facebook.com/groups/144874468912556/" target="_blank">Golden Gate Division</a></li>
									<li><a href="http://cnhcirclek.org/" target="_blank">CNH Circle K</a></li>
									<li><a href="http://www.circlek.org/home.aspx" target="_blank">Circle K International</a></li>
									<li><a href="http://www.kiwanis.org/" target="_blank">Kiwanis International</a></li>						
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Service</a>
								
								<ul class="dropdown-menu">
									<li><a href="/~circlek/Service/contprojects.php">Continuous Projects Spotlight</a></li>
									<li><a href="/~circlek//Service/singleserv.php">Single Service Spotlight</a></li>
									<li><a href="http://www.cnhcirclek.org/about/district-service-initiative">District Service Initiative</a></li>
									<li><a href="http://www.cnhcirclek.org/about/district-fundraising-initiatives">District Fundraising Initiatives</a></li>												
								</ul>

							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Leadership</a>
								<ul class="dropdown-menu">
									<li><a href="/~circlek/Leadership/board.php">Board</a></li>						
								</ul>

							</li>
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Fellowship</a>
                <ul class="dropdown-menu">
                    <li><a href="/~circlek/Fellowship/socials.php">Socials</a></li>           
                  <li><a href="/~circlek/Fellowship/family.php">Family System</a></li>           
                </ul>
              </li>               
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Committees</a>
								<ul class="dropdown-menu">
									<li><a href="/~circlek/committees/fund.php">Fundraising</a></li>
									<li><a href="/~circlek/committees/hist.php">Historian</a></li>
									<li><a href="/~circlek/committees/kfam.php">Kiwanis Family</a></li>
									<li><a href="/~circlek/committees/mde.php">MD&E</a></li>
									<li><a href="/~circlek/committees/proj.php">Projects</a></li>
									<li><a href="/~circlek/committees/pr.php">Public Relations</a></li>
									<li><a href="/~circlek/committees/publ.php">Publications</a></li>
									<li><a href="/~circlek/committees/sserve.php">Single Service</a></li>
									<li><a href="/~circlek/committees/spirit.php">Spirit & Social</a></li>
									<li><a href="/~circlek/committees/tech.php">Technology</a></li>								
								</ul>
							</li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social Media</a>
                <ul class="dropdown-menu">
                  <li><a href="https://www.facebook.com/groups/66850859271/" target="_blank"><i class="fa fa-facebook fa-fw"></i> Facebook Group</a></li>
                  <li><a href="http://instagram.com/ucbcki" target="_blank"><i class="fa fa-instagram fa-fw"></i> Instagram</a></li>
                  <li><a href="https://twitter.com/UCBCKI" target="_blank"><i class="fa fa-twitter fa-fw"></i> Twitter</a></li>
                  <li><a href="https://drive.google.com/a/berkeley.edu/folderview?id=0B1MfH83HOZRMWDNpUlhLUVBhVTQ&usp=drive_web#" target="_blank"><i class="fa fa-picture-o"></i> Image Gallery</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources</a>
                <ul class="dropdown-menu">
                  <li><a href="/~circlek/resources/MembershipApp.pdf" target="_blank">Membership Application</a></li>
                </ul>
              </li>
                <?php              
                  if (isset($_SESSION['nimbus_user_id'])) {
                ?> <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['nimbus_first_name'] ?> <?= $_SESSION['nimbus_last_name'] ?> <i class="fa fa-user fa-fw"></i></a>
                <ul class="dropdown-menu">
                  <?php              
                  if ($_SESSION['nimbus_access'] > 0) {
                  ?>
                  <li><a href="/~circlek/admin/index.php">Admin</a></li>
                  <? } ?>
                  <li><a href="/~circlek/selfinfo.php">My Events</a></li>
                  <li><a href="/~circlek/updateinfo.php">Update User Info</a></li>
                  <li><a href="/~circlek/logout.php?url=<? echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" > Logout</a></li>
                </ul>
                </li>
							<? } else { ?>
                     <li><a class="btn" data-toggle="modal" href="#myModal" ><i class="fa fa-user fa-fw"></i> Login</a></li>
                     <?}?>
						</ul>	
					</div>

			</div>

		</div>
		
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
        <p></p><br> Please contact diyaraniwar@berkeley.edu</a> for any other inquiries.</p>
        </div>
        <div class="tab-pane fade active in" id="signin">
            <form action="/~circlek/login.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="form_submit_type" value="login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <input type="hidden" name="url" value="<? echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
            </form>
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
                                    <button type="reset" class="btn btn-primary">Reset Fields</button>
                                </form>
                  </div>
    </div>
	</div>
    </div>
    </div>
    </div>
    
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/~circlek/js/bootstrap.js"></script>
    <script type="text/javascript" src="/~circlek/js/maskedinput.jquery.min.js"></script>
    <script type="text/javascript" src="/~circlek/js/head.js"></script>
    <script type="text/javascript">
      function modalOpen(eventid) {
        $("#eventModal").load("/~circlek/Calendar/CalEventInfo.php?id="+eventid);
        $('#eventModal').modal('show');
      }
    </script>

<!--Simply copy and paste into <BODY>  
     Just above the </BODY> tag. -->

<SCRIPT type="text/javascript">
/*
Snow Fall 1 - no images - Java Script
Visit http://rainbow.arch.scriptmania.com/scripts/
  for this script and many more
*/

// Set the number of snowflakes (more than 30 - 40 not recommended)
var snowmax=60

// Set the colors for the snow. Add as many colors as you like
var snowcolor=new Array("#aaaacc","#ddddff","#ccccdd","#f3f3f3","#f0ffff")

// Set the fonts, that create the snowflakes. Add as many fonts as you like
var snowtype=new Array("Times","Arial","Times","Verdana")

// Set the letter that creates your snowflake (recommended: * )
var snowletter="*"

// Set the speed of sinking (recommended values range from 0.3 to 2)
var sinkspeed=0.6

// Set the maximum-size of your snowflakes
var snowmaxsize=30

// Set the minimal-size of your snowflakes
var snowminsize=8

// Set the snowing-zone
// Set 1 for all-over-snowing, set 2 for left-side-snowing
// Set 3 for center-snowing, set 4 for right-side-snowing
var snowingzone=1

///////////////////////////////////////////////////////////////////////////
// CONFIGURATION ENDS HERE
///////////////////////////////////////////////////////////////////////////


// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)
var browserok=ie5||ns6||opera

function randommaker(range) {
        rand=Math.floor(range*Math.random())
    return rand
}

function initsnow() {
        if (ie5 || opera) {
                marginbottom = document.body.scrollHeight
                marginright = document.body.clientWidth-15
        }
        else if (ns6) {
                marginbottom = document.body.scrollHeight
                marginright = window.innerWidth-15
        }
        var snowsizerange=snowmaxsize-snowminsize
        for (i=0;i<=snowmax;i++) {
                crds[i] = 0;
            lftrght[i] = Math.random()*15;
            x_mv[i] = 0.03 + Math.random()/10;
                snow[i]=document.getElementById("s"+i)
                snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
                snow[i].size=randommaker(snowsizerange)+snowminsize
                snow[i].style.fontSize=snow[i].size+'px';
                snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
                snow[i].style.zIndex=1000
                snow[i].sink=sinkspeed*snow[i].size/5
                if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
                snow[i].style.left=snow[i].posx+'px';
                snow[i].style.top=snow[i].posy+'px';
        }
        movesnow()
}

function movesnow() {
        for (i=0;i<=snowmax;i++) {
                crds[i] += x_mv[i];
                snow[i].posy+=snow[i].sink
                snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+'px';
                snow[i].style.top=snow[i].posy+'px';

                if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
                        if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                        if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                        if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                        if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                        snow[i].posy=0
                }
        }
        var timer=setTimeout("movesnow()",50)
}

for (i=0;i<=snowmax;i++) {
        document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"'>"+snowletter+"</span>")
}
if (browserok) {
        window.onload=initsnow
}

</SCRIPT>
<!-- <p><font face="arial" size="-2">Free JavaScript from </font><br><font face="arial, helvetica" size="-2"><a href="http://rainbow.arch.scriptmania.com/scripts/">Rainbow Arch</a></font></p>
 -->

    

		</body>
