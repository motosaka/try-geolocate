@extends('layout')
@section('content')
<h1>位置情報 サンプル1</h1>

<p id="geo-message" />

@endsection
@section('geo_script')
jQuery(function($) {
    var is_confirmed = $.cookie("geolocate-confirm");
    if (is_confirmed) {
        $.getScript("/js/try-geo.js", function(){});
    }
    else {
        swal({
            title: "位置情報を取得します",
            text: "本サイトは周辺不動産情報を検索するために\nデバイスの位置情報を使用いたします。\n\nご利用にあたり位置情報取得の許可をお願いいたします。\n※当サイトが位置情報を記録したり、\n外部送信することはありません。",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#6BD5BD",
            confirmButtonText: "取得を許可する",
            cancelButtonText: "許可しない",
            closeOnConfirm: false
        },
        function(){
            swal({
                title: "許可ありがとうございます",
                text: "アンテナ等の状況により位置情報取得には最大15秒かかることがあります。",
                type: "success"
            },
            function(){
                $.cookie("geolocate-confirm" , "true", { expires: 7, path: "/" });
                $.getScript("/js/try-geo.js", function(){});
            });
        });
    }
});
<br/><br/><br/><br/>
<form>
<input type="button" onClick="$.removeCookie('geolocate-confirm');" value="(テスト用) クッキー削除">
</form>
@endsection
{{--
Local Variables:
mode: html
End:
--}}
