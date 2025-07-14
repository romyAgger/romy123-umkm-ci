<?php include APPPATH.'Views/layouts/header.php'; ?>
<h3>Edit Data UMKM</h3>

<?php if(session()->get('errors')): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach(session()->get('errors') as $e): ?>
            <li><?= esc($e) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form action="/umkm/update/<?= $umkm->id ?>" method="POST" enctype="multipart/form-data">
    <?php include '_form.php'; ?>
</form>
<?php include APPPATH.'Views/layouts/footer.php'; ?>
