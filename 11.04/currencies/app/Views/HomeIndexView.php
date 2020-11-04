<?php require_once __DIR__  . '/../Views/HeaderView.php' ?>

<h1>Currencies</h1>

<form action="/currencies" method="POST">
    <button type="submit">UPDATE CURRENCIES!</button>
</form>

<?php foreach ($currencies->all() as $currency): ?>
    <h3>
        <?php echo $currency->getCurrency() . ': ' . $currency->getRate(); ?>
    </h3>
<?php endforeach; ?>

<?php require_once __DIR__  . '/../Views/FooterView.php' ?>
