<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Person Phone Number Registry</title>
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

        .result {
            padding: 10px;
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<h1>
    Person Phone Number Registry
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
            <label for="phone">Phone Number</label>
            <input type="number" name="phone" id="phone" required class="input">
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
            <label for="search-phone" class="input">Phone Number</label>
            <input type="number" name="search-phone" id="search-phone" required class="input">
        </div>

        <div class="button">
            <button type="submit">Submit</button>
        </div>

    </form>
</div>

<?php if (array_key_exists('search-phone', $_POST)) : ?>
    <div class="results">
        <h3>Search results for phone number: "<?= $_POST['search-phone'] ?>"</h3>

        <h4 class="result"><?= ($searchResult === null ? 'Phone number not found' : $searchResult->getFullInfo()) ?></h4>
    </div>
<?php endif; ?>

</body>
</html>
