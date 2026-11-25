<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-3">Categories</h1>

<?= form_open(url_to('categories'), ['class' => 'row g-2 mb-4']) ?>
<div class="col-md-6">
    <?= form_input(
        'name',
        set_value('name', '', false),
        ['class' => 'form-control', 'placeholder' => 'New category']
    ) ?>
    <?= validation_show_error('name') ?>
</div>
<div class="col-md-2 d-grid">
    <button type="submit" class="btn btn-primary">Add</button>
</div>
<?= form_close() ?>
<table class="table bg-white border">
    <thead>
        <tr>
            <th>Name</th>
            <th class="text-end">Tasks</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= esc($category['name']) ?></td>
                <td class="text-end"><?= (int) $category['task_count'] ?></td>
                <td class="text-end">
                    <?= form_open(url_to('categories.delete', $category['id'])) ?>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                    <?= form_close() ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>