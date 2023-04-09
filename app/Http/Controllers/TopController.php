<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Reply;

class TopController extends SiteController
{

    public function page(Request $request)
    {
        switch ($request->input('action', 'index')) {
            case 'delete':
                return $this->delete($request);
            case 'list':
            default:
                return $this->index($request);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->put('msg');
        $article_list = [];
        //ログイン済みの場合投稿記事一覧取得
        if($this->user_flg){
            $article_object = new Article();
            $article_list = $article_object->getArticleList($this->user_id);
        }

        //投稿記事に対する返信件数を追加
        if(!empty($article_list)){
            foreach($article_list as $article_data){
                $reply_object = new Reply();
                $reply_cnt = $reply_object->getReplyCnt($article_data->article_id);
                $article_data->reply_cnt = $reply_cnt;
            }
        }

        return view('top')->with([
            'nickname' => $this->user_id,
            'article_list' => $article_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $article_id = $request->article_id;

        //記事削除
        $article_object = new Article();
        $article_object->ArticleDel($article_id);

        return redirect(route("site.top"))->with("del_msg", "投稿を削除しました");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
