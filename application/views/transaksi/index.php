<?php echo $message; ?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-4 control-label">No. Transaksi</label>
        <div class="col-lg-7">
            <input type="text" id="transaksi" name="transaksi" class="form-control" value="<?php echo $noauto; ?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No</label>
        <div class="col-lg-5">
            <input type="text" name="No" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Non Hp</label>
        <div class="col-lg-5">
            <input type="text" name="No_Hp" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">barang</label>
        <div class="col-lg-5">
            <input type="text" name="barang" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">jenis paket</label>
        <div class="col-lg-5">
            <select name="jenis" class="form-control">
                <option></option>
                <option value="cuci luar Rp.30000">paket 1</option>
                <option value="cuci luar dalam Rp.40000">paket 2</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">harga</label>
        <div class="col-lg-5">
            <input type="text" name="harga" class="form-control" value="<?php echo $jenis_paket; ?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">Tgl order</label>
        <div class="col-lg-7">
            <input type="text" id="order" name="order" class="form-control" value="<?php echo $tanggalpinjam; ?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">Tgl penerimaan</label>
        <div class="col-lg-7">
            <input type="text" id="penerimaan" name="penerimaan" class="form-control" value="<?php echo $tanggalkembali; ?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('mahasiswa'); ?>" class="btn btn-default">Kembali</a>
    </div>
</form>