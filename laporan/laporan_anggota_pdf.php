<?php
$koneksi = new mysqli('localhost', 'root', '', 'perpustakaan');
    $content = "
        <style type='text/css'>
            .tabel{border-collapse: collapse;}
            .tabel th{padding: 8px 5px; background-color: #cccccc;}
            .tabel td{padding: 8px 5px;}
        </style>
    ";
    $content .= "
	
	<page>
		<h2>Laporan Data Anggota</h2> 
		<table border='1' class='tabel'> <!--utk judul-judul tabel-->
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Program Studi</th>
            </tr>";
            $no = 1;

            $sql = $koneksi->query('SELECT * FROM tb_anggota');

            while ( $data=$sql->fetch_assoc() ){
                $jk = ($data['jk']=='l')?'Laki-laki':'Wanita';
                $prodi = ($data['prodi']=='ti')?'Teknik Informatika':'Sistem Informasi';

                $content .= '
                <tr>
                    <td> '.$no++.'</td>
                    <td> '.$data['nim'].'</td>
                    <td> '.$data['nama'].'</td>
                    <td> '.$data['tempat_lahir'].'</td>
                    <td> '.$data['tgl_lahir'].'</td>
                    <td> '.$jk.'</td>
                    <td> '.$prodi.'</td>
                </tr>
                ';
            }
            $content .="
        </table>
	</page>
	
	";

	require_once '../assets/html2pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output();
?>