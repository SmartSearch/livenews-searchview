/* 
* SMART FP7 - Search engine for MultimediA enviRonment generated contenT
* Webpage: http://smartfp7.eu
*
* This Source Code Form is subject to the terms of the Mozilla Public
* License, v. 2.0. If a copy of the MPL was not distributed with this
* file, You can obtain one at http://mozilla.org/MPL/2.0/.
*
* The Original Code is Copyright (c) 2012-2014 PRISA Digital
* All Rights Reserved
*
* Contributor(s):
*  PRISA Digital
*/

$(document).ready(function() {

	$("#iconCity_central").addClass('active');
	$("#mod_iconCity").addClass('visible');

    //-------contenido_central-------

    // city -> city
	$("#iconCity").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconCity').addClass('active');

		// toggle map content
		$(".box-central_content").removeClass("active");
        $("#iconCity_central").addClass("active");

        // toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconCity").addClass('visible');
	});

	// sports -> sports
	$("#iconSports").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconSports').addClass('active');

		// toggle map content
		$(".box-central_content").removeClass("active");
        $("#iconSports_central").addClass("active");

        // toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconSports").addClass('visible');
	});

	// colours -> color
	$("#iconColours").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconColours').addClass('active');

		// toggle map content
		$('.box-central_content').removeClass('active');
		$("#iconColours_central").addClass('active');

		// toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconColours").addClass('visible');
	});

	// events -> shops
	$("#iconEvents").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconEvents').addClass('active');

		// toggle map content
		$(".box-central_content").removeClass("active");
        $("#iconEvents_central").addClass("active");

        // toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconEvents").addClass('visible');
	});

	// pics -> culture
	$("#iconPics").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconPics').addClass('active');

		// toggle map content
		$(".box-central_content").removeClass("active");
        $("#iconPic_central").addClass("active");

        // toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconPics").addClass('visible');
	});
	
	// video -> traffic
	$("#iconVideo").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		$('#iconVideo').addClass('active');

		// toggle map content
		$(".box-central_content").removeClass("active");
        $("#iconVideo_central").addClass("active");

		// toggle list of events
		$('.modulo_widget').removeClass('visible');
		$("#mod_iconVideo").addClass('visible');
	});

	// search -> search
	$("#searching").click(function() {
		// toggle navbar
		$('.nav li').removeClass('active');
		
		// toggle map content
        $(".box-central_content").removeClass("active");
        $("#iconSearch_central").addClass("active");

        // toggle list of events
		$('.modulo_widget').removeClass('visible');				
		$("#mod_iconSearch").addClass('visible');
	});


	//-------widgets-------
	window.addEventListener('onorientationchange', function () {
		window.location.reload()    	
	});


});


