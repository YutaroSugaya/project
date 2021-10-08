<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', '商品ID')</th>
        <th>商品画像</th>
        <th>@sortablelink('productName', '商品名')</th>
        <th>@sortablelink('price', '価格')</th>
        <th>@sortablelink('stock', '在庫数')</th>
        <th>@sortablelink('company', 'メーカー名')</th>
        <th>詳細画面</th>
        <th>データ削除</th>
    </tr>

    @foreach ($blogs as $blog)
        <tr class="blog-list">
            <td>{{ $blog->id }}</td>
            <td><img src="{{ Storage::url($blog->image) }}" width="30px"></td>
            <td>{{ $blog->productName }}</td>
            <td>{{ $blog->price }}</td>
            <td>{{ $blog->stock }}</td>
            {{-- @foreach ($companies as $company) --}}
            <td>{{ $companies->company_name }}</td>
            {{-- @endforeach --}}



            <td><button type="button" class="btn btn-success"
                    onclick="location.href='/blog/{{ $blog->id }}'">詳細表示</button></td>
            <td><button onclick="return confirm('本当に削除しますか？')" class="btn btn-danger removeList">削除</button></td>
            @csrf

        </tr>
    @endforeach
</table>

{!! $blogs->links() !!}
