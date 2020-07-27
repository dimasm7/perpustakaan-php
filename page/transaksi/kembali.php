<?php

    $id = $_GET['id'];
    $judul = $_GET['judul'];

    $sql = $koneksi->query("UPDATE tb_transaksi set status='kembali' WHERE id='$id' ");

    $sql1 = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku+1) WHERE judul='$judul' ");

    ?>

    <script>
        alert("Proses Pengembalian Buku Berhasil");
        window.location.href="?page=transaksi";
    </script>

    <?php

?>