<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Oxygen:400,300);
        @import url(https://fonts.googleapis.com/css?family=Montserrat:700);

        * {
            margin: 0;
            padding: 0;
        }

        .intro {
            margin: auto;
        }

        .black {
            width: 50%;
            float: left;
            background: #283644;
            height: 100vh;
        }

        .white {
            width: 50%;
            float: right;
            background: #4D727E;
            height: 100vh;
        }

        .box {
            height: 370px;
            width: 700px;
            background: #069A8E;
            position: absolute;
            top: 150px;
            left: 0;
            right: 0;
            margin: auto;
            border-radius: 20px;
        }

        .boxfather {
            width: 100%;
            position: absolute;
        }

        .box h1 {
            color: #E4E4E4;
            font-size: 3em;
            text-align: center;
            position: relative;
            top: 70px;
            font-family: 'Montserrat', sans-serif;
        }

        .box button {
            left: 43%;
            position: relative;
            top: 120px;
            padding: 8px 20px;
            cursor: pointer;
            border: 0;
            outline: none;
            color: #525252;
            background: #E4E4E4;
            transition: all .3s ease;
            font-size: 19px;
            font-family: montserrat;
            border-radius: 5px;
        }

        .homepage {
            height: 100vh;
            position: relative;
            top: 40px;


        }

        .homepage p {
            width: 80%;
            line-height: 1.5;
            margin: 50px auto;
            font-family: oxygen;
            font-size: 18px;
            color: #585858;
        }

        .homepage h1 {
            padding-top: 50px;
            width: 80%;
            margin: auto;
            font-family: montserrat;
            color: #525252;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="intro">
        <div class="black"></div>
        <div class="white"></div>
        <div class="boxfather">
            <div class="box">
                <h1>Decision Tree C4.5</h1>
                <h1>Online Learning Method</h1>
                <button><a href="login">Login</a></button>
            </div>
        </div>

    </div>

    <script>
        $(function(){
            $('.homepage').hide();
            $('.box').delay(500).effect("bounce", { times: 8 }, 800);
            $('.box').hide().slideDown(500);
            
        
        });
    </script>
</body>

</html>