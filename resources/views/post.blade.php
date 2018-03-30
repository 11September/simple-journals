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

        .blog_blade_img img {
            width: 100%;
            height: calc(100% - 60px);
        }

        .blog_blade_text {
            padding: 30px;
            z-index: 1029;
        }

        .hide_title{
            display: none;
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
            width: calc(100% - 60px);
        }

        .blog_blade_text img {
            width: 100%;
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
            /*position: fixed;*/
            /*background-color: #c3193d;*/
            /*top: 77px;*/
            /*width: auto;*/
            /*left: 30px;*/
            /*color: #fff;*/
            /*padding: 25px 50px 20px 55px;*/
            /*text-align: left;*/

            background-color: #c3193d;
            width: auto;
            color: #fff;
            padding: 25px 50px 20px 55px;
            text-align: left;
            position: relative;
            margin-top: -170px;
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

        .blog_blade_img img {
            height: auto;
        }

        @media (max-width: 1200px) {
            .blog_blade_img {
                flex: 0 0 60%;
                max-width: 50%;
            }

            .blog_blade_text {
                flex: 0 0 40%;
                max-width: 50%;

            }
        }

        @media (max-width: 992px) {
            .hide_title{
                display: block;
                margin: 25px 0;
                text-align: center;
                font-size: 34px;
                color: #c3193d;
            }

            .blog_blade_img img {
                width: 70%;
                height: auto;
                position: relative;
                top: 60px;
                left: auto;
            }

            .blog_blade_img_head {
                top: 0;
                padding: 25px 0 20px 0;
            }

            .blog_blade_img {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .blog_blade_text {
                flex: 0 0 100%;
                max-width: 100%;
                margin-top: 100px;
            }

            .blog_blade_img_head {
                display: none;
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
                padding-left: 30px;
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
    <div class="container-fluid">

        <div class="wrapper-page">
            <div class="text-center">
                <div class="row blog_blade_href">
                    <div class="col-lg-6 col-md-2 col-sm-12 blog_blade_img">
                        @if($post->image_post)
                            <img src="{{ asset('storage/' . $post->image_post) }}">
                        <!--<img src="{{ asset('images/SMALL_COVER-1.jpg') }}">-->
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

                            <h2 class="hide_title">{{ $post->title }}</h2>

                            <div class="post-content-wrapper">
                                {!! $post->body !!}
                            </div>
                            <div class="post-bottom-line"></div>

                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*

        */
        var disqus_config = function () {
            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            this.page.title = '{{ $post->title }}'; //'a unique title for each page where Disqus is present';
        };

        (function () { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://http-cosmo-press-com.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
@endsection
