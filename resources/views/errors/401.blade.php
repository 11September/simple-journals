<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission denied!</title>

    <style>
        body,h1,h2{
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            font-size: 80px;
            background: url("{{ asset('errors/401.jpg') }}") no-repeat;
            -moz-background-size: 100%; /* Firefox 3.6+ */
            -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
            -o-background-size: 100%; /* Opera 9.6+ */
            /*background-size: 100%; !* Современные браузеры *!*/
            color: bisque;
            font-weight: bold;
        }

        .erorrs-links{
            color: red;
            text-decoration: none;
        }

        @media (max-width: 1440px){

            .body-404 {
                font-size: 50px!important;
            }
        }

        @media (max-width: 1200px){

            .body-404 {
                font-size: 30px!important;
            }
        }

        @media (max-width: 767px){

            .body-404 {
                font-size: 26px!important;
            }
        }

        @media (max-width: 480px){

            .body-404 {
                font-size: 20px!important;
            }
        }
    </style>

</head>
<body>
<div class="body-404">
    <h2>Permission denied!</h2>
    <a class="erorrs-links" href="{{ url('/') }}">On general</a>
</div>
</body>
</html>
