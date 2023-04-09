<header>
    <div class="container">
        <div class="row">
            <div class="d-none d-sm-block col-sm-2 header-logo">
                <a href="{{route("site.top")}}">
                    サイトTOP
                </a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route("site.postedit")}}">
                        投稿する
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route("site.postlist")}}">
                        投稿一覧
                    </a>
                </li>
                @if ($user_flg)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route("site.login")}}">
                            ログイン
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route("site.logout")}}">
                            ログアウト
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>

