<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <h1 class="h3 mb-3">Create an account</h1>

        <?= form_open(url_to('register')) ?>
        <div class="mb-3">
            <?= form_label('Name', 'name', ['class' => 'form-label']) ?>
            <?= form_input(
                'name',
                set_value('name', '', false),
                ['id' => 'name', 'class' => 'form-control']
            ) ?>
            <?= validation_show_error('name') ?>
        </div>
        <div class="mb-3">
            <?= form_label('Email', 'email', ['class' => 'form-label']) ?>
            <?= form_input(
                'email',
                set_value('email', '', false),
                ['id' => 'email', 'class' => 'form-control'],
                'email'
            ) ?>
            <?= validation_show_error('email') ?>
        </div>
        <div class="mb-3">
            <?= form_label('Password', 'password', ['class' => 'form-label']) ?>
            <?= form_password(
                'password',
                '',
                ['id' => 'password', 'class' => 'form-control']
            ) ?>
            <?= validation_show_error('password') ?>
        </div>
        <div class="mb-3">
            <?= form_label(
                'Repeat password',
                'password_confirm',
                ['class' => 'form-label']
            ) ?>
            <?= form_password(
                'password_confirm',
                '',
                ['id' => 'password_confirm', 'class' => 'form-control']
            ) ?>
            <?= validation_show_error('password_confirm') ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <?= form_close() ?>

        <p class="mt-3 text-center">
            Have an account? <a href="<?= url_to('login') ?>">Log in</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>