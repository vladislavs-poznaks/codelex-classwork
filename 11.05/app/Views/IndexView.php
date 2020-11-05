<?php require_once __DIR__ . '/../Views/HeaderView.php' ?>

<h1>Yahoo Finance API</h1>

<form action="/search" method="GET">
    <label for="symbol">Search</label>
    <input type="text" id="symbol" name="symbol" required>

    <button type="submit">Search</button>
</form>

<?php if ($quote): ?>
<div>
    <h2>Stock for <?php echo $quote->getSymbol() ?></h2>
    <div>
        Regular price <?php echo $quote->getRegularPrice() ?>
    </div>
    <div>
        Regular change percent <?php echo $quote->getRegularChangePercent() ?>%
    </div>
    <div>
        Market Previous close <?php echo $quote->getPreviousClose() ?>
    </div>
    <div>
        Market Regular Open <?php echo $quote->getRegularOpen() ?>
    </div>
    <div>
        Market Regular Day High <?php echo $quote->getRegularDayHigh() ?>
    </div>
    <div>
        Market Regular Day Low <?php echo $quote->getRegularDayLow() ?>
    </div>
    <div>
        Market 52 week High <?php echo $quote->getFiftyTwoWeekHigh() ?>
    </div>
    <div>
        Market 52 week Low <?php echo $quote->getFiftyTwoWeekLow() ?>
    </div>
    <div>
        Market Regular Day Volume <?php echo $quote->getRegularVolume() ?>
    </div>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/../Views/FooterView.php' ?>
