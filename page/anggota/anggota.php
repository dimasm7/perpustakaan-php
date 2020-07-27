<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
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
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no = 1;

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
                                                    <td>
                                                        <a href="?page=anggota&aksi=ubah&nim=<?=$data['nim']; ?>" class="btn btn-info">Ubah</a>
                                                        <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"  href="?page=anggota&aksi=hapus&nim=<?=$data['nim'];?>" class="btn btn-danger">Hapus</a>
                                                        <!--onclick ="return confirm('....') ini utk memberi info apakah yakin akan melakukannya"-->
                                                    </td>
                                                </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-top : 8px;"><i class="fa fa-plus"></i>Tambah Anggota</a>
                            
                            <a href="./laporan/laporan_anggota_exel.php" class="btn btn-default" target="blank" style="margin-top:8px;"><i class="fa fa-print"></i>Export to Exel</a>

                            <a href="./laporan/laporan_anggota_pdf.php" class="btn btn-default" target="blank" style="margin-top:8px;"><i class="fa fa-print"></i>Export to PDF</a>
                        </div>
                    </div>
                </div>
</div>                                    