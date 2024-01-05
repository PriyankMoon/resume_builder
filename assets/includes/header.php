<?php
require './assets/class/database.class.php';
require './assets/class/function.class.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyLnvADszl+9zI1Wq8Edby3S0D4Jq0Fkvx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/images/img1.webp" type="image/x-icon">

    <!-- Bootstrap JS (Optional: if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title><?=@$title?></title>
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            background-image: url("./assets/images/img4.webp");
            filter: brightness(90%) grayscale(2%) saturate(140%);
            background-size: 100% 105%;
            background-repeat: no-repeat;
            animation: bg-ani 40s ease infinite;
        }

        @keyframes bg-ani {
            0% {
                filter: hue-rotate(2000deg);
            }

            30% {
                filter: hue-rotate(2100deg);
            }

            60% {
                filter: hue-rotate(2000deg) brightness(4);
            }

            90% {
                filter: hue-rotate(2100deg);
            }

            100% {
                filter: hue-rotate(2000deg);
            }
        }

        .text-center h3 {
            font-weight: 300;
        }

        .btn {
            box-shadow: 0px 0px 5px white;
            text-shadow: 0px 0px 20px white;
            margin: 20px 0 20px 0 ;
        }

        .butn {
            box-shadow: 0px 0px 5px white;
            text-shadow: 0px 0px 20px white;
        }

        .card {
            backdrop-filter: blur(100px);
            border: 0.2px solid rgba(142, 136, 136, 0.966);
            border-radius: 20px;
            /* overflow is used , when some elements (colors , texts ) 
            gets outside of the card(context) and you want to hide it  */
            overflow: hidden;
            scale: 1.02;
        }

        .card-header,
        .card-footer,
        .card-body {
            background-color: rgba(21, 49, 52, 0.275);
        }

        .card-footer {
            border-top: 0.2px solid grey;
        }

        .card-header {
            border-bottom: 0.2px solid grey;
        }

        .content {
            margin-top: 50px;
        }

        .container {
            width: 80vw;
            margin-bottom: 20px;
        }
        a{
            /* color: #71eeff; */
            color: #72befd;
            /* text-shadow: 0 0 2px rgba(125, 250, 205, 0.413) */
        }
        a:hover{
            color: #71eeff;
            text-shadow: 0 0 2px rgba(255, 255, 255, 0.413);
        }
        img{
            scale: 1.5;
        }
        h1{
            font-weight: 500;
            scale:0.90;
        }
    </style>
</head>

<body class="d-flex align-items-center">