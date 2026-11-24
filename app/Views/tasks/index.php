<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0"><?= esc($title) ?></h1>
    <a class="btn btn-primary" href="<?= url_to('tasks.new') ?>">+ New task</a>
</div>


<?php if ($tasks === []): ?>
    <div class="alert alert-info">No tasks yet.</div>
<?php else: ?>
    <table class="table table-hover bg-white border">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Due</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td>
                        <a href="<?= url_to('tasks.show', $task->id) ?>">
                            <?= esc($task->title) ?>
                        </a>
                    </td>
                    <td><?= esc($task->statusLabel()) ?></td>
                    <td class="<?= $task->isOverdue() ? 'text-danger fw-bold' : '' ?>">
                        <?= esc($task->due_date ?? '-') ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
<?= $this->endSection() ?>