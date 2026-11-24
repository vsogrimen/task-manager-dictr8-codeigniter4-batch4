<div class="mb-3">
    <?= form_label('Title', 'title', ['class' => 'form-label']) ?>
    <?= form_input(
        'title',
        set_value('title', $task->title ?? '', false),
        ['id' => 'title', 'class' => 'form-control']
    ) ?>
    <?= validation_show_error('title') ?>
</div>

<div class="mb-3">
    <?= form_label('Description', 'description', ['class' => 'form-label']) ?>
    <?= form_textarea(
        'description',
        set_value('description', $task->description ?? '', false),
        ['id' => 'description', 'class' => 'form-control', 'rows' => 4]
    ) ?>
    <?= validation_show_error('description') ?>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <?= form_label('Status', 'status', ['class' => 'form-label']) ?>
        <?= form_dropdown(
            'status',
            \App\Entities\Task::STATUSES,
            set_value('status', $task->status ?? 'pending', false),
            ['id' => 'status', 'class' => 'form-select']
        ) ?>
        <?= validation_show_error('status') ?>
    </div>
    <div class="col-md-6 mb-3">
        <?= form_label('Due date', 'due_date', ['class' => 'form-label']) ?>
        <?= form_input(
            'due_date',
            set_value('due_date', $task->due_date ?? '', false),
            ['id' => 'due_date', 'class' => 'form-control'],
            'date'
        ) ?>
        <?= validation_show_error('due_date') ?>
    </div>
</div>