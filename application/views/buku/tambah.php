<?php echo $message; ?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">jenis paket</label>
        <div class="col-lg-5">
            <input type="text" name="jenis_paket" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">keterangan</label>
        <div class="col-lg-5">
            <input type="text" name="keterangan" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">harga</label>
        <div class="col-lg-5">
            <input type="text" name="harga" class="form-control">
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-lg-2 control-label">Klasifikasi buku</label>
        <div class="col-lg-5">
            <select name="jenis" class="form-control">
                <option></option>
                <option value="Tugas Akhir">Tugas Akhir</option>
                <option value="Skripsi">Skripsi</option>
                <option value="Tutorial">Tutorial</option>
                <option value="Science">Science</option>
            </select>
        </div>
    </div> -->
    <br>
    <br>
    <br>
    <br>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('buku'); ?>" class="btn btn-default">Kembali</a>
    </div>
</form>