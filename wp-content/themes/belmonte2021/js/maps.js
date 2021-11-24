// JavaScript
(function ($) {
    /*
     *  render_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function render_map($el) {
        // var
        var $markers = $el.find(".marker");

        // vars
        var args = {
            zoom: 12,
            center: new google.maps.LatLng($el.attr("data-first-lat"), $el.attr("data-first-lng")),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            scrollwheel: false,
            zoomControl: true,
        };
        // create map
        var map = new google.maps.Map($el[0], args);

        // add a markers reference
        map.markers = [];

        // create info window
        var infowindow = new google.maps.InfoWindow({
            maxWidth: 190,
        });

        // add markers
        $markers.each(function () {
            add_marker($(this), map, infowindow);
        });

        // center map
        // center_map( map );
    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker($marker, map, infowindow) {
        // var
        var latlng = new google.maps.LatLng($marker.attr("data-lat"), $marker.attr("data-lng"));

        // style marker
        var markerSvg = {
            path: "M14.554,0C6.561,0,0,6.562,0,14.552c0,7.996,6.561,14.555,14.554,14.555c7.996,0,14.553-6.559,14.553-14.555 C29.106,6.562,22.55,0,14.554,0z",
            fillColor: "#000",
            fillOpacity: 1,
            rotation: 0,
            scale: 0.3,
        };

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            icon: markerSvg,
            map: map,
        });

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($marker[0].getAttribute("data-html") == "true") {
            // create html
            var currentMarker = $marker[0];
            // html...

            // show info window when marker is clicked
            google.maps.event.addListener(marker, "click", function () {
                infowindow.setContent(div);
                infowindow.open({
                    anchor: marker,
                    map,
                });
            });

            if (currentMarker.getAttribute("data-order") == "first") {
                infowindow.setContent(div);
                infowindow.open({
                    anchor: marker,
                    map,
                });
            }
        }
    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map(map) {
        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

            bounds.extend(latlng);
        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
            // fit to bounds
            map.fitBounds(bounds);
        }
    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */
    $(document).ready(function () {
        $(".acf-map").each(function () {
            render_map($(this));
        });
    });
})(jQuery);
