@extends('layouts.site.base')
@section('content')
    {{-- Header Menu --}}
    @includeIf('layouts.site.header')

    {{-- Main Contents --}}
    ログインユーザ：{{$nickname}}

@endsection

{{-- 追加javascript --}}

