<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{


      //  ログインしていないとController内の処理ができないようにする
      public function __construct()
      {
          $this->middleware('auth')->except(['exeSrore']);
      }


    public function showHome()
    {
        $blogs = Blog::all();
        return view('blog.welcome', ['blogs' => $blogs]);
    }
    /**
     *　一覧を表示する
     * @return view
     */

    public function showList()
    {
        $blogs = Blog::paginate(20);

        return view('blog.List', ['blogs' => $blogs]);

    }

    //検索機能
    public function getSearch(Request $request)
    {
        // キーワードを取得
        $keyword = $request->input('keyword');

        $companys = $request->input('company');

        //クエリ作成
        $query = Blog::query();

        //キーワードが入力されている場合
        if(!empty($keyword))
        $query->where('productName', 'like', '%'.$keyword.'%');

        $blogs = $query->paginate(20);

         //会社名が入力されている場合
        if(!empty($companys))
        $query->where('company', 'like', '%'.$companys.'%');

        $blogs = $query->paginate(20);

        return view('blog.list')->with(compact("blogs"));
    }



    /**
     *　詳細を表示する
     *　@param int $id
     * @return view
     */

    public function showDetail($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.Detail', ['blog' => $blog]);
    }


     /**
     *　登録画面を表示する
     * @return view
     */

    public function showCreate() {
        return view('blog.form');
    }

    /**
     *　新規登録をする
     * @return view
     */

    public function exeStore(BlogRequest $request)
    {


       //データを受け取る
       $inputs = $request->all();
       \DB::beginTransaction();
       try {
       //登録
       Blog::create($inputs);
       \DB::commit();
       }catch(\Throwable $e) {
           \DB::rollback();
           abort(500);

       }
        \Session::flash('err_msg', '商品を登録しました');
        return redirect(route('blogs'));
    }


    /**
     *　編集フォームを表示する
     *　@param int $id
     * @return view
     */

    public function showedit($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     *　更新をする
     * @return view
     */

    public function exeUpdate(BlogRequest $request)
    {
        //データを受け取る
        $inputs = $request->all();


        \DB::beginTransaction();
        try {
        //編集内容登録
        $blog = Blog::find($inputs['id']);
        $blog -> fill([

            'productName' => $inputs['productName'],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'company' => $inputs['company'],
            'content' => $inputs['content'],
            'image' => $inputs['image'],

        ]);
        $blog->save();
        \DB::commit();
        }catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('blogs'));
    }

    /**
     *　削除
     *　@param int $id
     * @return view
     */

    public function exeDelete($id)
    {

        $blog = Blog::destroy($id);

        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        try {
            //データを削除
            Blog::destroy($id);
            }catch(\Throwable $e) {
                abort(500);
            }

            \Session::flash('err_msg', '削除しました。');
            return redirect(route('blogs'));
    }

}
