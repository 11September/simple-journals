@extends('layoults.layoult')

@section('css')
    @php
        $text = iconv_strlen($post->body);
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
    {{ $post->title }}
@endsection

@section('content')

    <div class="wrapper-page">
        <div class="text-center">

            <div class="row">
                <div class="col-md-6">
                    @if($post->image_post)
                        <div class="image">
                            <img src="{{ asset('storage/' . $post->image_post) }}"
                                 alt="{{ $post->title }}"
                                 class="img-fluid">
                        </div>
                    @else
                        <div class="image">
                            <img src="{{ asset('storage/' . $post->image_main) }}"
                                 alt="{{ $post->title }}"
                                 class="img-fluid">
                        </div>
                    @endif
                </div>
                <div class="col-md-6">

                </div>
            </div>

        </div>
    </div>

@endsection
