<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rock Paper Scissors Lizard Spock</title>
<!--    <link rel="stylesheet" href="css/styles.css" type="text/css">-->

    <style>
        body {
            background-color: #c1dee5;
        }

        h1, h2, .game-status, .options {
            text-align: center;
            font-family: Helvetica;

            color: #447391;
        }

        h1 {
            font-size: 60px;
        }

        h2 {
            font-size: 35px;
        }

        h1, .game-status, .chosen-options, .options {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            margin-top: 50px;
        }

        .chosen-option {
            width: 200px;
        }

        .vs-image {
            height: 200px;
            margin-left: 30px;
            margin-right: 30px;
        }

        button {
            width: 150px;
            border: solid 0px;
            background: #c1dee5;
        }

        button:hover {
            transform: scale(1.15);
            transition: .3s ease;
        }
    </style>

</head>

<body>

<h1>
    Rock, Paper, Scissors, Lizard, Spock
</h1>

<?php if (array_key_exists('choice', $_POST)) : ?>
    <div class="game-status">

        <h2><?= $pl->getResult($pc)->getMessage() ?></h2>

        <div class="chosen-options">
            <img src="https://github.com/vladislavs-poznaks/storage/raw/main/RPSLS/images/<?= $pl->getName() ?>.svg"
                 alt="<?= $pl->getName() ?>'s image"
                 class="chosen-option"
            >

            <img
                src="https://github.com/vladislavs-poznaks/storage/raw/main/RPSLS/images/VS-white.png"
                alt="VS image"
                class="vs-image"
            >

            <img src="https://github.com/vladislavs-poznaks/storage/raw/main/RPSLS/images/<?= $pc->getName() ?>.svg"
                 alt="<?= $pc->getName() ?>'s image"
                 class="chosen-option"
            >
        </div>

    </div>
<?php endif; ?>

<div
    class="options"
>
    <form action="/" method="POST" class="options">
        <?php foreach ($options->all() as $option) : ?>

                <button
                        type="submit"
                        name="choice"
                        value="<?= $option->getName() ?>"
                >
                    <img
                            src="https://github.com/vladislavs-poznaks/storage/raw/main/RPSLS/images/<?= $option->getName() ?>.svg"
                            alt="<?= $option->getName() ?>'s image"
                            class="option"
                    >
                </button>

        <?php endforeach; ?>
    </form>
</div>

</body>
</html>
