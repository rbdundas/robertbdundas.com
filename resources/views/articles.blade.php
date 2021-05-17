@extends('layouts.app')

@section('content')
    <list-articles :articles="{{ json_encode($articles) }}"
                   list_articles_route="{{ route('articles') }}"
                   view_post_route="{{ route('post.view') }}"
                   edit_post_route="{{ route('post.edit') }}"
                   @can('isAdmin') is_admin="true" @else is_admin="false" @endcan>
    </list-articles>
@endsection
