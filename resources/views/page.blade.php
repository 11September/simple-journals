@extends('layoults.layoult')

@section('css')
    @php
        $text = iconv_strlen($page->body);
        $text = ( int ) $text;
    @endphp

    @if($text < 10000)
        <style>
            .footer{
                position: fixed;
                bottom: 0;
            }
        </style>
    @endif
@endsection

@section('title')
    {{ $page->title }}
@endsection

@section('description')
    {{ $page->meta_description }}
@endsection

@section('keywords')
    {{ $page->meta_keywords }}
@endsection


@section('content')
<div class="container">

    <div class="wrapper-page">
        <div class="text-center">
            @if($page->image)
                <div class="image">
                    <img src="{{ asset('storage/' . $page->image) }}"
                         alt="{{ $page->title }}"
                         class="img-fluid">
                </div>
            @endif

            <div class="content">
                {!! $page->body !!}
            </div>
        </div>
    </div>
</div>
@endsection
