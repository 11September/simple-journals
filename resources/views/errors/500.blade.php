<html>

<head>
    <title>500</title>

    <style>

        body, h1, h2 {
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
            background: url("{{ asset('errors/500.png') }}") no-repeat;
            -moz-background-size: 100%; /* Firefox 3.6+ */
            -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
            -o-background-size: 100%; /* Opera 9.6+ */
            /*background-size: 100%; !* Современные браузеры *!*/
            color: bisque;
            font-weight: bold;
        }

        .erorrs-links {
            color: #8E4343;
            text-decoration: none;
        }

        @media (max-width: 1440px) {

            .body-404 {
                font-size: 50px !important;
            }
        }

        @media (max-width: 1200px) {

            .body-404 {
                font-size: 30px !important;
            }
        }

        @media (max-width: 767px) {

            .body-404 {
                font-size: 26px !important;
            }
        }

        @media (max-width: 480px) {

            .body-404 {
                font-size: 20px !important;
            }
        }
    </style>
</head>
<body>
</body>
</html>
