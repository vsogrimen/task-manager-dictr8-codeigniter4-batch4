<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Users and their tasks</h1>
    <a class="btn btn-outline-primary" href="<?= url_to('categories') ?>">
        Manage categories
    </a>
</div>

<table class="table bg-white border">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-end">Tasks</th>
            <th class="text-end">Completed</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['role']) ?></td>
                <td class="text-end"><?= (int) $user['total'] ?></td>
                <td class="text-end"><?= (int) $user['done'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>