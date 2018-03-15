@extends('layoults.layoult')

@section('css')
    <style type="text/css">
        body{
            /*background-color: transparent;*/
        }

        a, a:hover, a:visited, a:link {
            text-decoration: none;
            color: #111111;
        }

        .wrapper-page{
            background-color: #fff;
        }

        .header_bg{
            background: url('{{ asset('images/blogs_bg.png') }}');
            height: 344px;
        }

        .row{
            margin: 0;
        }

        .pink{
            color: #f171ac;
        }

        .wrapper-page {
             padding-top: 0; 
        }

        .post_items{
            clear: left;
            padding: 0;
        }

        .post_items img{
            width: 100%;
            height: 500px;
        }

        .post_items h2{
            text-align: left;
            padding-top: 40px;
            font-size: 30px;
            padding-bottom: 20px;
            text-transform: capitalize;
            font-weight: bold;
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .post_items_img.hover{
            display: none;
        }

        .post_items:first-child h2{
            color: #f171ac;
        }

        .post_items:nth-child(4n) .post_items_img.active{
            display: none;
        }

        .post_items:nth-child(4n) .post_items_img.hover{
            display: block;
        }

        .post_items:nth-child(4n+3) .post_items_img.active{
            display: none;
        }

        .post_items:nth-child(4n+3) .post_items_img.hover{
            display: block;
        }


        .post_items_img{
            padding-left: 0;
            padding-right: 0;
        }

        .post_items_text{
            text-align: center;
        }

        .post_items_text p{
            color: #9b9b9b;
            font-weight: 500;
            font-size: 18px;
            height: 295px;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 33px;
            text-align: left;
        }

        .post_items_text span{
            text-transform: uppercase;
            background-color: #c21a3d;
            padding: 18px 75px;
            color: #fff;
            font-size: 20px;
        }

        .post_items_text span:hover{
            background-color: #f171ac;
        }

        .row.center-pagination{
            border-top: 2px solid #ffa0f4;
        }

        .center-pagination li:first-child{
            display: none;
        }

        .center-pagination li:last-child{
            display: none;
        }

        .center-pagination li{
            text-decoration: none !important;
            text-align: center;
            width: 60px;
            font-size: 24px;
            font-weight: bold;
            padding: 15px 20px;
            background-color: #ffffff !important;
            color: #c01a3e !important;
            margin-top: 15px;
        }

        .center-pagination li.active{
            background-color: #c01b3d !important;
            color: #fff !important;
            background-color: #c21a3d;
        }

        .row.center-pagination{
            background-color: #f5f5f5;
        }

        @media (max-width: 1200px) {
            .post_items_text span {
                padding: 15px 45px;
            }
        }

        @media (max-width: 992px) {
             .post_items{
                text-align: center;
                padding-top: 25px;
                padding-bottom: 50px;
            }

            .post_items img {
                width: 50%;
                height: 400;
            }

            .post_items h2{
                text-align: center;
            }

            .post_items_text p {
                height: 210px;
                padding-left: 30px;
                padding-right: 30px;
            }

            .post_items:nth-child(4n) .post_items_img.active{
                display: block;
            }

            .post_items:nth-child(4n) .post_items_img.hover{
                display: none;
            }

            .post_items:nth-child(4n+3) .post_items_img.active{
                display: block;
            }

            .post_items:nth-child(4n+3) .post_items_img.hover{
                display: none;
            }
        }

        @media (max-width: 768px) {
            .post_items img {
                width: 70%;
                height: 400;
            }
        }

        @media (max-width: 480px) {
            .header_bg{
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

@foreach($posts as $post)

    <!--  end container -->
    </div>

    <div class="header_bg"></div>

    <div class="wrapper-page">

        <div class="row">
            
            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

            <div class="col-lg-6 post_items">
                <a href="#">
                <div class="row">
                    
                    <div class="col-lg-6 post_items_img active">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                    <div class="col-lg-6 post_items_text">
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. 
                        </p>
                        <span>Read more</span>
                    </div>

                    <div class="col-lg-6 post_items_img hover">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>

                </div>
                </a>
            </div>

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

@endsection
