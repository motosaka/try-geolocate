@extends('layout')
@section('content')
<h1>位置情報 サンプル</h1>

<p id="geo-message"></p>

<br/><br/>

<h1>GoogleMapサンプル</h1>
<div id="gmap" style="width: 80%; height: 400px; background-color: #EFE;"></div>
<div id="panorama" style="width: 80%; height: 400px; background-color: #EFE;"></div>

<br/><br/><br/><br/>
<form>
<input id="to_inputbox" type="text" name="timeout" value="{{ $inputs['timeout'] or '' }}">
<input type="button" onClick="$.removeCookie('geolocate-confirm');" value="(テスト用) クッキー削除">
</form>
@endsection
@section('geo_script')
<script async src="/js/call-js1.js"></script>
@endsection
{{--
Local Variables:
mode: html
End:
--}}
