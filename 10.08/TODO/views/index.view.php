<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TODOs</title>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, button {
            font-family: 'Architects Daughter', cursive;
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

        h1, h2, h3 {
            margin-top: 10px;
            text-align: center;
        }

        hr {
            margin-top: 5px;
        }

        .input-label-field, .input-form-title {
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

        .input-form, .task-list {
            background-color: #F2FBFF;
            border-radius: 15px;
            padding: 15px 0;
            width: 800px;
            margin: 10px auto;
        }

        .task {
            display: inline-block;
            padding: 5px 25px;
        }

        .checkmark {
            width: 20px;
            height: 20px;
        }

        .complete-button {
            margin-top: 15px;
            float: left;
        }

        .complete-button button {
            height: 50px;
            width: 50px;
            padding: 0;
        }

        .task-title-description {
            float: left;
            margin-left: 25px;
        }

        .task-title-description h3 {
            text-align: left;
        }

    </style>
</head>

<body>

<div
    class="input-form"
>
    <form action="/" method="POST">
        <div class="input-form-title">
            <h3>Create New Task!</h3>
        </div>
        <div class="input-label-field">
            <label for="title">Task title</label>
            <input type="text" name="title" id="title" required class="input">
        </div>

        <div class="input-label-field">
            <label for="description">Task description</label>
            <input type="text" name="description" id="description" required class="input">
        </div>

        <div class="button">
            <button type="submit">Add TODO!</button>
        </div>

    </form>
</div>

<div
        class="task-list"
>
    <?php if (count($tasks->all()) > 0) : ?>
        <h2>My Tasks</h2>
        <?php foreach ($tasks->all() as $id => $task) : ?>

            <hr>

            <div class="task">
                <div class="complete-button">
                    <?php if (! $task->isCompleted()) : ?>
                        <form action="/" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/2/27/White_check.svg"
                                    alt="checkmark"
                                    class="checkmark"
                                >
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="task-title-description">
                    <h3><?= $id + 1 . '. ' . $task->getTitle()?></h3>
                    <p><?= $task->getDescription() ?></p>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <h2>No tasks yet...</h2>
    <?php endif; ?>

</div>

</body>
</html>
