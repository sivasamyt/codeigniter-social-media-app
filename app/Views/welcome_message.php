<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Welcome</h1>
        <p class="lead">Click the button below to go to the post page</p>
        <a href="/feed" class="btn btn-primary btn-lg">Go to Postpage</a>
    </div>
</div>
<?= $this->endSection(); ?>