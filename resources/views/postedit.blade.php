@extends('layouts.site.base')

{{-- cssにてパスの判定に使用 --}}
@push('user_id', $user_id)
{{-- 追加CSSの指定 --}}

{{-- ページ情報 --}}
@section('content')

    {{-- Header Menu --}}
    @includeIf('layouts.site.header')

    {{-- Main Contents --}}


    ログインユーザ：{{$user_id}}
    <form method="post" action="{{route('site.article_post')}}">
        @csrf
        <label for="genre_id">グループ名:</label>
        <select name="genre_id">
            @foreach ($genre_list as $genre_data)
                <option value="{{$genre_data->genre_id}}">{{$genre_data->genre_nm}}</option>
            @endforeach
        </select>

        <br>
        <label for="demand_cha_word">求:</label>
        <input type="text" name="demand_cha_word">

        <br>
        <label for="demand_cha_word">譲:</label>
        <input type="text" name="give_cha_word">

        <br>
        <label for="body">内容:</label>
        <textarea name="body" rows="4" cols="40"></textarea>

        <br>
        <label for="image">画像:</label>
        <input type="file" name="image">

        <br>
        <input type="hidden" name="user_id" value="@stack('user_id')">

    <input type="submit" value="送信">

@endsection

{{-- 追加javascript --}}

