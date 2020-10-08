<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>API call</title>
</head>

<body>

<h1>
    API call
</h1>

<div
    class="input-form"
>
    <form action="/" method="POST" class="input-form">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Submit</button>
    </form>
</div>

<?php if (array_key_exists('person', $info)) : ?>
<div>
    <h3>Person found in <?= $info['resource'] ?></h3>
    <h3>Persons info - <?= $info['person'] ?></h3>
</div>
<?php endif; ?>

</body>
</html>
