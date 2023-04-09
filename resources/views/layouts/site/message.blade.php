@if( session('del_msg') )
    <div>{!! session()->pull('del_msg') !!}</div>
@endif
