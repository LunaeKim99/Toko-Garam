@extends('layouts.app')

@section('meta_title', 'Beranda — Garam Nusantara Jepara')
@section('meta_description', 'Garam Nusantara Jepara — produsen garam premium langsung dari tambak di Jepara, Jawa Tengah.')

@section('content')
    @include('partials.hero')
    @include('partials.features')
    @include('partials.about-preview')
    @include('partials.product-highlights')
    @include('partials.product-advantages')
    @include('partials.process')
    @include('partials.location')
    @include('partials.testimonials')
    @include('partials.cta')
@endsection
