<?php
  /** Project: UCBCKI Under Construction
  ** Website Calendar (calendar.php)
  **
  ** Author: Jerry Bao (jbao@berkeley.edu)
  ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
  ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
  ** Author: Sock Ryu (cki.sock@gmail.com)
  **
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "Calendar";
?>

<!DOCTYPE html>
<html>
<head>
	<? require_once "../header.php"; ?>
</head>
<body id="cal-body">
	<div class="nav-placeholder"></div>
		<div id="cal-banner" class="jumbotron">
      <div class="container">
        <span>
          <h1>
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x" style="color: #00447c"></i>
            <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
          </span>
          Calendar
          </h1>
        </span>
      </div>
  </div>
  	<!-- Calendar -->
	<div id='calendar' class="container overlay"></div>
	<!-- Legend(ary) -->
	<div id="legend" class="container overlay">
		<h3>Legend</h3>
		<div class="col-sm-6 col-md-4 blue">
			<p>Club Service</p>
		</div>
		<div class="col-sm-6 col-md-4 red">
			<p>Club Social</p>
		</div>
		<div class="col-sm-6 col-md-4 purple">
			<p>Committee Meeting</p>
		</div>
		<div class="col-sm-6 col-md-4 green">
			<p>Fundraising</p>
		</div>
		<div class="col-sm-6 col-md-4 orange">
			<p>Kiwanis Event</p>
		</div>
		<div class="col-sm-6 col-md-4 grey">
			<p>Division/District Event</p>
		</div>
	</div>
	<!-- Calendar event modal -->
	<div class="modal fade" id="otherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
	<? require_once "../footer.php"; ?>
	<script type="text/javascript">
		/* calculate window height for resizing calendar */
		function get_calendar_height() {
		  return $(window).height() - 30;
		}

		$(document).ready(function(){
			// change calendar height on resize
			$(window).resize(function() {
				$('#calendar').fullCalendar('option', 'height', get_calendar_height());
			});
			// set calendar on load
			$('#calendar').fullCalendar({
		    events: '/~circlek/calendar/events.json.php',
				height: get_calendar_height,
	    	header: {
	    		left: 'title',
	    		center: '',
	    		right: 'today prev,next'
	    	},
	    	eventClick: function ( event, jsEvent, view ) {
		    	$("#otherModal").load("calmodal.php?id="+event.id);
	        $('#otherModal').modal('show');
        }
		  });
		});
	</script>
</body>
</html>
