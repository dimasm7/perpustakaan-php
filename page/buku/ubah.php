<?php
    //membuat koneksi utk ubah data yg tersimpan di db
    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE id='$id'");
    $tampil = $sql->fetch_assoc();
    $tahun2 = $tampil['tahun_terbit'];
    $lokasi = $tampil['lokasi'];
   
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" value="<?=$tampil['judul']; ?>" /> <!--utk menampilkan data lama ktk akan di ubah-->
                    </div>

                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" value="<?=$tampil['pengarang']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" value="<?=$tampil['penerbit']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun">
                            <?php
                                $tahun = date("Y");

                                for($i=$tahun-30; $i <= $tahun; $i++){
                                    //utk memanpilkan tahun yg trsimpan di database kmdn akan diubah 
                                    if($tahun2 == $i){
                                        echo'<option value="'.$i.'" selected>'.$i.'</option>';
                                    }else{
                                        echo'<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name="isbn" value="<?=$tampil['isbn']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah" value="<?=$tampil['jumlah_buku']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="rak1" <?php if($lokasi=='rak1'){echo "selected";} ?>>Rak 1</option>
                            <option value="rak2" <?php if($lokasi=='rak2'){echo "selected";} ?>>Rak 2</option>
                            <option value="rak3" <?php if($lokasi=='rak3'){echo "selected";} ?>>Rak 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal" type="date" value="<?=$tampil['tgl_input']; ?>" />
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

    $judul     = $_POST['judul']; 
    $pengarang = $_POST['pengarang']; 
    $penerbit  = $_POST['penerbit']; 
    $tahun     = $_POST['tahun']; 
    $isbn      = $_POST['isbn']; 
    $jumlah    = $_POST['jumlah']; 
    $lokasi    = $_POST['lokasi']; 
    $tanggal   = $_POST['tanggal']; 
    $simpan    = $_POST['simpan'];

    if($simpan){
        $sql = $koneksi->query("UPDATE tb_buku SET judul        ='$judul',
                                                   pengarang    ='$pengarang',
                                                   penerbit     ='$penerbit',
                                                   tahun_terbit ='$tahun',
                                                   isbn         ='$isbn',
                                                   jumlah_buku  ='$jumlah',
                                                   lokasi       ='$lokasi',
                                                   tgl_input    ='$tanggal' WHERE id='$id'");
        if($sql){
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Diubah");
                    window.location.href="?page=buku"; //utk kmbl kehalaman dartar buku stlh menambah buku
                </script>
            <?php
        }
    }

?>