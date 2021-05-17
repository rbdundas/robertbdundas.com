@extends('layouts.app')

@section('content')
    <section class="section">
        @if($alert ?? '')
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds">
                    <div class="message @if ($alert['type'] == 'danger') is-danger @else is-success @endif">
                        <div class="message-header">
                            <p>Message</p>
                            <button class="delete" aria-label="delete" onclick="this.parentElement.parentElement.style.display = 'none'"></button>
                        </div>
                        <div class="message-body">
                            {{ $alert['message'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @can('isAdmin')
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-two-thirds">
                        <a href="{{ route('post.edit', ['post_id' => $post['id']]) }}" class="button is-primary">Edit</a>
                        @if($post['published'] == false)
                            <a href="{{ route('post.publish', ['post_id' => $post['id']]) }}" class="button is-primary">Publish</a>
                        @else
                            <a href="{{ route('post.unpublish', ['post_id' => $post['id']]) }}" class="button is-primary">Unpublish</a>
                        @endif
                    </div>
                </div>
            </div>
        @endcan
        <post :post="{{ json_encode($post) }}"></post>
    </section>
    <section class="container pb-5">
        <div class="columns is-centered">
            <div class="column is-two-thirds ">
                <h3 class="is-size-3">Comments</h3>
                @can('isUser')
                    //show comments
                @else
                    You must be logged in to view or create comments.
                @endcan
            </div>
        </div>
    </section>
@endsection
