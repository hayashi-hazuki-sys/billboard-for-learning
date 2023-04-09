@extends('layouts.site.base')

{{-- cssにてパスの判定に使用 --}}
{{-- 追加CSSの指定 --}}

{{-- ページ情報 --}}
@section('content')

    {{-- Main Contents --}}

    @if($user_flg)
        @if(!empty($article_list))
            @foreach($article_list as $article_data)
                <div>
                    投稿ユーザ：{{$article_data->nickname}}<br>
                    {{$article_data->genre_nm}}<br>
                    {{$article_data->body}}<br>
                    @if(!empty($article_data->demand_cha_id) || !empty($article_data->demand_cha_word))
                        求：@if(!empty($article_data->demand_cha_id)){{$article_data->demand_cha_nm}}@else{{$article_data->demand_cha_word}}@endif<br>
                    @endif
                    @if(!empty($article_data->give_cha_id) || !empty($article_data->give_cha_word))
                        譲：@if(!empty($article_data->give_cha_id)){{$article_data->give_cha_nm}}@else{{$article_data->give_cha_word}}@endif<br>
                    @endif
                    @if(!empty($article_data->deal_way_id))
                        取引方法：{{$article_data->deal_way_id}}<br>
                    @endif
                </div>
                <br>
            @endforeach
        @endif
    @endif

@endsection

{{-- 追加javascript --}}

