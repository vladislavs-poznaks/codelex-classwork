<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;400;600;700&display=swap" rel="stylesheet">

    <title>Picture Likes</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Source Code Pro";
            font-size: 20px;
            text-align: center;
        }

        button {
            background-color: #457b9d;
            color: white;
            height: 50px;
            width: 150px;
            font-size: 20px;
            border-radius: 50px;
            border: 0;
            margin-top: 10px;
            padding: 5px 25px;
        }

        button:hover {
            cursor: pointer;
            transform: scale(1.05);
            animation: 0.5s ease;
        }

        img {
            border-radius: 15px;
        }

        .pictures {
            background-color: #a8dadc;
            width: 800px;
            margin: 10px auto;
            padding: 50px 30px;
            border-radius: 30px;
            text-align: center;
        }

        .picture-box {
            display: grid;
            grid-template: 410px 30px 75px / 300px 300px;
            margin-top: 20px;
            justify-content: center;
        }

        .picture-image {
            grid-area: 1 / 1 / span 1 / span 2;
        }

        .picture-likes {
            grid-area: 2 / 1 / span 1 / span 2;
            align-content: center;
        }

        .picture-like-button {
            grid-area: 3 / 1 / span 1 / span 1;
        }

        .picture-dislike-button {
            grid-area: 3 / 2 / span 1 / span 1;
        }

    </style>
</head>

<body>

<div class="pictures">

    <h1>
        Picture Likes
    </h1>

    <?php foreach ($pictures->all() as $id => $picture) : ?>
        <div class="picture-box">

            <div class="picture-image">
                <img
                    src="<?= $picture->getPath() ?>"
                    alt="Picture"
                >
            </div>

            <div class="picture-likes">
                <h3>
                    Likes: <?= $picture->getLikes() ?>
                </h3>
            </div>

            <div class="picture-like-button">
                <form action="/like" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" >Like</button>
                </form>
            </div>

            <div class="picture-dislike-button">
                <form action="/dislike" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit">Dislike</button>
                </form>
            </div>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
