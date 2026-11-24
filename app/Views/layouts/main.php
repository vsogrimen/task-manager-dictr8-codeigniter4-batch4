<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Task Manager') ?> | Task Manager</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= url_to('home') ?>">Task Manager</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= url_to('tasks.index') ?>">Tasks</a>
            </div>
        </div>
    </nav>
    <main class="container">
        <?= $this->include('partials/flash') ?>

        <?= $this->renderSection('content') ?>
    </main>
</body>

</html>