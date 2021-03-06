jQuery(function($) {
 
    // gps に対応しているかチェック
    if (! navigator.geolocation) {
        $('#gmap').text('GPSに対応したブラウザでお試しください');
        return false;
    }
 
    $('#gmap').text('GPSデータを取得します...');
 
    // gps取得開始
    navigator.geolocation.getCurrentPosition(function(pos) {
        // gps 取得成功

	// プロパティ名 	概要
	// latitude 	緯度の値
	// longitude 	経度の値
	// altitude 	高度の値
	// accuracy 	緯度、経度の精度
	// altitudeAccuracy 	高度の精度
	// heading 	方角（度）
	// speed 	速度（ｍ/S）

        // google map 初期化
        var gmap = new google.maps.Map($('#gmap').get(0), {
            center: new google.maps.LatLng(35, 135),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 17
        });
 
        // 現在位置にピンをたてる
        var currentPos = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
        var currentMarker = new google.maps.Marker({
            position: currentPos
        });
        currentMarker.setMap(gmap);
 
        // 誤差を円で描く
        new google.maps.Circle({
            map: gmap,
            center: currentPos,
            radius: pos.coords.accuracy, // 単位はメートル
            strokeColor: '#0088ff',
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: '#0088ff',
            fillOpacity: 0.2
        });
 
        // 現在地にスクロールさせる
        gmap.panTo(currentPos);
 
    }, function() {
        // gps 取得失敗
        $('#gmap').text('GPSデータを取得できませんでした');
        return false;
    });
});
