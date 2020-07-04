@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <home-view :projects="{{ json_encode($projects) }}"
                       :articles="{{ json_encode($articles) }}"
                       logged_in="{{ session('status') }}"
                       viewpostroute="{{ route('post.view') }}"></home-view>
        </div>
    </section>
@endsection
