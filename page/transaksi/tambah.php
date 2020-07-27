<?php

    $tgl_pinjam = date("d-m-Y");
    $tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
    $kembali = date("d-m-Y", $tujuh_hari);


?>



<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Transaksi
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" >
                    <div class="form-group">
                        <label>Judul</label>
                        <select class="form-control" name="judul">
                            <?php
                                $sql = $koneksi->query("SELECT * FROM tb_buku order by id");
                                while($data = $sql->fetch_assoc()){
                                    echo "<option value='$data[id].$data[judul]'> $data[judul] </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name="nama">
                            <?php
                                $sql = $koneksi->query("SELECT * FROM tb_anggota order by nim");
                                while($data = $sql->fetch_assoc()){
                                    echo "<option value='$data[nim].$data[nama]'> $data[nim] $data[nama] </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input class="form-control" type="text" name="tanggal_pinjam" id="tgl" value="<?=$tgl_pinjam;?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" type="text" name="tanggal_kembali" id="tgl" value="<?=$kembali;?>" readonly />
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="Simpan" style="margin-top:8px;" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php

    if(isset($_POST['simpan'])){ //kita set ktk stok buku kosong maka tdk bisa pinjam

        $tgl_pinjam = $_POST['tanggal_pinjam'];
        $tgl_kembali = $_POST['tanggal_kembali'];

        $buku = $_POST['judul'];
        $pecah_buku = explode(".", $buku);
        $id = $pecah_buku[0];
        $judul = $pecah_buku[1];

        $nama = $_POST['nama'];
        $pecah_nama = explode(".", $nama);
        $nim = $pecah_nama[0];
        $nama = $pecah_nama[1];

        $sql = $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul' ");
        while($data = $sql->fetch_assoc()){
            $sisa = $data['jumlah_buku'];
            if($sisa == 0){
                ?>
                <script type="text/javascript">
                    alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silahkan Tambah Stok Buku Terlebih Dahulu");
                    window.location.href="?page=transaksi&aksi=tambah";
                </script>
                <?php
            }else{
                $sql = $koneksi->query("INSERT INTO tb_transaksi(judul, nim, nama, tgl_pinjam, tgl_kembali, status) values('$judul', '$nim', '$nama', '$tgl_pinjam' , '$tgl_kembali', 'pinjam') ");
                $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id='$id' ");

                ?>
                <script type="text/javascript">
                    alert("Simpan Data Berhasil");
                    window.location.href="?page=transaksi";
                </script>
                <?php
            }
        }

    }

?>