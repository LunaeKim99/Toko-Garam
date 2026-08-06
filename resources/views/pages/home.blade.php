@extends('layouts.app')

@section('meta_title', 'Beranda — Garam Nusantara')
@section('meta_description', 'Garam Nusantara menyediakan produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen.')

@section('content')
    @include('partials.hero')
    @include('partials.features')
    @include('partials.about-preview')
    @include('partials.featured-products')
    @include('partials.process')
    @include('partials.testimonials')
    @include('partials.cta')
@endsection
