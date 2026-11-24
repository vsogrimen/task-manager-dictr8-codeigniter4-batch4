<?php if ($message = session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= esc($message) ?></div>
<?php endif ?>
<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif ?>