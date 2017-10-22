@extends('layoults.layoult')

@section('css')
    @if(iconv_strlen($page->body) < 1000)
        <style>
            .footer{
                position: absolute;
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

    <div class="wrapper-body">
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
                {!! iconv_strlen($page->body) !!}
            </div>
        </div>
    </div>

@endsection
