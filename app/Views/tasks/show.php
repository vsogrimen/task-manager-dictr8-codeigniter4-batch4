<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h1 class="h3 card-title"><?= esc($task->title) ?></h1>
        <p class="mb-1">Status: <?= esc($task->statusLabel()) ?></p>
        <p class="mb-1">Due: <?= esc($task->due_date ?? 'No due date') ?></p>
        <p class="text-muted small">
            Created <?= esc($task->created_at->humanize()) ?>
        </p>
        <p class="card-text"><?= nl2br(esc($task->description ?? '')) ?></p>
    </div>
</div>
<div class="mt-3 d-flex gap-2">
    <a class="btn btn-primary" href="<?= url_to('tasks.edit', $task->id) ?>">
        Edit
    </a>
    <?= form_open(url_to('tasks.delete', $task->id), [
        'onsubmit' => "return confirm('Delete this task?')",
    ]) ?>
    <button type="submit" class="btn btn-outline-danger">Delete</button>
    <?= form_close() ?>
    <a class="btn btn-link" href="<?= url_to('tasks.index') ?>">
        &larr; Back to tasks
    </a>
</div>

<?= $this->endSection() ?>