<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TODO List</title>
</head>

<body>

<h1>
    TODO List
</h1>

<div
    class="input-form"
>
    <form action="/" method="POST" class="input-form">
        <label for="title">Task title</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Task description</label>
        <input type="text" name="description" id="description" required>

        <button type="submit">Submit</button>
    </form>
</div>

<div
        class="task-list"
>
    <h2>Tasks</h2>
    <?php foreach ($tasks->all() as $task) : ?>
        <div class="task">
            <h4><?= $task->getId() . '. ' . $task->getTitle() . ($task->isCompleted() ? ' - Completed!' : '')?></h4>
            <p><?= $task->getDescription() ?></p>

            <?php if (! $task->isCompleted()) : ?>
                <form action="/" method="POST">
                    <input type="hidden" name="id" value="<?= $task->getId() ?>">
                    <button type="submit">Mark as Complete!</button>
                </form>
            <?php endif; ?>
            <hr>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
