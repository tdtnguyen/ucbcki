/*
 * Script for UCBCKI Website
 * Author: Sock Ryu (cki.sock@gmail.com)
 * 
 * CIRCLE K INTERNATIONAL
 * COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
 */

function modalOpen(eventid) {
	$("#eventModal").load("/~circlek/calendar/calmodal.php?id="+eventid);
	$('#eventModal').modal('show');
}

function loginOpen() {
	$(window).load(function(){
        $('#loginModal').modal('show');
    });
}

function usermodalOpen(eventid) {
  $("#usereventModal").load("/~circlek/selfinfo/selfmodal.php?id="+eventid);
  $('#usereventModal').modal('show');
}

function onWindowResize() {
	/* since navbar is in an absolute position, use this placeholder to 
	 * bring down elements in body below the navbar */
	// var navHeight = $(".navbar-default").outerHeight();
	// $(".nav-placeholder").height(navHeight);

	/* resize logos in footer to fit comfortably in window */
	var windowWidth = $(window).width();
	if (windowWidth <= 768) {
		$("#kiwanis").height((windowWidth * 0.23) - 32);
		$("#extra .container:nth-child(2) img").height(Math.round(windowWidth * 0.2));
		$("#extra .container:nth-child(3) img").height(Math.round(windowWidth * 0.23));
		$("#extra .container:nth-child(3) img").css("padding-top", "20px");
	} else {
		var footerHeight = Math.round(windowWidth * 0.08);
		$("#kiwanis").height(footerHeight - 32);
		$("#extra .container:nth-child(2) img").height(footerHeight);
		$("#extra .container:nth-child(3) img").height(footerHeight);
		$("#extra .container:nth-child(3) img").css("padding-top", "0px");
	}

	/* place footer at bottom of page, even if body height does not cover
	 * page. delay of 500 milliseconds to load all elements in body before
	 * placing at bottom */
	setTimeout(function () {
	    var windowHeight = $(window).height();
		var bodyHeight = $("body").height();
		var footerHeight = $("#foot").height();
		if (bodyHeight < (windowHeight - footerHeight)) {
			document.getElementById("foot").style.bottom = "0px";
		} else {
			document.getElementById("foot").style.bottom = "auto";
		}

		/* changing the number of characters in event descriptions on homepage
		 * based on window size */
		var text = $('#featured1 .description').text();
		var width = $('.postit p').width();
		var height = $('#featured1').height() - $('#featured1 h3').height() - 120;
		var numChars = Math.round(width * height / 200);
		if (text.length > numChars) {
			$('#featured1 .description').text(text.slice(0, numChars) + "...");
		}
		var text = $('#featured2 .description').text();
		height = $('#featured2').height() - $('#featured2 h3').height() - 120;
		numChars = Math.round(width * height / 200);
		if (text.length > numChars) {
			$('#featured2 .description').text(text.slice(0, numChars) + "...");
		}
	}, 500); // time to delay (in milliseconds) 

	/* set padding-top of headers inside jumbotron so that background sizes
	 * do not crop out important elements of the background images */
	var padding = Math.round($(".jumbotron").width() / 5);
	$(".committees .jumbotron h1").css("padding-top", padding);
	$(".spotlight .jumbotron h1").css("padding-top", padding);
	padding = Math.round($("#banner").width() / 4.5);
	$("#banner h1").css("padding-top", padding);
	var paddingBoard = Math.round($("#board").width() / 4);
	$("#board h1").css("padding-top", paddingBoard);

	/* make profile pics into cirles that fit inside their div container */
	var side = $(".portrait").width();
	$(".img-circle").height(side);
	side = $(".spotlight .col-sm-4").width();
	$(".spotlight .featurette-image").height(side);
	side = $(".chairs .col-sm-4").width();
	$(".chairs .featurette-image").height(side);
}

/* masked input for phone numbers*/
$(".phone").mask("(999) 999-9999");

var homepage = false;

$(document).ready(function(){	
	if (homepage === true) {
    /* increase opacity of navbar when scrolled below top */
		var navbottom = $('.navbar-default').height();
		// at time of loading,
		stop = Math.round($(window).scrollTop());
	    if (stop > navbottom) {
	        $('.navbar-default').addClass('past-main');
	    }
		// on scroll, 
		$(window).on('scroll', function(){
		    // we round here to reduce a little workload
		    stop = Math.round($(window).scrollTop());
		    if (stop > navbottom) {
		        $('.navbar-default').addClass('past-main');
		    } else {
		        $('.navbar-default').removeClass('past-main');
		    }
		});
	} else {
		$('.navbar-default').addClass('past-main');
	}

	var child = 4;
	for (i = 1; i <= child; i++) {
		var selectRow = ".row:nth-child(" + child + "n+" + i + ") ";
		for (j = 1; j <= child; j++) {
			selectTilt = selectRow + ".tilted:nth-child(" + child + "n+" + j + ")";
			var angle = Math.round(Math.random() * 7);
			if (i % 2 === 1) {
				angle = angle * -1;
			}
			if (j % 2 === 1) {
				angle = angle * -1;
			}
			$(selectTilt).css({
				'-ms-transform': 'rotate(' + angle + 'deg)', /* IE 9 */
				'-webkit-transform': 'rotate(' + angle + 'deg)', /* Safari, Chrome */
				'-moz-transform': 'rotate(' + angle + 'deg)', /* Firefox */
			 	'transform': 'rotate(' + angle + 'deg)' /* IE 9 */
			});
		}
	}

	var numBlogs = $(".blog-post").length;
	for (i = 0; i < numBlogs; i++) {
		$(".blog-post").eq(i).attr("id", "post-" + (i+1));
		var postSelector = "#post-" + (i+1);
		if ($(postSelector + " p img").length > 0) {
			$(postSelector + " p img").detach().appendTo(postSelector);
		}
		$(postSelector + " img").addClass("col-md-4");
	  	$(postSelector + " .blog-post-title").detach().appendTo(postSelector + " .blog-content");
	  	$(postSelector + " p").detach().appendTo(postSelector + " .blog-content");
	  	if ($(postSelector + " img").length === 0) {
	  		$(postSelector + " .blog-content").removeClass("col-md-8");
	  	}
	}
	$("#mainNav").load("/store #blog-preview");

	onWindowResize();
	$(window).resize(function() {
		onWindowResize();
	});
	
	window.scrollTo(0, 0);
});

/** Preload important images on the website */
var images = new Array()
function preload() {
	for (i = 0; i < preload.arguments.length; i++) {
		images[i] = new Image();
		images[i].src = preload.arguments[i];
	}
}
preload(
	// Home banner and website background
	"/~circlek/images/banner_construct.png",
	"/~circlek/images/graphpaper.png",
	// Footer images
	"/~circlek/images/logos/logo_CKI_KSLP logo_BW_PNG.png",
	"/~circlek/images/logos/logo_GG.png",
	"/~circlek/images/logos/emblem_CNH.png",
	"/~circlek/images/logos/logo_CKI_seal_295Blue_872Gold_PNG.png",
	"/~circlek/images/logos/logo_CKI_CKIsupportsThe Eliminate Project_4color_PNG.png",
	"/~circlek/images/logos/graphic_CKI_WorldsLargest_RGB654blue.png",
	// Board pics ('c' pictures not included)
	/**
	"/~circlek/images/pictures/board/board-a.jpg",
	"/~circlek/images/pictures/board/board-c.jpg",
	"/~circlek/images/pictures/board/pres-a.jpg",
	"/~circlek/images/pictures/board/pres-b.jpg",
	"/~circlek/images/pictures/board/avp-a.jpg",
	"/~circlek/images/pictures/board/avp-b.jpg",
	"/~circlek/images/pictures/board/svp-a.jpg",
	"/~circlek/images/pictures/board/svp-b.jpg",
	"/~circlek/images/pictures/board/treas-a.jpg",
	"/~circlek/images/pictures/board/treas-b.jpg",
	"/~circlek/images/pictures/board/sec-a.jpg",
	"/~circlek/images/pictures/board/sec-b.jpg",
	"/~circlek/images/pictures/board/fund-a.jpg",
	"/~circlek/images/pictures/board/fund-b.jpg",
	"/~circlek/images/pictures/board/hist-a.jpg",
	"/~circlek/images/pictures/board/hist-b.jpg",
	"/~circlek/images/pictures/board/kfam-a.jpg",
	"/~circlek/images/pictures/board/kfam-b.jpg",
	"/~circlek/images/pictures/board/mde1-a.jpg",
	"/~circlek/images/pictures/board/mde1-b.jpg",
	"/~circlek/images/pictures/board/mde2-a.jpg",
	"/~circlek/images/pictures/board/mde2-b.jpg",
	"/~circlek/images/pictures/board/mrp-a.jpg",
	"/~circlek/images/pictures/board/mrp-b.jpg",
	"/~circlek/images/pictures/board/proj-a.jpg",
	"/~circlek/images/pictures/board/proj-b.jpg",
	"/~circlek/images/pictures/board/pr-a.jpg",
	"/~circlek/images/pictures/board/pr-b.jpg",
	"/~circlek/images/pictures/board/publ-a.jpg",
	"/~circlek/images/pictures/board/publ-b.jpg",
	"/~circlek/images/pictures/board/sserve-a.jpg",
	"/~circlek/images/pictures/board/sserve-b.jpg",
	"/~circlek/images/pictures/board/spirit-a.jpg",
	"/~circlek/images/pictures/board/spirit-b.jpg",
	"/~circlek/images/pictures/board/tech-a.jpg",
	"/~circlek/images/pictures/board/tech-b.jpg",
	*/
	// Committee cover pics
	"/~circlek/images/pictures/committees/fundcomm.jpg",
	"/~circlek/images/pictures/committees/histcomm.jpg",
	"/~circlek/images/pictures/committees/kfamcomm.jpg",
	"/~circlek/images/pictures/committees/mdecomm.jpg",
	"/~circlek/images/pictures/committees/projcomm.jpg",
	"/~circlek/images/pictures/committees/prcomm.jpeg",
	"/~circlek/images/pictures/committees/publcomm.jpg",
	"/~circlek/images/pictures/committees/sservecomm.jpg",
	"/~circlek/images/pictures/committees/spiritcomm.jpg",
	"/~circlek/images/pictures/committees/techcomm.jpg"
);