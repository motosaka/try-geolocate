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
<dl>
<dt>タイムアウト値</dt><dd><input id="to_inputbox" type="text" name="timeout" value="{{ $inputs['timeout'] or '' }}"></dd>
<dt>動作モード(confirm,noconfirm,空)</dt><dd><input id="init_inputbox" type="text" name="init_mode" value="{{ $inputs['init_mode'] or '' }}"></dd>
<dt>再読み込み</dt><dd><input type="submit" value="リロード"></dd>
<dt>クッキー削除</dt><dd><input type="button" onClick="$.removeCookie('geolocate-confirm');" value="(テスト用) クッキー削除"></dd>
</dl>
</form>
@endsection
@section('geo_script')
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="/js/gmaps.js"></script>
<script src="/js/call-js1.js"></script>
@endsection
{{--
Local Variables:
mode: html
End:
--}}
