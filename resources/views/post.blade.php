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

        .wrapper-page {
            padding-top: 0;
        }

        .blog_blade_img {
            padding-left: 0;
        }

        .blog_blade_img img {
            width: 45%;
            height: calc(100% - 60px);
            position: fixed;
            top: 77px;
            left: 0;
        }

        .blog_blade_text {
            padding: 30px;
        }

        .blog_blade_text .single-post {
            text-align: left;
            position: relative;
            z-index: -1;
            overflow: hidden;
            color: #9b9b9b;
        }

        .blog_blade_text .single-post p {
            padding-bottom: 40px;
            font-size: 16px;
        }

        .blog_blade_text .single-post > p:nth-child(n+1) {
            padding-top: 35px;
        }

        .post-bottom-line {
            border-bottom: 2px solid #ea77b2;
            padding-bottom: 30px;
        }

        .blog_blade_text img {
            width: 100%;
        }

        .delimiter {
            padding-bottom: 40px;
        }

        .delimiter img {
            width: 38px;
            height: 27px;
        }

        .delimiter p {
            padding-bottom: 0 !important;
            padding-left: 10px;
            color: #262626;
            font-size: 16px;
        }

        .blog_blade_img_head {
            position: fixed;
            background-color: #c3193d;
            bottom: 60px;
            width: 487px;
            color: #fff;
            padding: 25px 0 20px 55px;
            text-align: left;
        }

        .blog_blade_img h2 {
            font-size: 36px;
            text-transform: capitalize;
            font-weight: 600;
            margin-bottom: 0;
        }

        .blog_blade_img p {
            margin-bottom: 0;
        }

        .footer {
            display: none;
        }

        @media (max-width: 1200px) {
            .blog_blade_img_head {
                width: 465px;
            }
        }

        @media (max-width: 992px) {
            .blog_blade_img img {
                width: 33%;
            }

            .blog_blade_text {
                margin-left: 33%;
            }

            .blog_blade_img_head {
                bottom: 30px;
                width: 33%;
                padding: 20px 0 20px 30px;
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .blog_blade_img img {
                width: 60%;
                height: 460px;
                position: relative;
                top: 60px;
                left: auto;
            }

            .blog_blade_img_head {
                position: relative;
                bottom: auto;
                padding-top: 90px;
                background-color: transparent;
                text-align: center;
                left: auto;
                width: 100%;
                color: #c3193d;
                padding-bottom: 20px;
                padding-left: 0;
            }

            .blog_blade_text {
                margin-left: 0;
                padding-top: 0;
            }

            .delimiter {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .blog_blade_text {
                padding: 30px 15px 30px 15px;
            }
        }
    </style>

    @php
        $text = iconv_strlen($post->body);
        $text = ( int ) $text;
    @endphp

    @if($text < 10000)
        <style>
            .footer {
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
            <div class="row blog_blade_href">
                <div class="col-lg-6 col-md-2 col-sm-12 blog_blade_img">

                    @if($post->image_post)
                        <img src="{{ asset('storage/' . $post->image_post) }}">
                        <div class="blog_blade_img_head">
                            <h2>{{ $post->title }}</h2>
                            <p>{{ Carbon\Carbon::parse($post->created_at)->format('M. d, Y') }}</p>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $post->image_main) }}">
                    @endif

                </div>
                <div class="col-lg-6 col-md-9 col-sm-12 blog_blade_text">
                    <div class="single-post">
                        <div class="post-content-wrapper">
                            {!! $post->body !!}
                        </div>
                        <div class="post-bottom-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
