<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-3">Edit task</h1>

<?= form_open(url_to('tasks.update', $task->id)) ?>
<?= $this->include('tasks/_form') ?>
<button type="submit" class="btn btn-primary">Save changes</button>
<a class="btn btn-link" href="<?= url_to('tasks.show', $task->id) ?>">
    Cancel
</a>
<?= form_close() ?>
<?= $this->endSection() ?>