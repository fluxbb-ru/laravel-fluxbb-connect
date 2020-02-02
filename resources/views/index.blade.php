@extends('layouts.app')

@section('styles')
<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: .88rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: left;
        background-color: #eef1f3
    }

    .card {
        box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
        border-width: 0;
        transition: all .2s
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card-header {
        display: flex;
        align-items: center;
        border-bottom-width: 1px;
        padding-top: 0;
        padding-bottom: 0;
        padding-right: .625rem;
        height: 3.5rem;
        background-color: #fff;
        border-bottom: 1px solid rgba(26, 54, 126, 0.125)
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem
    }

    .flex-truncate {
        min-width: 0 !important
    }

    .d-block {
        display: block !important
    }

    a {
        color: #E91E63;
        text-decoration: none !important;
        background-color: transparent
    }

    .media img {
        width: 40px;
        height: auto
    }
</style>
@section('content')

    <div class="container-fluid mt-100">
    @foreach ($categories as $catName => $forums)
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header pr-0 pl-0">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col font-weight-bold pl-3">{{ $catName }}</div>
                                <div class="d-none d-md-block col-6 text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3">Threads</div>
                                        <div class="col-3">Replies</div>
                                        <div class="col-6">Last update</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($forums as $forum)
                            <div class="card-body py-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col"><a href="#" class="text-big font-weight-semibold"
                                                        data-abc="true">{{ $forum->forum_name }}</a></div>
                                    <div class="d-none d-md-block col-6">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3">{{ $forum->num_topics }}</div>
                                            <div class="col-3">{{ $forum->num_posts }}</div>
                                            <div class="media col-6 align-items-center">
                                                @if ($post = $forum->recentPost)
                                                    <img src="{!! avatar($post->author) !!}" alt=""
                                                         class="d-block ui-w-30 rounded-circle">
                                                    <div class="media-body flex-truncate ml-2">
                                                        <a href="#" class="d-block text-truncate"
                                                           data-abc="true">{{ $post->topic->subject }}</a>
                                                        <div class="text-muted small text-truncate">{!! $post->posted !!} &nbsp;·&nbsp;
                                                            <a href="#" class="text-muted"
                                                               data-abc="true">{{ $post->author->name }}</a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="/img/avatar/default.png" alt=""
                                                         class="d-block ui-w-30 rounded-circle">
                                                    <div class="media-body flex-truncate ml-2">
                                                        Never
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0">
                        @endforeach {{-- $forums --}}
                    </div>
                </div>
            </div>
    @endforeach {{-- $categories --}}
    </div>

@endsection
