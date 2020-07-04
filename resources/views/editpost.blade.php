@extends('layouts.app')

@section('content')
    <section class="section">
        <edit-post :post="{{ json_encode($post) }}"
                   save_post_route="{{ route('post.save') }}"
                   csrf="{{ csrf_token() }}"></edit-post>
    </section>
@endsection
