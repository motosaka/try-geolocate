<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>位置情報の取得サンプル</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>設定ヘルプ：位置情報を許可する</h1>

    <!--タブ-->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">iPhone</a></li>
      <li><a href="#tab2" data-toggle="tab">Android</a></li>
    </ul>
    <!-- / タブ-->

    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="tab1">
	<p>以下の手順にしたがって位置情報へのアクセスを許可して下さい。<br/>※誤って当サイトを拒否した場合は<a href="#reset">リセット手順</a>を実行して下さい</p>
	<p id="ios-txt">手順1：設定画面を開いて「プライバシー」→「位置情報サービス」と進んで下さい。</p>
        <input type="button" class="btn btn-primary" id="iosBtn" href="javascript:void()" value="次へ" />
	<img id="ios-imgs" src="/image/ios8-1.png" width="100%" />
        <br/>
        <br/>
        <br/>
        <h2>設定をリセットするには</h2>
        <p>もし誤って承認ダイアログにて<span style="color: red;">当サイトの位置情報取得を「許可しない」とクリックした場合は、以下の設定でリセットを行う</span>必要があります。</p>
        <h3 id="reset">リセット手順</h3>
        <p>設定画面から「一般」「リセット」「位置情報とプライバシーをリセット」を選択し「設定をリセット」をクリックして下さい。
        <br/>※パスコードロックを設定している場合はパスコード入力画面が出ます</p>
        <img src="/image/ios8-4.png" width="100%" />
      </div>
      <div class="tab-pane fade" id="tab2">
	<p>アンドロイド用は準備中……</p>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script>
$(function($){
    var img = $('#ios-imgs'),
        txt = $('#ios-txt'),
        btn = $('#iosBtn'),
        imgList = ['/image/ios8-1.png',
                   '/image/ios8-2.png',
                   '/image/ios8-3.png'],
        txtList = ['手順1：設定画面を開いて「プライバシー」→「位置情報サービス」と進んで下さい。',
                   '手順2：位置情報サービス画面のスライダーをONにするとアプリ一覧が表示されます。',
                   '手順3：ご使用のブラウザ(通常は「Safari」)を選択し「許可」をクリックして下さい。'
                  +'<br/>(設定は以上です)'];
    var cnt = imgList.length;

    btn.on('click', function(event){
        event.preventDefault();
        event.stopPropagation();
        for(i = 0; i < cnt; i++) {
            if (img.attr('src') == imgList[i]) {
                next = (i + 1) % cnt;
                img.attr('src', imgList[next]);
                txt.html(txtList[next]);
                if (next == cnt - 1) {
                    $(this).val('最初へ');
                } else {
                    $(this).val('次へ');
                }
                break;
            }
        }
        return false;
    });
});
</script>
</body>
</html>
{{--
Local Variables:
mode: html
End:
--}}