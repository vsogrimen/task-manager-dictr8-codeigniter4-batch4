<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-3">New task</h1>

<?= form_open(url_to('tasks.create')) ?>
<?= $this->include('tasks/_form') ?>
<button type="submit" class="btn btn-primary">Add task</button>
<a class="btn btn-link" href="<?= url_to('tasks.index') ?>">Cancel</a>
<?= form_close() ?>
<?= $this->endSection() ?>