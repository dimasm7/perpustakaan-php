<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Buku
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" />
                    </div>

                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" />
                    </div>

                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" />
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun">
                            <?php
                                $tahun = date("Y");

                                for($i=$tahun-30; $i <= $tahun; $i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name="isbn" />
                    </div>

                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah" />
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="rak1">Rak 1</option>
                            <option value="rak2">Rak 2</option>
                            <option value="rak3">Rak 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal" type="date" />
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php

    $judul     = isset($_POST['judul']) ? $_POST['judul'] : false; 
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : false; 
    $penerbit  = isset($_POST['penerbit']) ? $_POST['penerbit'] : false; 
    $tahun     = isset($_POST['tahun']) ? $_POST['tahun'] : false; 
    $isbn      = isset($_POST['isbn']) ? $_POST['isbn'] : false; 
    $jumlah    = isset($_POST['jumlah']) ? $_POST['jumlah'] : false; 
    $lokasi    = isset($_POST['lokasi']) ? $_POST['lokasi'] : false; 
    $tanggal   = isset($_POST['tanggal']) ? $_POST['tanggal'] : false; 
    $simpan    = isset($_POST['simpan']) ? $_POST['simpan'] : false;

    if($simpan){
        $sql = $koneksi->query("INSERT into tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input) 
        values('$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$jumlah', '$lokasi', '$tanggal')");
        if($sql){
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=buku"; //utk kmbl kehalaman dartar buku stlh menambah buku
                </script>
            <?php
        }
    }

?>