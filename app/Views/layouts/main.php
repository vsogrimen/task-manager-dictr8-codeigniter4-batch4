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
            <div class="navbar-nav ms-auto align-items-center">
                <?php if (session()->has('user_id')): ?>
                    <a class="nav-link" href="<?= url_to('tasks.index') ?>">Tasks</a>
                    <?php if (session('user_role') === 'admin'): ?>
                        <a class="nav-link" href="<?= url_to('admin') ?>">Admin</a>
                    <?php endif ?>

                    <span class="navbar-text mx-3"><?= esc(session('user_name')) ?></span>
                    <?= form_open(url_to('logout')) ?>
                    <button class="btn btn-sm btn-outline-light">Log out</button>
                    <?= form_close() ?>
                <?php else: ?>
                    <a class="nav-link" href="<?= url_to('login') ?>">Log in</a>
                    <a class="nav-link" href="<?= url_to('register') ?>">Register</a>
                <?php endif ?>
            </div>

        </div>
    </nav>
    <main class="container">
        <?= $this->include('partials/flash') ?>

        <?= $this->renderSection('content') ?>
    </main>
</body>

</html>