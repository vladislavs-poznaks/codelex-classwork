<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Safe PIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, button {
            font-family: 'Architects Daughter', cursive;
            font-size: 20px;
        }

        button {
            background-color: cornflowerblue;
            color: white;
            font-size: 30px;
            border-radius: 50px;
            border: 0;
            height: 50px;
            width: 75px;
            margin: 10px 0;
        }

        button:hover {
            cursor: pointer;
            transform: scale(1.05);
            animation: 0.5s ease;
        }

        h1, h2, h3 {
            margin-top: 10px;
            text-align: center;
        }

        .numpad {
            display: grid;
            grid-template: 100px repeat(4, 75px) / repeat(3, 1fr);
            background-color: #F2FBFF;
            border-radius: 15px;
            padding: 15px 0;
            width: 400px;
            margin: 10px auto;
            justify-items: center;
            align-items: center;
        }

        .pin-display {
            grid-area: 1 / 1 / span 1 / span 3;
            padding-bottom: 25px;
        }

        .1 {
            grid-area: 2 / 1 / span 1 / span 1;
        }

        .2 {
            grid-area: 2 / 2 / span 1 / span 1;
        }

        .3 {
            grid-area: 2 / 3 / span 1 / span 1;
        }

        .4 {
            grid-area: 3 / 1 / span 1 / span 1;
        }

        .5 {
            grid-area: 3 / 2 / span 1 / span 1;
        }

        .6 {
            grid-area: 3 / 3 / span 1 / span 1;
        }

        .7 {
            grid-area: 4 / 1 / span 1 / span 1;
        }

        .8 {
            grid-area: 4 / 2 / span 1 / span 1;
        }

        .9 {
            grid-area: 4 / 3 / span 1 / span 1;
        }

        .number-0 {
            grid-area: 5 / 2 / span 1 / span 1;
        }

    </style>
</head>

<body>

<div
    class="numpad"
>
    <div class="pin-display">
        <h3><?= $feedback['result'] ?></h3>
        <h3><?= $feedback['pin'] ?></h3>
    </div>

    <div class="number-1">
        <form action="/" method="POST">
            <button type="submit" name="number" value="1">1</button>
        </form>
    </div>

    <div class="number-2">
        <form action="/" method="POST">
            <button type="submit" name="number" value="2">2</button>
        </form>
    </div>

    <div class="number-3">
        <form action="/" method="POST">
            <button type="submit" name="number" value="3">3</button>
        </form>
    </div>

    <div class="number-4">
        <form action="/" method="POST">
            <button type="submit" name="number" value="4">4</button>
        </form>
    </div>

    <div class="number-5">
        <form action="/" method="POST">
            <button type="submit" name="number" value="5">5</button>
        </form>
    </div>

    <div class="number-6">
        <form action="/" method="POST">
            <button type="submit" name="number" value="6">6</button>
        </form>
    </div>

    <div class="number-7">
        <form action="/" method="POST">
            <button type="submit" name="number" value="7">7</button>
        </form>
    </div>

    <div class="number-8">
        <form action="/" method="POST">
            <button type="submit" name="number" value="8">8</button>
        </form>
    </div>

    <div class="number-9">
        <form action="/" method="POST">
            <button type="submit" name="number" value="9">9</button>
        </form>
    </div>

    <div class="number-0">
        <form action="/" method="POST">
            <button type="submit" name="number" value="0">0</button>
        </form>
    </div>
</div>

</body>
</html>