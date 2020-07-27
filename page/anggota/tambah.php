<script type="text/javascript">
    function validasi(form){ //agar ktk blm memasukkan data mk ada pemberi tahuan dan tdk bisa di simpan
        if(form.nim.value==""){
            alert("NIM Tidak Boleh Kosong");
            form.nim.focus();
            return(false);
        }
        if(form.nama.value==""){
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return(false);
        }
        if(form.tmpt_lahir.value==""){
            alert("Tempat Lahir Tidak Boleh Kosong");
            form.tmpt_lahir.focus();
            return(false);
        }
        if(form.tgl.value==""){
            alert("Tanggal Lahir Tidak Boleh Kosong");
            form.tgl.focus();
            return(false);
        }
        if(form.jk.value==""){
            alert("Jenis Kelamin Tidak Boleh Kosong");
            form.jk.focus();
            return(false);
        }
        if(form.prodi.value==""){
            alert("Program Studi Tidak Boleh Kosong");
            form.prodi.focus();
            return(false);
        }
    return(true);
    }
</script>

<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Data Anggota
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)"> <!--utk ktk di submit mk mangggil validasi-->
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" />
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tmpt_lahir" />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" id="tgl" />
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="l" name="jenis_kelamin" id="jk" /> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="p" name="jenis_kelamin" id="jk" /> Wanita
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="prodi">
                            <option value="ti">Teknik Informatika</option>
                            <option value="si">Sistem Informasi</option>
                        </select>
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

    $nim           = isset($_POST['nim']) ? $_POST['nim'] : false; 
    $nama          = isset($_POST['nama']) ? $_POST['nama'] : false; 
    $tmpt_lahir    = isset($_POST['tmpt_lahir']) ? $_POST['tmpt_lahir'] : false; 
    $tgl_lahir     = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : false; 
    $jk            = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : false; 
    $prodi         = isset($_POST['prodi']) ? $_POST['prodi'] : false; 
    $simpan        = isset($_POST['simpan']) ? $_POST['simpan'] : false;

    if($simpan){
        $sql = $koneksi->query("INSERT into tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi) values('$nim', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$prodi')");
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