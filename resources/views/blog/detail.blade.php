@extends('layout')
@section('title', 'ブログ詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <tr>
        <td>{{ $blog->id }}</td>
        <td><img src="{{ Storage::url($blog->image)}}" width="60px"></td>
        <br>
        <td>商品名:{{ $blog->productName }}</td>
        <br>
        <td>価格:{{ $blog->price }}</td>
        <br>
        <td>在庫数:{{ $blog->stock }}</td>
        <br>
        <td>会社名:{{ $blog->company }}</td>
        <br>
        <td>コメント: {{ $blog->content }}</td>
    </tr>
    <br>
        
        <div class="mt-5">
            <a class="btn btn-secondary" href="{{ route('blogs') }}">
                戻る
            </a>
            <td><button type="button" class="btnbtn-primary" onclick="location.href='/blog/edit/{{ $blog->id }}'">編集</button></td>
            </button>
        </div>
            </button>
  </div>
</div>
@endsection
