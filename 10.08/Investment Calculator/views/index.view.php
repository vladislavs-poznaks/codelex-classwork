<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Investment Calculator</title>

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

        h1 {
            margin-top: 15px;
            text-align: center;
        }

        h3, h4 {
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

        .input-form, .results {
            background-color: #F2FBFF;
            border-radius: 15px;
            padding: 15px 0;
            width: 800px;
            margin: 10px auto;
        }

        .result {
            margin-top: 15px;
        }
    </style>
</head>

<body>

<h1>
    Investment Calculator
</h1>

<div
    class="input-form"
>
    <form action="/" method="POST" class="input-form">
        <div class="input-label-field">
            <label for="investment">Initial investment</label>
            <input type="number" name="investment" id="investment" required class="input">
        </div>

        <div class="input-label-field">
            <label for="percentage">Yearly percentage</label>
            <input type="number" name="percentage" id="percentage" required class="input">
        </div>

        <div class="input-label-field">
            <label for="years">Years</label>
            <input type="number" name="years" id="years" required class="input">
        </div>

        <div class="button">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<?php if (array_key_exists('investment', $_POST)) : ?>
    <div class="results">
        <h4 class="result">Initial investment: <?= Formatter::formatMoney($investment->getInvestment()) ?></h4>
        <h4 class="result">Percentage: <?= $_POST['percentage'] ?>%</h4>
        <h4 class="result">Period: <?= $_POST['years'] ?> years</h4>

        <h3 class="result">Total sum in the end of investment: <?= Formatter::formatMoney($investment->getTotalReturn()) ?></h3>
    </div>
<?php endif; ?>

</body>
</html>
