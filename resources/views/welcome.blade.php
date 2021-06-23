@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <home-view :projects="{{ json_encode($projects) }}"
                       :articles="{{ json_encode($articles) }}"
                       :wp_articles="{{ json_encode($wp_articles) }}"
                       wppostroute="https://robertbdundas.com/wp"
                       list_articles_route="{{ route('articles') }}"
                       logged_in="{{ session('status') }}"
                       viewpostroute="{{ route('post.view') }}"></home-view>
        </div>
    </section>
@endsection
