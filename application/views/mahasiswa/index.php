<a href="<?php echo site_url('mahasiswa/tambah'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
    Tambah</a>
<hr>
<legend>Data Pelanggan</legend>
<?php echo $message; ?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No.Hp</td>
            <td>Nama</td>
            <td>Jenis Sepatu</td>
            <td>Alamat</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no = 0;
    foreach ($mahasiswa as $row) : $no++; ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->No_Hp; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->jenis_sepatu; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td><a href="<?php echo site_url('mahasiswa/edit/' . $row->No); ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a href="#" class="hapus" kode="<?php echo $row->No; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
</Table>

<script>
    $(function() {
        $(".hapus").click(function() {
            var kode = $(this).attr("kode");
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });

        $("#konfirmasi").click(function() {
            var kode = $("#idhapus").val();
            $.ajax({
                url: "<?php echo site_url('mahasiswa/hapus'); ?>",
                type: "POST",
                data: "kode=" + kode,
                cache: false,
                success: function(html) {
                    location.href = "<?php echo site_url('mahasiswa/index/delete_success'); ?>";
                }
            });
        });
    });
</script>