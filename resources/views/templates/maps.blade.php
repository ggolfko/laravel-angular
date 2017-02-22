@extends('admin')
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6U2ExB8yLDc7RiGPYK3C3yIzDPpyFJE0&sensor=false"></script>
    <script src="{{asset('lib/firebase/firebase.js')}}"></script>
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/lodash/lodash.js')}}"></script>
    <script src="{{asset('lib/rsvp/rsvp.js')}}"></script>
    <script src="{{asset('lib/geofire/dist/geofire.js')}}"></script>
</head>
<style>
html,
body {
    height: 100%;
}

body {
    margin: 0;
    padding: 0;
    width: 100%;
}

.transit-selector-container {
    background: transparent;
    margin-top: 150px;
    right: 30px;
    font-size: 16px;
    line-height: 1;
    border: 0;
    border-radius: 0;
    -webkit-appearance: none;
    position: fixed;
    z-index: 99;
    border: 0px solid transparent;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0);
}
#map-canvas {
    width: 100%;
    height: 100%;
    margin: 0 auto;
}
.s{
    margin-top: 100px;
    right: 30px;
    z-index: 999;
    position: absolute;

}
</style>

<body>
 <form class="s" ng-submit="searchMarker($event, trainNo)">
                <i class="icon ion-ios-search placeholder-icon"></i>
                <input class="form-control"type="search" placeholder="Search" ng-model="trainNo">
            </form>
    <select class="transit-selector-container" id="system-selector"></select>
    <div data-example="transit" id="map-canvas"></div>
</body>
<script src="{{asset('/js/maps.js')}}"></script>
</html>

