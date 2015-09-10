<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>位置情報の取得サンプル</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="container">
    <h1>設定ヘルプ：位置情報を許可する</h1>
    <p>以下の手順は、システム設定と標準ブラウザでの手順になります。
      <br/>標準以外のブラウザにおいて位置情報を許可する設定については、各ブラウザのマニュアルをご覧ください。</p>

    <!--タブ-->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">iPhone</a></li>
      <li><a href="#tab2" data-toggle="tab">Android</a></li>
    </ul>
    <!-- / タブ-->

    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="tab1">
	<p>以下の手順にしたがって位置情報へのアクセスを許可して下さい。<br/>※誤って当サイトを拒否した場合は<a href="#reset">リセット手順</a>を実行して下さい</p>
        <h2>位置情報サービスを有効にするには</h2>
	<p id="ios-txt">手順1：設定画面を開いて「プライバシー」→「位置情報サービス」と進んで下さい。</p>
        <input type="button" class="btn btn-primary" id="iosBtn" href="javascript:void()" value="次へ" />
	<img id="ios-imgs" src="/image/ios8-1.png" width="100%" />
        <br/>
        <br/>
        <br/>
        <h2>設定をリセットするには</h2>
        <p>もし誤って承認ダイアログにて<span style="color: red;">当サイトの位置情報取得を「許可しない」とクリックした場合は、以下の手順で設定をリセット</span>して下さい。</p>
        <h3 id="reset">リセット手順</h3>
        <p>設定画面から「一般」「リセット」「位置情報とプライバシーをリセット」を選択し「設定をリセット」をクリックして下さい。
        <br/>※パスコードロックを設定している場合はパスコード入力画面が出ます</p>
        <img src="/image/ios8-4.png" width="100%" />
      </div>
      <div class="tab-pane fade" id="tab2">
	<p>アンドロイドでは端末の設定とブラウザの設定との２箇所で位置情報へのアクセスを許可して下さい。
	  <br/>※誤って当サイトを拒否した場合は<a href="#reset2">リセット手順</a>を実行して下さい</p>

        <h2>位置情報サービスを有効にするには</h2>
        <div class="list-group" id="accordion3">
          <a data-toggle="collapse" data-parent="#accordion3" href="#collapse31" class="list-group-item">
              (1) システム設定画面から「位置情報サービス」を開きます。
	      <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
            <div id="collapse31" class="collapse in">
              <p class="list-group-item">
		「Google位置情報サービス」と「GPS機能」を有効にして下さい。
                <img src="/image/xperia-1.png" width="100%" />
              </p>
            </div>
            <a data-toggle="collapse" data-parent="#accordion3" href="#collapse32" class="list-group-item">
              (2) ブラウザのメニューから「設定」を開きます。
	      <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="collapse32" class="collapse">
              <img src="/image/xperia-2.png" width="50%" />
            </div>
 
            <a data-toggle="collapse" data-parent="#accordion3" href="#collapse33" class="list-group-item">
              (3) 「プライバシーとセキュリティ」を開き、「位置情報を有効にする」にチェックを入れて下さい。
	      <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="collapse33" class="collapse">
              <img src="/image/xperia-3.png" width="100%" />
            </div>
          </div>

        <h2 id="reset2">設定をリセットするには</h2>
        <p>もし誤って承認ダイアログにて<span style="color: red;">当サイトの位置情報取得を「許可しない」とクリックした場合は、以下の手順で設定をリセット</span>して下さい。</p>
        <div class="list-group" id="accordion4">
            <a data-toggle="collapse" data-parent="#accordion4" href="#collapse41" class="list-group-item">
              (1) ブラウザのメニューから「設定」を開きます。
	      <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="collapse41" class="collapse">
              <img src="/image/xperia-2.png" width="50%" />
            </div>

            <a data-toggle="collapse" data-parent="#accordion4" href="#collapse42" class="list-group-item">
	      (2) 「プライバシーとセキュリティ」を開き、「位置情報アクセスを削除」をクリックします。
	      <span class="glyphicon glyphicon-chevron-down pull-right"></span>
            </a>
            <div id="collapse42" class="collapse">
	      <p class="list-group-item">
		ダイアログが出るのでOKを選択して下さい。
		<img src="/image/xperia-4.png" width="100%" />
	      </p>
            </div>
        </div>

      </div><!-- end of android -->
    </div>
  </div>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
