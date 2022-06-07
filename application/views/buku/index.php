<a href="<?php echo site_url('buku/tambah'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<legend>Data paket</legend>
<?php echo $message; ?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>jenis paket</td>
            <td>keterangan</td>
            <td>harga</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no = 0;
    foreach ($buku as $row) : $no++; ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->jenis_paket; ?></td>
            <td><?php echo $row->keterangan; ?></td>
            <td><?php echo $row->harga; ?></td>
            <td><a href="<?php echo site_url('buku/edit/' . $row->jenis_paket); ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a href="#" class="hapus" jenis_paket="<?php echo $row->jenis_paket; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
</Table>
<script>
    $(function() {
        $(".hapus").click(function() {
            var jenis_paket = $(this).attr("jenis_paket");
            $("#idhapus").val(jenis_paket);
            $("#myModal").modal("show");
        });
        $("#konfirmasi").click(function() {
            var jenis_paket = $("#idhapus").val();
            $.ajax({
                url: "<?php echo site_url('buku/hapus'); ?>",
                type: "POST",
                data: "jenis_paket=" + jenis_paket,
                cache: false,
                success: function(html) {
                    location.href = "<?php echo site_url('buku/index/delete_success'); ?>";
                }
            });
        });
    });
</script>