<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="<?php echo site_url(''); ?>"><span class="glyphicon glyphicon-home">
                    </span> Home</a>
            </h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseReja"><span class="glyphicon glyphicon-book">
                    </span>data</a>
            </h4>
        </div>
        <div id="collapseReja" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-pencil text-primary"></span> <a href="<?php echo
                                                                                                    site_url('mahasiswa'); ?>">Pelanggan</a>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <span class="glyphicon glyphicon-user"></span> <a href="<?php echo site_url('dosen'); ?>">Dosen</a>
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-book text-success"></span> <a href="<?php echo
                                                                                                    site_url('buku'); ?>">data paket</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="" data-parent="#accordion" href="<?php echo site_url('peminjaman'); ?>"><span class="glyphicon glyphicon-th">
                    </span> Transaksi</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-saved"></span><a href="<?php echo site_url('peminjaman'); ?>">
                                Peminjaman</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-save"></span> <a href="<?php echo site_url('pengembalian'); ?>">
                                Pengembalian</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="" data-parent="#accordion" href="<?php echo site_url('laporan'); ?>"><span class="glyphicon glyphicon-file">
                    </span> Laporan</a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user"></span><a href="<?php echo site_url('laporan/anggota'); ?>"> Data
                                Anggota</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-book"></span><a href="<?php echo site_url('laporan/buku'); ?>"> Data
                                Buku</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-tasks"></span><a href="<?php echo site_url('laporan/peminjaman'); ?>">
                                Data Peminjaman</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-list-alt"></span><a href="<?php echo site_url('laporan/pengembalian'); ?>">
                                Data Pengembalian</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>