<script>
    $(function() {
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('peminjaman/tampil'); ?>");
        }
        loadData();

        function kosong(args) {
            //code
            $("#kode").val('');
            $("#keterangan").val('');
            $("#harga").val('');
        }
        $("#No").click(function() {
            var No = $("#No").val();
            $.ajax({
                url: "<?php echo site_url('peminjaman/cariMahasiswa'); ?>",
                type: "POST",
                data: "No=" + No,
                cache: false,
                success: function(html) {
                    $("#nama").val(html);
                }
            })
        })
        $("#kode").keypress(function() {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var kode = $("#kode").val();
                $.ajax({
                    url: "<?php echo site_url('peminjaman/cariBuku'); ?>",
                    type: "POST",
                    data: "kode=" + kode,
                    cache: false,
                    success: function(msg) {
                        data = msg.split("|");
                        if (data == 0) {
                            alert("data tidak ditemukan");
                            $("#keterangan").val('');
                            $("#harga").val('');
                        } else {
                            $("#keterangan").val(data[0]);
                            $("#harga").val(data[1]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        $("#tambah").click(function() {
            var kode = $("#kode").val();
            var keterangan = $("#keterangan").val();
            var harga = $("#harga").val();
            if (kode == "") {
                //code
                alert("Kode Buku Masih Kosong");
                return false;
            } else if (keterangan == "") {
                //code
                alert("Data tidak ditemukan");
                return false
            } else {
                $.ajax({
                    url: "<?php echo site_url('peminjaman/tambah'); ?>",
                    type: "POST",
                    data: "kode=" + kode + "&keterangan=" + keterangan + "&harga=" + harga,
                    cache: false,
                    success: function(html) {
                        loadData();
                        kosong();
                    }
                })
            }
        })
        $("#simpan").click(function() {
            var id_peminjaman = $("#id_peminjaman").val();
            var No = $("#No").val();
            var nama = $("#nama").val();
            var jenis_paket = $("#jenis_paket").val();
            var tgl_order = $("#tgl_order").val();
            var tgl_penerimaan = $("#tgl_penerimaan").val();
            var jumlah = parseInt($("#jumlahTmp").val(), 10);
            if (No == "") {
                alert("No belom diisi");
                return false;
            } else if (jumlah == 0) {
                alert("pilih jenis paket");
                return false;
            } else {
                $.ajax({
                    url: "<?php echo site_url('peminjaman/sukses'); ?>",
                    type: "POST",
                    data: "id_peminjaman=" + id_peminjaman + "&No=" + No + "&nama=" + nama + "&jenis_paket=" + jenis_paket + "&tgl_order=" + tgl_order + "&tgl_penerimaan=" + tgl_penerimaan + "&jumlah=" + jumlah,
                    cache: false,
                    success: function(html) {
                        alert("Transaksi berhasil");
                        location.reload();
                    }
                })
            }
        })
        $(".hapus").live("click", function() {
            var kode = $(this).attr("kode");
            $.ajax({
                url: "<?php echo site_url('peminjaman/hapus'); ?>",
                type: "POST",
                data: "kode=" + kode,
                cache: false,
                success: function(html) {
                    loadData();
                }
            });
        });
        // $("#cari").click(function() {
        //     $("#myModal2").modal("show");
        // })
        // $("#caribuku").keyup(function() {
        //     var caribuku = $("#caribuku").val();
        //     $.ajax({
        //         url: "<?php echo site_url('peminjaman/pencarianbuku'); ?>",
        //         type: "POST",
        //         data: "caribuku=" + caribuku,
        //         cache: false,
        //         success: function(html) {
        //             $("#tampilbuku").html(html);
        //         }
        //     })
        // })
        $(".tambah").live("click", function() {
            var kode = $(this).attr("kode");
            var keterangan = $(this).attr("keterangan");
            var harga = $(this).attr("harga");
            $("#kode").val(kode);
            $("#keterangan").val(keterangan);
            $("#harga").val(harga);
            $("#myModal2").modal("hide");
        })
    })
</script>

<legend>Transaksi</legend>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan'); ?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Transaksi</label>
                    <div class="col-lg-7">
                        <input type="text" id="id_peminjaman" name="id_peminjaman" class="form-control" value="<?php echo $noauto; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl order</label>
                    <div class="col-lg-7">
                        <input type="text" id="tgl_order" name="tgl_order" class="form-control" value="<?php echo $tgl_order; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl penerimaan</label>
                    <div class="col-lg-7">
                        <input type="text" id="tgl_penerimaan" name="tgl_penerimaan" class="form-control" value="<?php echo $tgl_penerimaan; ?>" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No</label>
                    <div class="col-lg-7">
                        <select name="No" class="form-control" id="No">
                            <option></option>
                            <?php foreach ($anggota as $anggota) : ?>
                                <option value="<?php echo $anggota->No; ?>"><?php echo $anggota->No; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">nama pelanggan</label>
                    <div class="col-lg-7">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-success">
    <div class="panel-heading">
        Data order
    </div>
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <label>jenis paket</label>
                <input type="text" class="form-control" placeholder="jenis paket" id="kode">
            </div>
            <div class="form-group">
                <label class="sr-only">keterangan</label>
                <input type="text" class="form-control" placeholder="keterangan" id="keterangan" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">harga</label>
                <input type="text" class="form-control" placeholder="harga" id="harga" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">Tambah</label>
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <!-- <div class="form-group">
                <label class="sr-only">Cari</label>
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div> -->
        </div>
    </div>
    <div id="tampil"></div>
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria hidden="true">&times;</button>
                <h4 class="modal-title">Cari Buku</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <label class="col-lg-3 control-label">Cari Nama Buku</label>
                    <div class="col-lg-5">
                        <input type="text" name="caribuku" id="caribuku" class="form-control">
                    </div>
                </div>
                <div id="tampilbuku"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->