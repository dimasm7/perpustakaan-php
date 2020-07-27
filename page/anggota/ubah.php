<?php
    $nim = $_GET['nim'];
    $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE nim= '$nim'");
    $tampil = $sql->fetch_assoc();
    $j_k = $tampil['jk'];
    $pro_di = $tampil['prodi'];
?>


<div class="panel panel-primary">
    <div class="panel-heading">
        Ubah Data Anggota
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?=$tampil['nim']?>" readonly/> <!--readonly utk agar data tdk bisa diubah-->
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?=$tampil['nama']?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tmpt_lahir" value="<?=$tampil['tempat_lahir']?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="<?=$tampil['tgl_lahir']?>"/>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="l" name="jenis_kelamin" <?=($j_k=='l')?"checked":""; ?>/> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="p" name="jenis_kelamin" <?=($j_k=='p')?"checked":""; ?>/> Wanita
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="prodi">
                            <option value="ti" <?php if($pro_di=='ti'){echo'selected';} ?>>Teknik Informatika</option>
                            <option value="si" <?php if($pro_di=='si'){echo'selected';} ?>>Sistem Informasi</option>
                        </select>
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php

    $nim           = $_POST['nim']; 
    $nama          = $_POST['nama']; 
    $tmpt_lahir    = $_POST['tmpt_lahir']; 
    $tgl_lahir     = $_POST['tanggal_lahir']; 
    $jk            = $_POST['jenis_kelamin']; 
    $prodi         = $_POST['prodi']; 
    $simpan        = $_POST['simpan'];

    if($simpan){
        $sql = $koneksi->query("UPDATE tb_anggota SET nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', prodi='$prodi' WHERE nim='$nim'");
        if($sql){
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan!!!");
                    window.location.href="?page=anggota"; //utk kmbl kehalaman dartar anggota stlh menambah anggota
                </script>
            <?php
        }
    }

?>