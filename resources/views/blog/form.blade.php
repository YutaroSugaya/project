@extends('layout')
@section('title', '新規追加')
@section('content')
    <div class="row">
        <div class="table-responsive">
            <div class="col-md-8 col-md-offset-2">
                <h2>新規登録フォーム</h2>
                <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
                    @csrf

                    <div class="form-group">
                        <label for="productName">
                            商品名
                        </label>
                        <input id="productName" name="productName" class="form-control" value="{{ old('productName') }}"
                            type="text">
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
                        <input id="price" name="price" class="form-control" value="{{ old('price') }}" type="text">
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
                        <input id="stock" name="stock" class="form-control" value="{{ old('stock') }}" type="text">
                        @if ($errors->has('stock'))
                            <div class="text-danger">
                                {{ $errors->first('stock') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label for="company">会社名</label>
                        <br>
                        <input list="companys" id="company" name="company" />
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
                        <textarea id="content" name="content" class="form-control"
                            rows="4">{{ old('content') }}</textarea>
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
                            登録する
                        </button>
                        <script src="{{ asset('js/hoge.js') }}"></script>
                    </div>
                </form>
            </div>
        </div>


        {{-- <script>
            function checkSubmit() {
                if (window.confirm('登録してよろしいですか？')) {
                    return true;
                } else {
                    return false;
                }
            }
        </script> --}}
    @endsection
