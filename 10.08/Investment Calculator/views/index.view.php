<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Investment Calculator</title>
</head>

<body>

<h1>
    Investment Calculator
</h1>

<div
    class="input-form"
>
    <form action="/" method="POST" class="input-form">
        <label for="investment">Initial investment</label>
        <input type="number" name="investment" id="investment" required>

        <label for="percentage">Yearly percentage</label>
        <input type="number" name="percentage" id="percentage" required>

        <label for="years">Years</label>
        <input type="number" name="years" id="years" required>

        <button type="submit">Submit</button>
    </form>
</div>

<?php if (array_key_exists('investment', $_POST)) : ?>
    <div>
        <h3>You invested: <?= Formatter::formatMoney($investment->getInvestment()) ?></h3>
        <h3>Percentage: <?= $_POST['percentage'] ?>%</h3>
        <h3>For total period: <?= $_POST['years'] ?> years</h3>

        <h3>Total sum in the end of investment: <?= Formatter::formatMoney($investment->getTotalReturn()) ?></h3>
    </div>
<?php endif; ?>

</body>
</html>
