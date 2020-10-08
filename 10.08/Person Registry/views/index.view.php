<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Person Registry</title>
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

        h1, h2, h3, .results-list {
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

        .label {
            margin-right: 5px;
        }

        .input {
            width: 100%;
            margin-right: auto;
            font-size: 20px;
            padding: 5px 0;
        }

        .input-form, .search-form, .results {
            background-color: #F2FBFF;
            border-radius: 15px;
            padding: 15px 0;
            width: 800px;
            margin: 10px auto;
        }

        .results-list {
            padding: 10px;
            margin-top: 10px;
            margin-left: 30px;
        }

        .result {
            margin-top: 7px;
        }
    </style>
</head>

<body>

<h1>
    Person Registry
</h1>

<div
    class="input-form"
>
    <h2>Create entry</h2>
    <form action="/" method="POST" class="input-form">

        <div class="input-label-field">
            <label for="first" class="label">First name</label>
            <input type="text" name="first" id="first" required class="input">
        </div>

        <div class="input-label-field">
            <label for="last">Last name</label>
            <input type="text" name="last" id="last" required class="input">
        </div>

        <div class="input-label-field">
            <label for="code">Personal code</label>
            <input type="text" name="code" id="code" required class="input">
        </div>

        <div class="input-label-field">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" required class="input">
        </div>

        <div class="button">
            <button type="submit">Submit</button>
        </div>

    </form>
</div>

<div
        class="search-form"
>
    <h2>Search for entry</h2>
    <form action="/" method="POST" class="search-form">
        <div class="input-label-field">
            <label for="search-code" class="input">Personal code</label>
            <input type="text" name="search-code" id="search-code" required class="input">
        </div>

        <div class="button">
            <button type="submit">Submit</button>
        </div>

    </form>
</div>

<?php if (array_key_exists('search-code', $_POST)) : ?>
<div class="results">
    <h3>Search results for personal code: "<?= $_POST['search-code'] ?>"</h3>
    <h3>Matching records: <?= count($matchingPersons) ?></h3>

    <ol class="results-list">
        <?php foreach ($matchingPersons as $person) : ?>
            <li class="result">
                <?= $person->getFirst() . ' ' . $person->getLast() ?>
            </li>
            <p class="result">
                Personal code: <?= $person->getCode() ?>, Address: <?= $person->getAddress() ?>
            </p>
        <?php endforeach; ?>
    </ol>

</div>
<?php endif; ?>

</body>
</html>
