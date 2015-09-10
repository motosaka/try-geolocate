<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>位置情報の取得サンプル</title>
	<meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- css <link href="{{{asset('/assets/css/***.css')}}}" rel="stylesheet"> -->
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
</body>

	<script async src="/js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

  <script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script async src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script async src="//maps.google.com/maps/api/js?sensor=true"></script>
  @yield('geo_script')
</html>
{{--
Local Variables:
mode: html
End:
--}}
