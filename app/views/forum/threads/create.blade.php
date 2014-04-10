@extends('layouts._two_columns_left_sidebar')

@section('sidebar')
    @include('forum._sidebar')
@stop

@section('content')
        <div class="header">
            <h1>{{ trans('forum.threads.create-thread') }}</h1>
        </div>
        {{ Form::open(['data-persist' => 'garlic', 'data-expires' => '600']) }}
        <section class="padding">
            <div class="form-row">
                {{ Form::label('subject', trans('forum.threads.subject'), ['class' => 'field-title']) }}
                {{ Form::text('subject', null, ['placeholder' => trans('forum.threads.subject')]) }}
                {{ $errors->first('subject', '<small class="error">:message</small>') }}
            </div>

            <div class="form-row">
                {{ Form::label('body', trans('forum.threads.thread'), ['class' => 'field-title']) }}
                {{ Form::textarea("body", null) }}
                {{ $errors->first('body', '<small class="error">:message</small>') }}
                <small><a href="http://laravel.io/forum/01-31-2014-how-to-mark-up-forum-posts" target="_BLANK">Learn how to mark up your post here.</a></small>
            </div>

            <div class="form-row">
                {{ Form::label('is_question', trans('forum.threads.thread-type'), ['class' => 'field-title']) }}
                <ul class="version tags _question_tags">
                    <li>
                        <label class="tag">
                            {{ trans('forum.threads.question') }}
                            {{ Form::radio('is_question', 1, true) }}
                        </label>
                    </li>
                    <li>
                        <label class="tag">
                            {{ trans('forum.threads.conversation') }}
                            {{ Form::radio('is_question', 0, false) }}
                        </label>
                    </li>
                </ul>
                {{ $errors->first('is_question', '<small class="error">:message</small>') }}
            </div>

            <div class="form-row">
                {{ Form::label('laravel_version', 'Laravel '.trans('forum.threads.version'), ['class' => 'field-title']) }}
                <ul class="version tags _version_tags">
                    <li>
                        <label class="tag">
                            {{ trans('forum.threads.versions.4') }}
                            {{ Form::radio('laravel_version', 4, true) }}
                        </label>
                    </li>
                    <li>
                        <label class="tag">
                            {{ trans('forum.threads.versions.3') }}
                            {{ Form::radio('laravel_version', 3) }}
                        </label>
                    </li>
                    <li>
                        <label class="tag">
                            {{ trans('forum.threads.versions.0') }}
                            {{ Form::radio('laravel_version', 0) }}
                        </label>
                    </li>
                </ul>
                {{ $errors->first('laravel_version', '<small class="error">:message</small>') }}
            </div>

            <div class="form-row tags">
                @include('forum._tag_chooser')
            </div>

            <div class="form-row">
                {{ Form::button(trans('forum.threads.save'), ['type' => 'submit', 'class' => 'button']) }}
            </div>
        </section>
        {{ Form::close() }}
@stop
