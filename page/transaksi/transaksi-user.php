<a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-bottom : 5px;"><i class="fa fa-plus"></i> Pinjam Buku</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Pinjam Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no =1;

                                            $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE status='pinjam'");

                                            while ( $data=$sql->fetch_assoc() ){
                                        ?>

                                                <tr>
                                                    <td> <?=$no++; ?></td>
                                                    <td> <?=$data['judul'];  ?></td>
                                                    <td> <?=$data['nim'];  ?></td>
                                                    <td> <?=$data['nama'];  ?></td>
                                                    <td> <?=$data['tgl_pinjam'];  ?></td>
                                                    <td> <?=$data['tgl_kembali'];  ?></td>
                                                    <td> 
                                                        <?php
                                                            
                                                            $denda = 1000;
                                                            $tgl_dateline2 = $data['tgl_kembali'];
                                                            $tgl_kembali = date('Y-m-d');
                                                            $lambat = terlambat($tgl_dateline2, $tgl_kembali);
                                                            $denda1 = $lambat*$denda;

                                                            if($lambat>0){
                                                                echo"<font color='red'>$lambat hari<br>(Rp.$denda1)</font>";
                                                            }else{
                                                                echo $lambat."Hari";
                                                            }
                                                        ?>
                                                     </td>
                                                    <td> <?=$data['status']?></td>
                                                   
                                                    <td>
                                                        <a href="?page=transaksi&aksi=perpanjang&id=<?=$data['id'];?>&judul=<?=$data['judul'];?>&lambat=<?=$lambat;?>&$tgl_kembali<?=$data['tgl_kembali'];?>" class="btn btn-danger">Perpanjang</a>
                                                        <!--onclick ="return confirm('....') ini utk memberi info apakah yakin akan melakukannya"-->
                                                    </td>
                                                </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>                                    