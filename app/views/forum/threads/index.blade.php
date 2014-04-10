@extends('layouts._two_columns_left_sidebar')

@section('sidebar')
    @include('forum._sidebar')
@stop

@section('content')
    <section class="forum">
        <div class="header">
            <h1>{{ trans('app.forum') }}</h1>
                {{-- Display select tags --}}
                @if(Input::get('tags', null))
                    <div class="tags">
                        {{ Input::get('tags') }}
                    </div>
                @endif
            <a class="button" href="{{ action('ForumThreadsController@getCreateThread') }}">{{ trans('forum.threads.create-thread') }}</a>
        </div>

        <div class="filter">
            <p>{{ trans('forum.threads.showing') }}:</p>
            <ul>
                <li><a href="{{ action('ForumThreadsController@getIndex', '') . $queryString }}" class="{{ Request::path() == 'forum' ? 'current' : '' }}">{{ trans('forum.threads.showings.all') }}</a></li>
                <li><a href="{{ action('ForumThreadsController@getIndex', 'open') . $queryString }}" class="{{ Request::is('forum/open') ? 'current' : '' }}">{{ trans('forum.threads.showings.open') }}</a></li>
                <li><a href="{{ action('ForumThreadsController@getIndex', 'solved') . $queryString }}" class="{{ Request::is('forum/solved') ? 'current' : '' }}">{{ trans('forum.threads.showings.solved') }}</a></li>
            </ul>
        </div>

        <div class="threads">
            {{-- Loop over the threads and display the thread summary partial --}}
            @each('forum.threads._index_summary', $threads, 'thread')

            {{-- If no comments are found display a message --}}
            @if( ! $threads->count())
                <div class="empty-state">
                    @if(Input::get('tags'))
                        <h3>{{ trans('forum.threads.no-threads-found-tagged-with-1', ['tags' => Input::get('tags')]) }}</h3>
                    @else
                        <h3>{{ trans('forum.threads.no-threads-found') }}</h3>
                    @endif
                    <a class="button" href="{{ action('ForumThreadsController@getCreateThread') }}">{{ trans('forum.threads.create-new-thread') }}</a>
                </div>
            @endif
        </div>

        <div class="pagination">
            {{ $threads->links() }}
        </div>
    </section>
@stop
