<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Session by PIN</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Helvetica;
            font-size: 20px;
        }

        button {
            background-color: cornflowerblue;
            color: white;
            height: 50px;
            font-size: 20px;
            border-radius: 50px;
            border: 0;
            padding: 5px 25px;
            width: 25%;
        }

        button:hover {
            cursor: pointer;
            transform: scale(1.05);
            animation: 0.5s ease;
        }

        h1, h2, h3 {
            margin-top: 10px;
        }

        h1, h2 {
            text-align: center;
        }

        h3 {
            margin-left: 20px;
        }

        .input-label-field {
            width: 100%;
            margin-bottom: 25px;
            margin-left: 0;
            margin-right: 0;
            text-align: left;
            padding: 0 35px;
        }

        .button {
            text-align: center;
        }

        .input {
            width: 100%;
            margin-right: auto;
            font-size: 20px;
            padding: 5px 0;
        }

        .input-form, .session-results {
            background-color: #F2FBFF;
            border-radius: 15px;
            padding: 15px 0;
            width: 800px;
            margin: 10px auto;
        }

        .session-results {
            display: grid;
            grid-template: 1fr / 2fr 1fr;
        }

        .session-results button {
            grid-area: 1 / 2 / span 1 / span 1;
            width: 150px;
        }

    </style>
</head>

<body>

<?php if (! isset($_SESSION['id'])) : ?>
    <div
        class="input-form"
    >
        <h2>Enter Your PIN</h2>
        <form action="/" method="POST" class="search-form">
            <div class="input-label-field">
                <label for="pin" class="input">PIN Code</label>
                <input type="number" name="pin" id="pin" required class="input">
            </div>

            <div class="button">
                <button type="submit">Submit</button>
            </div>

        </form>
    </div>
<?php else : ?>
    <div class="session-results">
        <h3>Session for: <?=$auth->getFullName() ?></h3>

        <form action="/" method="POST">
            <button type="submit" name="log-out" value="<?= $_SESSION['id'] ?>" class="button">Log Out!</button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>
