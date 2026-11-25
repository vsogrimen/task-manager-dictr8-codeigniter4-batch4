<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <h1 class="h3 mb-3">Log in</h1>

        <?= form_open(url_to('login')) ?>
        <div class="mb-3">
            <?= form_label('Email', 'email', ['class' => 'form-label']) ?>
            <?= form_input(
                'email',
                '',
                ['id' => 'email', 'class' => 'form-control'],
                'email'
            ) ?>
        </div>
        <div class="mb-3">
            <?= form_label('Password', 'password', ['class' => 'form-label']) ?>
            <?= form_password(
                'password',
                '',
                ['id' => 'password', 'class' => 'form-control']
            ) ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Log in</button>
        <?= form_close() ?>

        <p class="mt-3 text-center">
            No account yet? <a href="<?= url_to('register') ?>">Register</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>