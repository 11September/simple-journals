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
            height: 100vh;
            position: fixed;
            position: fixed;
            top: 0;
            left: 0;
        }

        .blog_blade_text{
            padding: 30px 30px 30px 60px;
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

                        <img src="{{ asset('images/SMALL_COVER-1.jpg') }}">

                        <span>Комментарий</span>
                    </div>
                </div>
            </a>


        </div>
    </div>

@endsection
