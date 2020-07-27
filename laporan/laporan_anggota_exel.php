<?php
    $koneksi = new mysqli('localhost', 'root', '', 'perpustakaan');

    $filename = "anggota_exel-(".date('d-m-Y').").xls";

    header("content-disposition: attachment; filename=$filename");
    header("content-type: application/vdn.ms-exel");
?>

<h2>Laporan Anggota</h2>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
        <th>Aksi</th>
    </tr>
    <?php
        $no =1;

        $sql = $koneksi->query("SELECT * FROM tb_anggota");

        while ( $data=$sql->fetch_assoc() ){
            $jk = ($data['jk']=='l')?"Laki-laki":"Wanita";
            $prodi = ($data['prodi']=='ti')?"Teknik Informatika":"Sistem Informasi";
    ?>
    <tr>
        <td> <?=$no++; ?></td>
        <td> <?=$data['nim'];  ?></td>
        <td> <?=$data['nama'];  ?></td>
        <td> <?=$data['tempat_lahir'];  ?></td>
        <td> <?=$data['tgl_lahir'];  ?></td>
        <td> <?=$jk ?></td>
        <td> <?=$prodi?></td>
    </tr>
    <?php } ?>
</table>