<section class="alert">
    @if (Session::has('success'))
        <div data-alert class="alert-box success">
            {{ implode('<br />', (array) Session::get('success')) }}
        </div>
    @endif

    @if (Session::has('error'))
        <div data-alert class="alert-box alert">
            {{ implode('<br />', (array) Session::get('error')) }}
        </div>
    @endif

    {{-- Laravel Form Errors --}}
    @if ($errors->count() > 0)
        <div data-alert class="alert-box alert">
            {{ trans('forum.threads.post-error-message') }}
        </div>
    @endif
</section>