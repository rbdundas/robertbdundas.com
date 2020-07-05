@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            @can('isAdmin')
                <a href="{{ route('post.new') }}">Create a new post</a>
            @elsecan('isUser')
                You're a User!
            @else
                You're a Guest!
            @endcan
        </div>
    </div>
</div>
@endsection
