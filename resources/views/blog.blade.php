@extends('layoults.layoult')

@section('css')
    <style type="text/css">
        a, a:hover, a:visited, a:link {
            text-decoration: none;
            color: #111111;
        }

        .wrapper-page {
            background-color: #fff;
        }

        .header_bg {
            background: url('{{ asset('images/blogs_bg.png') }}');
            height: 344px;
        }

        .row {
            margin: 0;
        }

        .wrapper-page {
            padding-top: 0;
        }

        .post_items {
            clear: left;
            padding: 0;
        }

        .post_items img {
            width: 100%;
            height: 400px;
        }

        .post_items h2 {
            text-align: left;
            padding-top: 35px;
            font-size: 30px;
            padding-bottom: 15px;
            text-transform: capitalize;
            font-weight: bold;
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .post_items_img.hover {
            display: none;
        }

        .post_items:first-child h2 {
            color: #f171ac;
        }

        .post_items:nth-child(4n) .post_items_img.active {
            display: none;
        }

        .post_items:nth-child(4n) .post_items_img.hover {
            display: block;
        }

        .post_items:nth-child(4n+3) .post_items_img.active {
            display: none;
        }

        .post_items:nth-child(4n+3) .post_items_img.hover {
            display: block;
        }

        .preview{
            opacity: 0.8;
        }

        .post_items_img {
            padding: 2px;
        }

        .preview::before, .preview::after{
            outline: #DC1818 !important;
        }

        .post_items_text {
            text-align: center;
        }

        .post_items_text .post-content {
            color: #9b9b9b;
            font-weight: 500;
            font-size: 18px;
            height: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 33px;
            text-align: left;
        }

        .post-content > p, .post-content > div, .post-content > div > p {
            padding: 0 !important;
            margin: 0 !important;
        }

        .post_items_text .wrapper-view-more-one-item a {
            text-transform: uppercase;
            background-color: #c21a3d;
            padding: 18px 75px;
            color: #fff;
            font-size: 20px;
        }

        .post_items_text .wrapper-view-more-one-item:hover a{
            background-color: #f171ac;
        }

        .pagination li:hover a{
            color: #c01b3d;
        }

        .wrapper-view-more-one-item{
            margin-bottom: 30px;
        }

        @media (max-width: 1200px) {
            .post_items_text .wrapper-view-more-one-item {
                padding: 15px 0;
            }

            .post_items_text .wrapper-view-more-one-item a{
                padding: 18px 45px;
            }
        }

        @media (max-width: 992px) {
            .post_items {
                text-align: center;
                padding: 40px 10%;
            }

            .post_items img {
                width: 60%;
                height: 600px;
            }

            .post_items h2 {
                text-align: center;
            }

            .post_items_text p {
                height: 210px;
                padding-left: 30px;
                padding-right: 30px;
            }

            .post_items:nth-child(4n) .post_items_img.active {
                display: block;
            }

            .post_items:nth-child(4n) .post_items_img.hover {
                display: none;
            }

            .post_items:nth-child(4n+3) .post_items_img.active {
                display: block;
            }

            .post_items:nth-child(4n+3) .post_items_img.hover {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .post_items img {
                width: 60%;
                height: 420px;
            }

            .post_items_text .wrapper-view-more-one-item a{
                padding: 15px 25px;
            }
        }

        @media (max-width: 480px) {
            .post_items{
                padding: 30px 5%;
            }

            .post_items img{
                height: 360px;
            }

            .post_items_text .post-content{
                height: 200px;
                margin-bottom: 40px;
            }

            .header_bg {
                display: none;
            }

            .post_items_text p {
                padding-left: 15px;
                padding-right: 15px;
            }

            .center-pagination li {
                width: 50px;
                padding: 8px 15px;
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
<div class="container">
    <!--  end container -->
    </div>

    <div class="header_bg"></div>

    <div class="wrapper-page">

        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-6 post_items">

                    <div class="item effect-picture">
                        <div class="preview bw">

                            <div class="row">

                                <div class="col-lg-6 post_items_img active">
                                    <img src="{{ asset('storage/' . $post->image_main) }}">
                                </div>

                                <div class="col-lg-6 post_items_text">
                                    <h2>{{ $post->title }}</h2>
                                    <div class="post-content">
                                        {!! $post->body !!}
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="wrapper-view-more-one-item">
                                        <a class="one-post-link" href="{{ action('PostsController@show', $post->id ) }}">Read More</a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-lg-6 post_items_img hover">
                                    <img src="{{ asset('storage/' . $post->image_main) }}">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="row center-pagination">
        <nav aria-label="Page navigation example">
            <div class="justify-content-center">
                {{ $posts->links() }}
            </div>
        </nav>
    </div>
</div>

@endsection

