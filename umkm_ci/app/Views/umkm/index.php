<?php include APPPATH.'Views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h3>Data UMKM</h3>
    <a href="/umkm/create" class="btn btn-primary">+ Tambah Data</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form class="input-group mb-3" method="GET">
    <input type="text" class="form-control" name="q" placeholder="Cari nama usaha..." value="<?= esc($keyword) ?>">
    <button class="btn btn-outline-secondary" type="submit">Cari</button>
</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Usaha</th>
            <th>Produk</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1 + (10 * ( (service('request')->getGet('page_umkms') ?? 1) -1)); ?>
    <?php foreach($umkms as $u): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($u->nama) ?></td>
            <td><?= esc($u->jenis_usaha) ?></td>
            <td><?= esc($u->produk) ?></td>
            <td>
                <?php if($u->foto): ?>
                    <img src="/uploads/umkm/<?= esc($u->foto) ?>" width="60">
                <?php endif; ?>
            </td>
            <td>
                <a href="/umkm/edit/<?= $u->id ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="/umkm/delete/<?= $u->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    <?= csrf_field() ?>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links('default','bootstrap') ?>

<?php include APPPATH.'Views/layouts/footer.php'; ?>
