<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-white border rounded-3">
    <h1 class="display-6">Task Manager</h1>
    <p class="lead">Keep track of what you need to do, and when.</p>
    <a class="btn btn-primary" href="<?= url_to('tasks.index') ?>">
        View my tasks
    </a>
</div>
<?= $this->endSection() ?>