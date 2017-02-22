/*
 var todoApp = angular.module("maps", ['ngRoute', 'firebase']);

todoApp.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            controller: 'MapCtrl',
            templateUrl: 'templates/maps.html'
        })
        .otherwise({
            redirectTo: '/'
        });
})

todoApp.controller('MapCtrl', ['$scope', '$state', function($scope, $state) {
   
}]);
*/

/**
 * transit.js
 *
 * powering the transit open data example
 */
/* global Firebase, google, $, _ */
var transit = {
    buses: {},
    map: undefined,
    ref: undefined,
    $container: undefined,
    $system: undefined,
    /**
     * init
     *
     * initialize the module
     */
    init: function() {
        this.$system = $("#system-selector");
        this.ref = new Firebase("https://boiling-fire-7865.firebaseio.com/");
        //this.ref = new Firebase('https://publicdata-transit.firebaseio.com/');
        this.animateBuses();
        this.populateMap();
    },
    /**
     * animateBuses
     *
     * attach method to Google Maps Marker prototype to animate movement on data change
     */
    animateBuses: function() {
        var self = this;
        google.maps.Marker.prototype.animatedMoveTo = function(toLat, toLng) {
            var fromLat = this.getPosition().lat();
            var fromLng = this.getPosition().lng();
            var frames = [];
            var isLocationSame = (self._areFloatsAlmostEqual(fromLat, toLat) && self._areFloatsAlmostEqual(fromLng, toLng));
            var currentLat = 0.0;
            var currentLng = 0.0;
            if (isLocationSame) {
                return;
            }
            // CREATE 200 ANIMATION FRAMES FOR BUS
            for (var percent = 0; percent < 1; percent += 0.005) {
                currentLat = fromLat + percent * (toLat - fromLat);
                currentLng = fromLng + percent * (toLng - fromLng);
                frames.push(new google.maps.LatLng(currentLat, currentLng));
            }
            self.moveBus(this, frames, 0, 25);
        };
    },
    /**
     * moveBus
     *
     * display frame by frame the bus's movement on the map
     */
    moveBus: function(marker, latLngs, index, wait) {
        marker.setPosition(latLngs[index]);
        if (index !== latLngs.length - 1) {
            setTimeout(function() {
                this.moveBus(marker, latLngs, index + 1, wait);
            }.bind(this), wait);
        }
    },
    /**
     * populateMap
     *
     * listen for changes in UI and listen to transit firebase
     */
    populateMap: function() {
        var style = [{
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "road",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }]
        }, {
            "featureType": "road.arterial",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#fee379"
            }]
        }, {
            "featureType": "road.highway",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#fee379"
            }]
        }, {
            "featureType": "landscape",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#f3f4f4"
            }]
        }, {
            "featureType": "water",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#7fc8ed"
            }]
        }, {}, {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#83cead"
            }]
        }, {
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{
                "weight": 0.9
            }, {
                "visibility": "off"
            }]
        }, {
            "featureType": "transit.line",
            "stylers": [{
                "saturation": 100
            }, {
                "color": "#ff3183"
            }]
        }];
        var self = this;
        var systemRef;
        var systemData;
        _.forEach(this.transitSystems, function(systemData, sysId) {
            this.$system.append($("<option value='" + sysId + "'>" + systemData.name + "</option>"));
        }, this);
        this.$system.change(function() {
            var mapOptions;
            var system = Number(self.$system.val());
            var name = self.transitSystems[system].tag;
            if (systemRef) {
                systemRef.off();
            }
            mapOptions = {
                center: new google.maps.LatLng(self.transitSystems[system].lat, self.transitSystems[system].lon),
                zoom: self.transitSystems[system].zoom || 8,
                minZoom: 5,
                maxZoom: 18,
                styles: style,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.BOTTOM_CENTER
                }
            };
            self.map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            systemRef = self.ref.child(name + "/vehicles").limitToLast(200);
            self.createBusListeners(systemRef);
        });
        this.$system.change();
    },
    /**
     * newBus
     *
     * create a new bus marker on Google Maps element
     * @param {Object} bus - contains information about a transit system bus
     * @param {String} busId - the bus's ID in Firebase
     */
    newBus: function(bus, busId) {
        var self = this;
        var busLatLng = new google.maps.LatLng(bus.lat, bus.lon);
        // CAPITALIZE THE FIRST LETTER OF BUS ROUTE STRING (if applicable, e.g., for the Brooklyn "B61" bus)
        var busRouteHead = bus.routeTag.toString()[0].toUpperCase();
        var busRouteTail = bus.routeTag.toString().slice(1);
        var typeAbb = bus.trainType.toString().toUpperCase();
        var tag = busRouteHead + busRouteTail;
        var currentTime = new Date(bus.timestamp);
        var formatedTime = currentTime.toTimeString();
        var name = bus.name.toString();
        var vtype = bus.vtype.toString();
        var line = bus.line.toString();
        var depart = bus.depTime.toString();
        var arrvial = bus.arrTime.toString();
        var heading = bus.heading.toString();

        if (bus.trainType == 'SPE') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_big&chld=locomotive|||F44336|000000",
                position: busLatLng,
                map: this.map
            });
        } else if (bus.trainType == 'ORD') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_big&chld=locomotive|||F44336|000000",
                position: busLatLng,
                map: this.map
            });
        } else if (bus.trainType == 'RAP') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_big&chld=locomotive|||F44336|000000",
                position: busLatLng,
                map: this.map
            });
        } else if (bus.trainType == 'EXP') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_big&chld=locomotive|||F44336|000000",
                position: busLatLng,
                map: this.map
            });
        } else if (bus.trainType == 'LOC') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_big&chld=locomotive|||F44336|000000",
                position: busLatLng,
                map: this.map
            });
        } else if (bus.trainType == 'bus') {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_small&chld=bus|bbT|" + typeAbb + ' ' + tag + "|9E9E9E|000000",
                position: busLatLng,
                map: this.map
            });
        } else {
            var marker = new google.maps.Marker({
                icon: "http://chart.googleapis.com/chart?chst=d_bubble_icon_text_small&chld=glyphish_skull|bbT|" + typeAbb + ' ' + tag + "|ffffff|000000",
                position: busLatLng,
                map: this.map
            });
        }
        var infoWindowContent = '<div id="content">' + '<div id="siteNotice">' + '</div>' + '<h1 id="firstHeading" class="firstHeading">' + 'The ' + typeAbb + ' Train No.' + tag + '</h1>' + '<div id="bodyContent">' + '<p> Depart Time : ' + '<b>' + depart + '</b> <br>' + 'Origin - Destination : ' + '<b>' + name + '</b><br>' + 'Arrvial Time : ' + '<b>' + arrvial + '</b><br>' + 'Current Time : ' + '<b>' + formatedTime + '</b><br>' + 'Line : ' + '<b>' + line + '</b><br>' + 'Detail : ' + '<b>' + vtype + '</b><br>' + '</p>' + '</div>' + '</div>';
        this.buses[busId] = marker;
        self.addInfoWindow(marker, infoWindowContent, bus);
    },
    /**
     * addInfoWindow
     * @param {[type]} marker  [description]
     * @param {[type]} message [description]
     * @param {[type]} bus     [description]
     */
    addInfoWindow: function(marker, message, bus) {
        var infoWindow = new google.maps.InfoWindow({
            content: message
        });
        google.maps.event.addListener(marker, 'click', function() {
            console.log("map: ", this.map);
            infoWindow.open(this.map, marker);
        });
    },
    /**
     * createBusListeners
     *
     * update the map when bus data changes
     * @param {Firebase Ref} systemRef - reference to the vehicles node under a transit system Firebase
     */
    createBusListeners: function(systemRef) {
        var self = this;
        systemRef.once("value", function(snapshot) {
            snapshot.forEach(function(bus) {
                self.newBus(bus.val(), bus.key());
            });
        });
        systemRef.on("child_changed", function(snapshot) {
            var busMarker = self.buses[snapshot.key()];
            if (busMarker) {
                busMarker.animatedMoveTo(snapshot.val().lat, snapshot.val().lon);
            } else {
                self.newBus(snapshot.val(), snapshot.key());
            }
        });
        systemRef.on("child_removed", function(snapshot) {
            var busMarker = self.buses[snapshot.key()];
            if (busMarker) {
                busMarker.setMap(null);
                delete self.buses[snapshot.key()];
            }
        });
    },
    /**
     * _areFloatsAlmostEqual
     *
     * test to see if two floats in JS are functionally equal
     * @param {Number} f1 - a number to compare
     * @param {Number} f2 - a number to compare
     * @param {Boolean} - whether the two floats are basically equal
     */
    _areFloatsAlmostEqual: function(f1, f2) {
        return (Math.abs(f1 - f2) < 0.000001);
    },
    /**
     * transitSystems
     *
     * listing of all transit systems in example
     */
    transitSystems: [{
        lat: 7.892810,
        lon: 98.352801,
        tag: 'trainSystem',
        city: 'Thailand',
        state: 'TH',
        name: 'TRAIN - transitSystems',
        zoom: 15
    }, {
        lat: 7.892810,
        lon: 98.352801,
        tag: 'busSystem',
        city: 'Thailand',
        state: 'TH',
        name: 'BUS - transitSystems',
        zoom: 15
    }, ]
};
$(document).ready(function() {
    transit.init();
});
