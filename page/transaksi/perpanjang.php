<?php

    $id          = isset($_GET['id']) ? $_GET['id'] : false;
    $lambat      = isset($_GET['lambat']) ? $_GET['lambat'] : false;
    //$tgl_kembali = isset($_GET['tgl_kembali']) ? $_GET['tgl_kembali'] : false;

    if($lambat > 7){
        ?>
            <script type="text/javascript">
                alert("Buku Tidak Dapat Diperpanjang, Karena Lebih Dari 7 Hari... Kembalikan Dahulu Kemudian Pinjam Kembali");
                window.location.href="?page=transaksi";
            </script>
        <?php
    }else{
        $pecah_tgl_kembali = date("d-m-Y");
        $next_7_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
        $hari_next = date("d-m-Y", $next_7_hari);

        //$tgl2 = date('d-m-Y', strtotime('+7 days', strtotime($tgl_kembali)));

        $sql = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE id='$id'");

        if($sql){
            ?>
                <script type="text/javascript">
                    alert("Perpanjang Berhasil");
                window.location.href="?page=transaksi";
                </script>
            <?php
        }else{
            ?>
                <script type="text/javascript">
                    alert("Perpanjang Gagal");
                window.location.href="?page=transaksi";
                </script>
            <?php
        }
    }

?>