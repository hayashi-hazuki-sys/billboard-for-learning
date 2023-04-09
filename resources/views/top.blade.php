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
                    @if(!empty($article_data->demand_cha_id) || !empty($article_data->demand_cha_word))
                        求：@if(!empty($article_data->demand_cha_id)){{$article_data->demand_cha_nm}}@else{{$article_data->demand_cha_word}}@endif<br>
                    @endif
                    @if(!empty($article_data->give_cha_id) || !empty($article_data->give_cha_word))
                        譲：@if(!empty($article_data->give_cha_id)){{$article_data->give_cha_nm}}@else{{$article_data->give_cha_word}}@endif<br>
                    @endif
                    返信数：{{$article_data->reply_cnt}}<br>
                    <a href="{{route("site.top")}}?action=delete&article_id={{$article_data->article_id}}" class="del-btn">削除</a>
                </div>
                <br>
            @endforeach
        @endif
    @endif

@endsection

{{-- 追加javascript --}}
@push('add_js')
    <script src="../../js/top.js"></script>
@endpush

