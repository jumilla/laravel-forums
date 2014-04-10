<header class="top-navigation">
    <div class="top-navigation-logo">
        <a href="http://laravel.jp">
            <img class="logo" src="/images/laravel-four-icon.png">
        </a>
    </div>
    <nav>
        <ul>
            <li>
               <a href="http://laravel.jp">Laravel.jp</a>
            </li>
            <li>
                <a class="{{ Request::is('forum*') ? 'active' : null }}" href="{{ action('ForumThreadsController@getIndex') }}">{{ trans('app.forum') }}</a>
            </li>
{{--
            <li>
                <a class="{{ Request::is('chat*') ? 'active' : null }}" href="{{ action('ChatController@getIndex') }}">Live Chat</a>
            </li>
--}}
{{--
            <li>
                <a href="{{ action('PastesController@getCreate') }}">Pastebin</a>
            </li>
--}}
{{--
            <li>
                <a href="http://www.buzzsprout.com/11908">Podcast</a>
            </li>
--}}
{{--
            <li>
                <a target="_blank" href="http://forumsarchive.laravel.io/">Old Forum Archive</a>
            </li>
--}}
        </ul>
    </nav>
    <ul class="user-navigation">
        @if(Auth::check())
            {{-- <li><a href="{{ action('DashboardController@getIndex') }}">{{ $currentUser->name }}<span class="dashboard-word">'s Dashboard</span></a></li> --}}
            <li><a class="button" href="{{ action('AuthController@getLogout') }}">{{ trans('app.logout') }}</a></li>
        @else
            <li><a class="button" href="{{ action('AuthController@getLogin') }}">{{ trans('app.login') }}</a></li>
        @endif
    </ul>
</header>
