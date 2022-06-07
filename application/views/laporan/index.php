<legend>Data laporan</legend>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>id peminjaman</td>
            <td>No pelanggan</td>
            <td>nama</td>
            <td>tanggal order</td>
            <td>tanggal penerimaan</td>
            <td>jenis paket</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no_ = 0;
    foreach ($laporan as $row) : $no_++; ?>
        <tr>
            <td><?php echo $no_; ?></td>
            <td><?php echo $row->id_peminjaman; ?></td>
            <td><?php echo $row->No; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->tgl_order; ?></td>
            <td><?php echo $row->tgl_penerimaan; ?></td>
            <td><?php echo $row->jenis_paket; ?></td>
        </tr>
    <?php endforeach; ?>

</Table>