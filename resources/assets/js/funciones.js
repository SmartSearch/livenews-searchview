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

var preload = '<div id="preloader" syle="text-align:center;margin:0;"><img src="/img/ajax-loader1.gif"></div>';
var noresult = '<ul class="jspPane"><li>      <div class="txt_widget"> <p class="autor"> 0 Resultados </p> <p>Esta consulta no genera resultados </p>       </div>    </li></ul>';
var activo = "";
var uri = "index_dev.php/api/v1";

var init_search = false;
var santanderEstePoint = [];
var santanderOestePoint = [];
var image = "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2%7C3F8BFB";
var lastFlagUp = "";


/**
 * @param coordenadas
 */
function mapaClick(coordenadas) {
	map.panTo(coordenadas);
	$("div.visible .content_widget").html("");
	$("#mod_iconSports .tit_widget")[0].innerHTML = "Deportes Santander ";
	$("#mod_iconPics .tit_widget")[0].innerHTML = "Ciudad Santander";
	if ($(".active #iconSports").length != 1)
		$("#mod_iconCity .tit_widget").html("Ciudad Santander");
	else
		$("#mod_iconSports .tit_widget").html("Deportes Santander ");
}

/**
 * @param event
 */
function santanderEsteClick(event) {
	var latitudLongitud = event.latLng;
	var latitud = latitudLongitud.lat();
	var longitud = latitudLongitud.lng();
	var id = this.id;

	if ($(".active").length == 0)
		$(".icon_menuSidebar #iconCity").parent().addClass("active");

	if (activo != "" && $(".active").lenght == 1) {
		$("#" + activo)[0].parentNode.className = $("#" + activo)[0].parentNode.className + " active ";
	}
	
	if ($(".active #iconCity").length == 1) {
		$("#mod_iconCity").addClass("visible");
		$("#iconCity")[0].parentNode.className = $("#iconCity")[0].parentNode.className + "   active ";
	}

	if ($(".active #iconSports").length == 1) {
		$("#iconSports")[0].parentNode.className = $("#iconSports")[0].parentNode.className + " active ";
		$("#mod_iconSports").addClass("visible");
	}

	if ($(".active #iconEvents").length == 1) {
		$("#iconEvents")[0].parentNode.className = $("#iconEvents")[0].parentNode.className + " active ";
		$("#mod_iconEvents").addClass("visible");
	}

	if ($(".active #iconPics").length == 1) {
		$("#iconPics")[0].parentNode.className = $("#iconPics")[0].parentNode.className + " active ";
		$("#mod_iconPics").addClass("visible");
	}

	if ($(".active #iconVideo").length == 1) {
		$("#iconVideo")[0].parentNode.className = $("#iconVideo")[0].parentNode.className + " active ";
		$("#mod_iconVideo").addClass("visible");
	}

	if ($("#iconSearch_central").attr("class").indexOf("active") >= 0) {
		$("#mod_iconSearch").addClass("visible");
	}

	// hide all events
	$(" div.visible .content_widget li").css("display","none");

	// show selected event
	$("#"+id).css("display","block");

	// show button to return to complete list
	$(" div.visible #completeList").show();

	// set the flag as selected
	setFlagUp (id);
}

/**
* Show all events on click "restore button", after select a flag on the map
*/
function restoreList() {
	$(" div.visible .content_widget li").css("display","block");
	$(" div.visible #completeList").hide();
	setFlagDown();
};



/**
 * 
 */
function santanderOesteClick() {
	coordenadas = new google.maps.LatLng(43.466127, -3.834664);
	map.panTo(coordenadas);

	if ($(".active").length == 0)
		$(".icon_menuSidebar #iconCity").parent().addClass("active");

	if (activo != "" && $(".active").lenght == 1) {
		$("#" + activo)[0].parentNode.className = $("#" + activo)[0].parentNode.className + " active ";
	}

	$(".modulo_widget").removeClass("visible");

	if ($(".active #iconSports").length != 1) {
		$("#iconCity")[0].parentNode.className = $("#iconCity")[0].parentNode.className + " active ";
		link = uri + "?sector=oeste";
		$("#mod_iconCity .tit_widget").html("Results for CITY Smart Search in Plaza del Ayuntamiento");
		$("#mod_iconCity").addClass("visible");
	} else {
		link = "ws/deportes.php?sector=oeste";
		$("#iconSports")[0].parentNode.className = $("#iconSports")[0].parentNode.className + " active ";
		$("#mod_iconSports .tit_widget").html("Results for SPORTS Smart Search: ");
		$("#mod_iconSports").addClass("visible");
	}

	if ($("#iconSearch_central").attr("class").indexOf("active") >= 0) {
		$("#mod_iconSearch").addClass("visible");
	}

	// hide all events
	$(" div.visible .content_widget li").css("display","none");

	// show selected event
	$("#"+id).css("display","block");

	// show button to return to complete list
	$(" div.visible #completeList").show();

	// set the flag as selected
	setFlagUp (id);

}

/**
 * 
 */
function santanderEsteClickprueba() {
	setTimeout(santanderEsteClick, 0);
}

/**
 * 
 */
function poligonos() {
	var poligonoEste = [
			new google.maps.LatLng(43.46587409009197, -3.763767878353974),
			new google.maps.LatLng(43.460703420456376, -3.8030783336762397),
			new google.maps.LatLng(43.49078677846986, -3.8198153179291694),
			new google.maps.LatLng(43.493201378620434, -3.780247370541474) ]
	var poligonoOeste = [
			new google.maps.LatLng(43.460703420456376, -3.8030783336762397),
			new google.maps.LatLng(43.49078677846986, -3.8198153179291694),
			new google.maps.LatLng(43.476324829031434, -3.875433604061982),
			new google.maps.LatLng(43.41344780750694, -3.8244501751069038) ]
	santanderEste = new google.maps.Polygon({
		paths : poligonoEste,
		strokeColor : "#FF0000",
		//strokeOpacity : 0.1,
		//strokeWeight : 2,
		fillColor : "#FF0000",
		//fillOpacity : 0.1
	});
	santanderOeste = new google.maps.Polygon({
		paths : poligonoOeste,
		strokeColor : "#AAF0D1",
		strokeOpacity : 0.2,
		strokeWeight : 2,
		fillColor : "#AAF0D1",
		fillOpacity : 0.2
	});
}

/**
* Update on the map de flag selected on the event list and call to restore the last flag
* @param id
*/
function setFlagUp(id) {
	// restore the last flag selected
	setFlagDown();
	// update with the new flag selected
	lastFlagUp = id;
	// up the new flag selected on blue and animated
	santanderEstePoint[id].setAnimation(google.maps.Animation.BOUNCE);
	santanderEstePoint[id].setIcon(image);
	// reset on the map
	santanderEstePoint[id].set(map);

	setTimeout(setFlagStatic, 3000); // 3 seconds
}

/**
* restore last flag on var lastFlagUp
* @param id
*/
function setFlagDown() {
	if (lastFlagUp) {
		// down the lastFlagUp flag
		santanderEstePoint[lastFlagUp].setAnimation();
		santanderEstePoint[lastFlagUp].setIcon();
		// reset on the map
		santanderEstePoint[lastFlagUp].set(map);
	}
}

/**
* Stop animation on the flag
*/
function setFlagStatic() {
	// Stop animation
	santanderEstePoint[lastFlagUp].setAnimation();
	// reset on the map
	santanderEstePoint[lastFlagUp].set(map);
}



$(document).ready(function() {

	// configure datepicker
	// Get current day
		var d = new Date();
		var year = d.getFullYear();
		var month = d.getMonth()+1;
			month = (month<10 ? '0' : '') + month;
		var day = d.getDate();
			day = (day<10 ? '0' : '') + day;
	$('#sinceDate').datepicker({dateFormat: 'yy-mm-dd', firstDay: 1, maxDate: new Date(d.getFullYear(), d.getMonth(), d.getDate()), });
	
	// If exists value on #searching and update sinceDate, reload the search
	$('#sinceDate').change(function(){
		if ($("#searching").val())
			$('#searching').trigger({type: 'keypress', which: 13, keyCode: 13});
	});

	$("#searching").keypress(function(event) {
		if (event.keyCode == 13) {
			if ($("li.active").length > 0) {
				activo = $("li.active")[0].children[0].attributes[0].value;
				$("li.active").removeClass("active");
			}

			if ($("#sinceDate")[0].value != ""){
				exists_since = "&since=" + $("#sinceDate")[0].value;
				exists_since_label = " since " + $("#sinceDate")[0].value;
			}else{
				exists_since = "";
				exists_since_label = "";
			}

			$(".modulo_widget").removeClass("visible");
			$("#mod_iconSearch").addClass("visible");			
			$("#mod_iconSearch .tit_widget").html("Result for: " + $("#searching")[0].value + exists_since_label);
			$("div.visible .content_widget").html(preload);

			$
				.ajax({
					url : uri + "?query=" + $("#searching")[0].value + exists_since,
					context : document.body,
					timeout : 8000,
					error : function(x, t, m) {
						if (t === "timeout") {
							$("div.visible .content_widget").html(noresult);
						}
					}
				})
				.done(function(data) {
					initialize("map_canvas7","search");
					$("div.visible .content_widget").html(data);
					if ($("div.visible .content_widget ul li").length == 0) {
			            $("div.visible .content_widget").html(noresult);
					}
				});
		}
	});

	

});
