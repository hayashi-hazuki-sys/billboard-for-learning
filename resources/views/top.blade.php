@extends('layouts.site.base')

{{-- cssにてパスの判定に使用 --}}
{{-- 追加CSSの指定 --}}

{{-- ページ情報 --}}
@section('content')

    {{-- Header Menu --}}
    @includeIf('layouts.site.header')

    {{-- Main Contents --}}

    ログインユーザ：{{$nickname}}

@endsection

{{-- 追加javascript --}}

