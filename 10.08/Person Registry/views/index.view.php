<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Person Registry</title>
</head>

<body>

<h1>
    Person Registry
</h1>

<div
    class="input-form"
>
    <form action="/" method="POST" class="input-form">
        <label for="first">First name</label>
        <input type="text" name="first" id="first" required>

        <label for="last">Last name</label>
        <input type="text" name="last" id="last" required>

        <label for="code">Personal code</label>
        <input type="text" name="code" id="code" required>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" required>

        <button type="submit">Submit</button>
    </form>
</div>

<div
        class="search-form"
>
    <h2>Search Form</h2>
    <form action="/" method="POST" class="search-form">
        <label for="search-code">Personal code</label>
        <input type="text" name="search-code" id="search-code" required>

        <button type="submit">Submit</button>
    </form>
</div>

<?php if (array_key_exists('search-code', $_POST)) : ?>
<div>
    <h3>You searched for <?= $_POST['search-code'] ?></h3>
    <h3>Matching records <?= count($matchingPersons) ?></h3>

    <ol>
        <?php foreach ($matchingPersons as $person) : ?>
            <li><?= $person->getInfo() ?></li>
        <?php endforeach; ?>
    </ol>

</div>
<?php endif; ?>

</body>
</html>
