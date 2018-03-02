@extends('layoults.layoult')

@section('css')
    <style type="text/css">
        a, a:hover, a:visited, a:link {
            text-decoration: none;
            color: #111111;
        }

        .blog_blade_href{
            margin: 0 0 30px;
        }

        .blog_blade_img{
            padding-left: 0;
        }

        .blog_blade_img img{
            width: 50%;
            /*height: 100vh;*/
            position: fixed;
            top: 80px;
            left: 0;
        }

        .blog_blade_text{
            padding: 30px 30px 30px 60px;
        }

        .blog_blade_text h2{
            padding: 0 0 20px;
            font-weight: bold;
        }

        .blog_blade_text .single-post{
            text-align: left;
            position:relative;
            z-index:-1;
        }

        .blog_blade_text img{
            width: 100%;
        }
    </style>

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
            

            <a href="{{ url('/news/1') }}">
                <div class="row blog_blade_href">
                    <div class="col-lg-6 blog_blade_img">

                        @if($post->image_post)
                            <img src="{{ asset('storage/' . $post->image_post) }}">
                        @else
                            <img src="{{ asset('storage/' . $post->image_main) }}">
                        @endif

                    </div>
                    <div class="col-lg-6 blog_blade_text">
                        <h2>{{ $post->title }}</h2>
                        <div class="single-post">
                            {!! $post->body !!}
                        </div>

                        <span>Комментарий</span>
                    </div>
                </div>
            </a>


        </div>
    </div>

@endsection
