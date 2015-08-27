jQuery(function($) {
 
    // gps に対応しているかチェック
    if (! navigator.geolocation) {
        $('#geo-message').text('位置情報が取得できませんでした (ブラウザが非対応です)');
        return false;
    }
 
    $('#geo-message').text('位置情報を取得します...');
 
    // gps取得開始
    navigator.geolocation.getCurrentPosition(function(pos) {
        // gps 取得成功
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
    }, function(error) {
        // gps 取得失敗
        var message = "不明なエラー";
        switch (error.code) {
          case error.POSITION_UNAVAILABLE:
            message = "位置情報の取得ができませんでした";
            break;
          case error.PERMISSION_DENIED:
            message = "位置情報取得の使用許可がされませんでした";
            break;
          case error.PERMISSION_DENIED_TIMEOUT:
            message = "位置情報取得中にタイムアウトしました";
            break;
        }

        $('#geo-message').text('位置情報が取得できませんでした ('+message+')');
        return false;
    }, {timeout:15000});
});
