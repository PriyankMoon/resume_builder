<?php
require './assets/class/database.class.php';
require './assets/class/function.class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=@$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" href="./assets/images/img1.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: radial-gradient(circle, #7ddce9 49%, #86dde9 100%);

        }
        .resume-container .col-12{
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .open:hover{
            color: #420039;
            text-shadow: 0 0 15px #FF00BA;
        }
        .edit:hover{
            color: #05668D;
            text-shadow: 0 0 15px rgb(31,177,255);
        }
        .delet:hover{
            color: #D00000;
            text-shadow: 0 0 15px #FF3E41;
        }
        .share:hover {
            color: #095256;
            text-shadow: 0 0 15px rgb(6, 250, 6);
        }

        .clone:hover{
            color: rgb(255, 128, 0);
            text-shadow: 0 0 15px rgb(250, 125, 1);
        }
        .resume-card{
            margin-top:50px;
            margin-bottom:50px;
            width:50vw;
        }
        .nav-{
            width:100vw;
        }
        .cursor-pointer:hover {
        cursor: pointer;
    }
    </style>
</head>

<body>