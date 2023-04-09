@if( session('del_msg') )
    {!! session()->pull('del_msg') !!}
@endif
