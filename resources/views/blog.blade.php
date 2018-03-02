@extends('layoults.layoult')

@section('css')
    <style type="text/css">
        a, a:hover, a:visited, a:link {
            text-decoration: none;
            color: #111111;
        }

        .blog_blade_href {
            margin: 0 0 30px;
        }

        .blog_blade_href:hover {
            box-shadow: 0 0 15px 10px rgba(221, 221, 221, 1);
            transition-duration: .3s;
        }

        .blog_blade_img {
            /*padding-left: 0;*/
        }

        .blog_blade_img img {
            width: 100%;
            height: 540px;
        }

        .blog_blade_text {
            height: 540px;
            padding: 40px;
            overflow: hidden;
            box-shadow: inset 0 -190px 190px -50px #F6F6F6;
        }

        .blog_blade_text h2 {
            text-align: center;
            padding: 0 0 20px;
            font-weight: bold;
        }

        .blog_blade_text .post-content {
            /*max-width: 100%;*/
            position: relative;
            z-index: -1;
            overflow: hidden;
        }

        .post-item-link {
            width: 50%;
        }

        .blog_blade_text figure a{
            width: 100%;
        }

        @media (max-width: 768px) {
            .post-item-link {
                width: 100%;
            }

            .post-item-link img{
                height: 400px; 
            }
        }

    </style>
    {{--@php--}}
    {{--$text = iconv_strlen($page->body);--}}
    {{--$text = ( int ) $text;--}}
    {{--@endphp--}}

    {{--@if($text < 10000)--}}
    {{--<style>--}}
    {{--.footer{--}}
    {{--position: fixed;--}}
    {{--bottom: 0;--}}
    {{--}--}}
    {{--</style>--}}
    {{--@endif--}}
@endsection

@section('content')

    <div class="wrapper-page">

        @foreach($posts as $post)
            <div class="wrapper-one-post">
                <div class="blog_blade_href">
                    <a class="post-item-link" href="{{ action('PostsController@show', $post->id) }}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 blog_blade_img">
                                <!-- <img src="{{ asset('storage/' . $post->image_main) }}"> -->
                                 <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 blog_blade_text">
                                <h2>{{ $post->title }}</h2>
                                <div class="post-content">
                                    {!! $post->body !!}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

        <div class="row center-pagination">
            <nav aria-label="Page navigation example">
                <div class="justify-content-center">
                    {{ $posts->links() }}
                </div>
            </nav>
        </div>

    </div>

@endsection
