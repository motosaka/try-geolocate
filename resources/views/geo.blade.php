@extends('layout')
@section('content')
<h1>位置情報 サンプル2</h1>

<div id="gmap" style="width: 100%; height: 400px; background-color: #EFE;"></div>
<div id="panorama" style="width: 100%; height: 400px; background-color: #EFE;"></div>
@endsection
@section('geo_script')
<script src="//raw.githubusercontent.com/HPNeo/gmaps/master/gmaps.js"></script>
<script>
jQuery(function($) {
    navigator.geolocation.getCurrentPosition(function(pos) {
        var map = new GMaps({
            div: "#gmap",
            lat: pos.coords.latitude,
            lng: pos.coords.longitude,
            zoom: 14, //15
        });
        var d = 0.01;
        var x = pos.coords.latitude - d/2;
        var y = pos.coords.longitude - d/2;
        var path = [[x,y], [x+d,y], [x+d,y+d], [x,y+d]];

        polygon = map.drawPolygon({
            paths: path,
            strokeColor: '#BBD8E9',
            strokeOpacity: 1,
            strokeWeight: 3,
            fillColor: '#BBF8E9',
            fillOpacity: 0.6
        });
        var panorama = new GMaps.createPanorama({
            el: "#panorama",
            lat: pos.coords.latitude,
            lng: pos.coords.longitude
        });
    });
});
</script>
@endsection
{{--
Local Variables:
mode: html
End:
--}}
