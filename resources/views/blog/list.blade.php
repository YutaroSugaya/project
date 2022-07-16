@extends('layout')
@section('title', '商品一覧')
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-10 col-md-offset-2">
                    <h2>商品一覧</h2>


                    <p><input type="text" name="keyword" class="form-control mr-sm-2" id="keyword" placeholder="商品名または会社名を入力"></p>
                    <p><input type="text" name="number1" class="form-control mr-sm-2" id="number1" placeholder="価格下限"></p>
                    <p><input type="text" name="number2" class="form-control mr-sm-2" id="number2" placeholder="価格上限"></p>
                    <p><input type="text" name="number3" class="form-control mr-sm-2" id="number3" placeholder="在庫下限"></p>
                    <p><input type="text" name="number4" class="form-control mr-sm-2" id="number4" placeholder="在庫上限"></p>
                    <p><input type="button" value="検索" class="btn btn-primary" id="get_blogs"></p>


                    <div class="blog-table table">
                        @include('blog.list_child')
                    </div>

                    <script>
                       
                        $(function() {
                            //記事を削除するときの確認画面
                            $(document).on('click', '.removeList', function() {
                                $(this)
                                    .parent()
                                    .parent()
                                    .remove();
                            });


                            //検索ボタンをクリックして検索結果を表示する
                            $('#get_blogs').on('click', function() {
                                var number1 = $('#number1').val();
                                var number2 = $('#number2').val();
                                var number3 = $('#number3').val();
                                var number4 = $('#number4').val();
                                var keyword = $('#keyword').val();

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                    },
                                    url: '/blog/search/' + keyword + number1 + number2 + number3 + number4,
                                    type: 'POST',
                                    data: {
                                        'number1': number1,
                                        'number2': number2,
                                        'number3': number3,
                                        'number4': number4,
                                        'keyword': keyword

                                    },
                                    dataType: 'text',
                                }).done(function(data) {
                                    $('.blog-table').html(data);
                                    $('#number1').val(number1);
                                    $('#number2').val(number2);
                                    $('#number3').val(number3);
                                    $('#number4').val(number4);
                                    $('#keyword').val(keyword);
                                }).fail(function(jqXHR, textStatus, errorThrown) {
                                    console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                                    console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
                                    console.log("errorThrown    : " + errorThrown.message); // 例外情報
                                    console.log("URL            : " + url);
                                });
                            });


                            // ページネーション
                            $(document).on('click', '.hogehoge', function() {
                                var page = $(this).attr('href').split('page=')[1];
                                fetch_data(page);
                            });

                            function fetch_data(page) {
                                var number1 = $('#number1').val(); //検索ワード取得
                                var number2 = $('#number2').val(); //検索ワード取得
                                var number3 = $('#number3').val(); //検索ワード取得
                                var number4 = $('#number4').val(); //検索ワード取得
                                var keyword = $('#keyword').val(); //検索ワード取得
                                var url;

                                //keywordの有無でurlを指定
                                if (!number1) {
                                    url = '/blog/list';
                                } else {
                                    url = '/blog/search/' + number1;
                                }

                                if (!number2) {
                                    url = '/blog/list';
                                } else {
                                    url = '/blog/search/' + number2;
                                }

                                if (!number3) {
                                    url = '/blog/list';
                                } else {
                                    url = '/blog/search/' + number3;
                                }

                                if (!number4) {
                                    url = '/blog/list';
                                } else {
                                    url = '/blog/search/' + number4;
                                }


                                if (!keyword) {
                                    url = '/blog/list';
                                } else {
                                    url = '/blog/search/' + keyword;
                                }

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                    },
                                    url: url, //通信するリクエスト先
                                    type: 'POST',
                                    data: {
                                        'page': page
                                    },
                                }).done(function(data) {
                                    console.log(data);
                                    $('.blog-table').html(data);
                                    $('#number1').val(number1);
                                    $('#number2').val(number2);
                                    $('#number3').val(number3);
                                    $('#number4').val(number4);
                                    $('#keyword').val(keyword);
                                });
                            }
                        });
                    </script>




                    <!--↓↓ 検索フォーム ↑↑-->
                    {{-- <form class="form-inline" action="{{url('/search')}}" method="GET">
    <div class="form-group">
    <input type="text" name="keyword" value="@if (isset($keyword)) $keyword @endif"placeholder="商品名を入力">
    <input list="companys" id="company" name="company" value="@if (isset($companys)) $companys @endif"placeholder="会社名を選択or入力">
        <datalist id="companys">
            <option value="コカ・コーラボトラーズジャパンホールディングス">
            <option value="サントリーホールディングス">
            <option value="ヤクルト本社">
            <option value="伊藤園">
            <option value="大塚ホールディングス">
            <option value="キリンホールディングス">
        </datalist>

     </select>

     <td><button type="submit" class="btn btn-primary" onclick=>検索</button></td>

    </div>

<!--↑↑ 検索フォーム ↑↑-->
      @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
      @endif
</form> --}}
                </div>
            </div>

 @endsection
