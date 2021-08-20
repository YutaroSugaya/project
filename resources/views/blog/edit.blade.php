@extends('layout')
@section('title', '編集フォーム')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{ $blog->id }}">
            <div class="form-group">
                <label for="productName">
                    商品名
                </label>
                <input
                    id="productName"
                    name="productName"
                    class="form-control"
                    value="{{ $blog->productName }}"
                    type="text"
                >
                @if ($errors->has('productName'))
                    <div class="text-danger">
                        {{ $errors->first('productName') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="{{ $blog->price }}"
                    type="text"
                >
                @if ($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="stock">
                    在庫数
                </label>
                <input
                    id="stock"
                    name="stock"
                    class="form-control"
                    value="{{ $blog->stock }}"
                    type="text"
                >
                @if ($errors->has('stock'))
                    <div class="text-danger">
                        {{ $errors->first('stock') }}
                    </div>
                @endif
                </div>

            <div class="form-group">
                <label for="company">
                    会社名
                </label>
                <input list="companys"
                    id="company"
                    name="company"
                    class="form-control"
                    value="{{  $blog->company }}"
                    type="text" />
                    <datalist id="companys">
                        <option value="コカ・コーラボトラーズジャパンホールディングス">
                        <option value="サントリーホールディングス">
                        <option value="ヤクルト本社">
                        <option value="伊藤園">
                        <option value="大塚ホールディングス">
                        <option value="キリンホールディングス">
                    </datalist>



                @if ($errors->has('company'))
                    <div class="text-danger">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                </div>

            <div class="form-group">
              <label for="content">
                  コメント
              </label>
              <textarea
                  id="content"
                  name="content"
                  class="form-control"
                  rows="4"
              >{{  $blog->content  }}</textarea>
              @if ($errors->has('content'))
                  <div class="text-danger">
                      {{ $errors->first('content') }}
                  </div>
              @endif
          </div>

          <input id="image" type="file" name="image">

            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('blogs') }}">
                    戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
