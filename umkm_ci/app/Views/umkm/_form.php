<?= csrf_field() ?>
<div class="mb-3">
    <label class="form-label">Nama Usaha</label>
    <input type="text" name="nama" value="<?= old('nama', $umkm->nama ?? '') ?>" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" required><?= old('alamat', $umkm->alamat ?? '') ?></textarea>
</div>
<div class="mb-3">
    <label class="form-label">Tanggal Lahir Pemilik</label>
    <input type="date" name="tanggal_lahir_pemilik" value="<?= old('tanggal_lahir_pemilik', $umkm->tanggal_lahir_pemilik ?? '') ?>" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Jenis Usaha</label>
    <input type="text" name="jenis_usaha" value="<?= old('jenis_usaha', $umkm->jenis_usaha ?? '') ?>" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Produk</label>
    <input type="text" name="produk" value="<?= old('produk', $umkm->produk ?? '') ?>" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Foto (jpg/png, max 2MB)</label>
    <input type="file" name="foto" class="form-control">
    <?php if(isset($umkm) && $umkm->foto): ?>
        <img src="/uploads/umkm/<?= esc($umkm->foto) ?>" width="80" class="mt-2">
    <?php endif; ?>
</div>
<button class="btn btn-success">Simpan</button>
<a href="/umkm" class="btn btn-secondary">Batal</a>
