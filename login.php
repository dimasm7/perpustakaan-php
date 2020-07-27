<?php
    ob_start();
    session_start();
    $koneksi = new mysqli('localhost', 'root', '', 'perpustakaan');
    $admin = isset($_SESSION['admin']) ? $_SESSION['admin']: false; //agar tdk error undifine 
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false; //agar td error undifine
//if($_SESSION['admin'] || $_SESSION['user']) //ini menyebabkan error undifine
if($admin || $user){ 
    header("location:index.php");
}else{

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Halaman Login</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="row text-center">
                <div class="col-mid-12">
                    <br/><br/>
                    <h2>Halaman Login</h2>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-mid-4 col-mid-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong> Masukkan Username dan Password</strong>
                        </div>
                        <div class="panel-body">
                            <form action="cek-login.php" role="form" method="post">
                                <br/>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Your Username"/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Your Password"/>
                                </div>
                                <input type="submit" name="login" value="Login" class="btn btn-primary"/>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    </body>
</html>

<?php
/*
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $sql = $koneksi->query("SELECT * FROM tb_user where username='$username' and password='$pass' ");
        $data = $sql->fetch_assoc();

        $ketemu = $sql->num_rows;

        if($ketemu >= 1){
            session_start();
            if($data['level'] == "admin"){
                $_SESSION['admin'] = $data['id'];
                header("location:index.php"); //header>>>>ini adalah utk menuju halaman index
            }elseif($data['level'] == "user"){
                $_SESSION['user'] = $data['id'];
                header("location:index.php");
            }
        }else{
            ?>
                <script type="text/javascript">
                    alert("Login GAGAL username dan password anda salah... Silahkan ulangi lagi");
                </script>
            <?php
        }
    }*/
}
?>