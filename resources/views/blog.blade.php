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

        .blog_blade_href:hover{
            box-shadow: 0 0 15px 10px rgba(221, 221, 221, 1);
            transition-duration: .3s;

        }

        .blog_blade_img{
            padding-left: 0;
        }

        .blog_blade_img img{
            width: 100%;
            height: 540px;
        }

        .blog_blade_text{
            height: 540px;
            padding: 40px;
            overflow: hidden;
            box-shadow:inset 0px -190px 190px -50px #F6F6F6;
        }

        .blog_blade_text h2{
            padding: 0 0 20px;
            font-weight: bold;
        }

        .blog_blade_text p{
            text-align: left;
            position:relative;
            z-index:-1;
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
        <div class="text-center">
            
            <!-- Пост 1 -->
            <a href="{{ url('/news/1') }}">
                <div class="row blog_blade_href">
                    <div class="col-lg-6 blog_blade_img">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>
                    <div class="col-lg-6 blog_blade_text">
                        <h2>FEBRUARY 2018 – 2019</h2>
                        <p>
                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                             WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                             WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.
                        </p>
                    </div>
                </div>
            </a>
            <!-- Пост 1 end -->

            <!-- Пост 2 -->
            <a href="{{ url('/news/1') }}">
                <div class="row blog_blade_href">
                    <div class="col-lg-6 blog_blade_img">
                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">
                    </div>
                    <div class="col-lg-6 blog_blade_text">
                        <h2>FEBRUARY 2018 – 2019</h2>
                        <p>
                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                             WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                             WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.

                            WELAB Magazine – February 2018 
                            This Issue Includes: Avinash Singh, Mallika Mehta, Ethan Paisley, London King, Maximillian Orlando, Zoolicious, Cooly Beans, Pothead Janey, Dr. Gee, and Johnnie James.
                        </p>
                    </div>
                </div>
            </a>
            <!-- Пост 2 end -->



        </div>
    </div>

@endsection
