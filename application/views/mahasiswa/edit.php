<legend>Edit Data Mahasiswa</legend>
<?php echo $message; ?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No</label>
        <div class="col-lg-5">
            <input type="text" name="No" class="form-control" value="<?php echo $mhs['No']; ?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No.Hp</label>
        <div class="col-lg-5">
            <input type="text" name="No_Hp" class="form-control" value="<?php echo $mhs['No_Hp']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $mhs['nama']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">jenis sepatu</label>
        <div class="col-lg-5">
            <input type="text" name="jenis_sepatu" class="form-control" value="<?php echo $mhs['jenis_sepatu']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat" class="form-control" value="<?php echo $mhs['alamat']; ?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('mahasiswa'); ?>" class="btn btn-default">Kembali</a>
    </div>
</form>