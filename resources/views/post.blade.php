@extends('layouts.app')

@section('content')
    <section class="section">
        <post :post="{{ json_encode($post) }}">
            {{ $post['article'] }}
        </post>
    </section>
@endsection
