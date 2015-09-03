@extends('layout')
@section('content')
<h1>位置情報 サンプル</h1>

<p id="geo-message"></p>

<br/><br/>

<h1>GoogleMapサンプル</h1>
<div id="gmap" style="width: 80%; height: 200px; background-color: #EFE;"></div>
<div id="panorama" style="width: 80%; height: 200px; background-color: #EFE;"></div>

<br/><br/><br/><br/>
<form>
<input type="button" onClick="$.removeCookie('geolocate-confirm');" value="(テスト用) クッキー削除">
</form>
@endsection
@section('geo_script')
<script src="/js/gmaps.js"></script>
<script>
$(function($){

    var obj_dump = function (obj) {
	var txt = '';
	for (var one in obj){
	    txt += one + "=" + obj[one] + "\n";
	}
	alert(txt);
    }

    // エラーメッセージをダイアログとラベルに表示
    var showErrMessage = function(caption, message){
        swal({
	    title: caption.replace(/\n/g, '<br/>'),
	    text: message.replace(/\n/g, '<br/>'),
	    type: "error",
	    html: true
	});
    }


    var geoGet = function(showOk){
        // gps に対応しているかチェック
        if (! navigator.geolocation) {
            $('#geo-message').text('位置情報が取得できませんでした (非対応ブラウザです)');
	    showErrMessage('位置情報が取得できません', 'お使いのブラウザは位置情報機能に対応していません');
            return false;
        }
     
        $('#geo-message').text('位置情報を取得します...');
     
        // gps取得開始
	navigator.geolocation.getCurrentPosition(function(pos) {
            // gps 取得成功
	    if (showOk) {
		swal({
                    title: "許可ありがとうございます",
                    text: "位置情報の取得に成功しました",
                    type: "success"
		});
	    }

    	    var lat = Math.round(pos.coords.latitude * 100) / 100;
    	    var lon = Math.round(pos.coords.longitude * 100) / 100;
    	    var ns;
    	    if (lat < 0) { 
    		lat = 0 - lat;
    		ns = '南緯'+lat+'度';
    	    } else {
    		ns = '北緯'+lat+'度';
    	    }
    	    var ew;
    	    if (lon < 0) { 
    		lon = 0 - lon;
    		ew = '西経'+lon+'度';
    	    } else {
    		ew = '東経'+lon+'度';
    	    }
    
    	    $('#geo-message').text('貴方の位置情報は'+ns+':'+ew+'です');

            // Google Map
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

        }, function(error) {
            // gps 取得失敗
	    var caption = '不明なエラー';
	    var message = '未定義のエラーです。';
	    var c = error.code;
            switch (c) {
              case error.PERMISSION_DENIED:
                caption = "位置情報の取得が\n許可されていません",
		message = "お使いのブラウザから承認ダイアログが\n"
	    	        + "表示されていれば許可してください。\n\n"
	    	        + "またダイアログが表示されない場合は\n"
	    	        + "ご使用端末の設定画面で有効にして下さい。\n\n"
	    	        + "→ヘルプ：<a href=\"/help\" target=\"_blank\">設定の変更方法</a>\n";
                break;
              case error.POSITION_UNAVAILABLE:
                caption = "お客様のデバイスが\nエラーを報告しています";
		message = "お客様のデバイスが位置情報を正しく扱えておりません。\n"
		        + "(デバイスの再起動で改善される可能性があります)";
                break;
              case error.TIMEOUT:
                caption = "位置情報の取得中に\nタイムアウトしました";
		message = "電波の悪い環境にいると予想されます。\n"
		        + "恐れ入りますが場所を移動されるか\n時間を置いて再度お試し下さい。";
                break;
            }
            $('#geo-message').text('位置情報が取得できませんでした ('+error.message+')');
	    showErrMessage(caption, message);
            return false;
        }, {
	    enableHighAccuracy: true,
	    timeout: 15000,
	    maximumAge: 0
	});
    };

    // ----------------------------------------------------------------
    var is_confirmed = $.cookie("geolocate-confirm");
    if (is_confirmed) {
	geoGet(false);
    }
    else {
        swal({
            title: "位置情報を取得します",
	    html: true,
            text: "本サイトは周辺不動産情報を検索するためデバイスの位置情報を使用いたします。<br/>"
		+ "ご利用にあたり位置情報の取得許可をお願いいたします。<br/>"
		+ '<span style="font-size: 75%">'
		+ "※当サイトが位置情報を収集または外部送信することはありません。"
                + "またアンテナ等の状況により取得には最大15秒かかることがあります。"
		+ '</span>',
            type: "warning",
            closeOnConfirm: false, //エラー表示のため
            showCancelButton: true,
            confirmButtonColor: "#6BD5BD",
            confirmButtonText: "取得する",
            cancelButtonText: "取得しない"
        },
        function(){
	    $.cookie("geolocate-confirm" , "true", { expires: 7, path: "/" });
	    geoGet(true);
        });
    }
});
</script>
@endsection
{{--
Local Variables:
mode: html
End:
--}}
