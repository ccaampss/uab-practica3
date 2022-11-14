<style>
    /* Notificació error 10 segons */
    body {
        padding: 0;
        margin: 0;
    }

    .container {
        width: 100%;
        height: 100%;
        background-color: var(--white);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text {
        font-size: 2rem;
        font-weight: 600;
        color: #000;
        border-radius: 20px;
        background-color: #dadada;
        font-family: Arial, Helvetica, sans-serif;
        padding: 20px 30px;

    }

    .ring {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 150px;
        height: 150px;
        background: transparent;
        border: 1px solid #dadada;
        border-radius: 50%;
        text-align: center;
        line-height: 150px;
        font-family: sans-serif;
        font-size: 20px;
        color: #000;
        letter-spacing: 4px;
        text-transform: uppercase;
    }

    .ring:before {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        width: 100%;
        height: 100%;
        border: 3px solid transparent;
        border-top: 3px solid #000;
        border-radius: 50%;
        animation: animateC 2s linear infinite;
    }


    @keyframes animateC {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes animate {
        0% {
            transform: rotate(45deg);
        }

        100% {
            transform: rotate(405deg);
        }
    }
</style>

<body>
    <div class="ring">
        <span></span>
    </div>
    <div class="container">
        <p class="text">

        </p>
    </div>
</body>


<?php


header("refresh:0;url=login.php");
