@extends('layout')
@section('title', '商品一覧')
@section('content')

<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>商品一覧</h2>
<!--↓↓ 検索フォーム ↑↑-->
<form class="form-inline" action="{{url('/search')}}" method="GET">
    <div class="form-group">
    <input type="text" name="keyword" value="@if (isset( $keyword )) $keyword @endif"placeholder="商品名を入力">
    <input list="companys" id="company" name="company" value="@if (isset( $companys )) $companys @endif"placeholder="会社名を選択or入力">
        <datalist id="companys">
            <option value="コカ・コーラボトラーズジャパンホールディングス">
            <option value="サントリーホールディングス">
            <option value="ヤクルト本社">
            <option value="伊藤園">
            <option value="大塚ホールディングス">
            <option value="キリンホールディングス">
        </datalist>

     </select>

    <input type="submit" value="検索" >

    </div>

<!--↑↑ 検索フォーム ↑↑-->
      @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
      @endif
      <table class="table table-striped">
</form>

        <tr>
              <th>商品ID</th>
              <th>商品画像</th>
              <th>商品名</th>
              <th>価格</th>
              <th>在庫数</th>
              <th>メーカー名</th>
              <th>詳細画面</th>
              <th>データ削除</th>
          </tr>
          @foreach($blogs as $blog)
          <tr>
              <td>{{ $blog->id }}</td>
              <td><img src="{{ Storage::url($blog->image)}}" width="30px"></td>
              <td>{{ $blog->productName }}</td>
              <td>{{ $blog->price }}</td>
              <td>{{ $blog->stock }}</td>
              <td>{{ $blog->company }}</td>
              <td><button type="button" class="btnbtn-primary" onclick="location.href='/blog/{{ $blog->id }}'">詳細表示</button></td>
              <form method="POST" action="{{ route('delete', $blog->id) }}" onSubmit="return checkDelete()">
            　@csrf
              <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td></form>
          </tr>
          @endforeach
      </table>
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
           }
    }
    </script>
@endsection
