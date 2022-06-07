<html>

<body>

    <form action="<?= base_url('mahasiswa/insert'); ?>" method="post">
        <table border="1%">
            
            <tr>
                <th colspan="3">
                    Input Mahasiswa
                </th>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim"></td>
            </tr>

            <tr>
                <td>Nama Mahasiswa</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>

            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" id="jurusan">
                        <option value="Sistem Informatika">SI</option>
                        <option value="Teknik Informatika">TI</option>                        
                    </select>
                </td>
            </tr>

            <tr>
                <td>Alamat Mahasiswa</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat"></td>
            </tr>

            <tr>                
                <td colspan="3"><input type="submit" name="submit" id="submit" value="submit"></td>
            </tr>

        </table>

        <?php echo validation_errors(); ?>
    </form>

</body>    

</html>