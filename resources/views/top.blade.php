@extends('layouts.site.base')

{{-- cssにてパスの判定に使用 --}}
{{-- 追加CSSの指定 --}}

{{-- ページ情報 --}}
@section('content')

    {{-- Header Menu --}}
    @includeIf('layouts.site.header')

    {{-- Main Contents --}}

    ログインユーザ：{{$nickname}}

    @if($user_flg)
        @if(!empty($article_list))
            @foreach($article_list as $article_data)
                <div>
                    {{$article_data->genre_nm}}<br>
                    {{$article_data->body}}<br>
                    求：{{$article_data->demand_cha_nm}}<br>
                    譲：{{$article_data->give_cha_nm}}<br>
                    返信数：{{$article_data->reply_cnt}}
                </div>
            @endforeach
        @endif
    @endif

@endsection

{{-- 追加javascript --}}

