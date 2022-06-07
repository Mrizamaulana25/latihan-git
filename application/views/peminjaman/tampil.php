<table class="table table-striped">
    <thead>
        <tr>
            <td>jenis paket</td>
            <td>keterangan</td>
            <td>harga</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach ($tmp as $tmp) : ?>
        <tr>
            <td><?php echo $tmp->jenis_paket; ?></td>
            <td><?php echo $tmp->keterangan; ?></td>
            <td><?php echo $tmp->harga; ?></td>
            <td><a href="#" class="hapus" kode="<?php echo $tmp->jenis_paket; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="2">Total barang</td>
        <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp; ?>" class="formcontrol"></td>
    </tr>
</table>