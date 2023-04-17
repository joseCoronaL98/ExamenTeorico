<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $postId = $_POST['news'];
        $name = $_SESSION['login'];
        $email = $_SESSION['AdminEmailId'];
        $comment = $_POST['comment'];

        if ($comment == '') {
            echo "<script>alert('Inserte un comentario');</script>";
        } else {
            $status = 1;
            $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment) values('$postId','$name','$email','$comment')");
            if ($query) {
                $msg = "Comentario agregado ";
            } else {
                $error = "Algo salió mal . Inténtalo de nuevo.".mysqli_error($con)." postID=".$postId;
                error_log("Error ".mysqli_error($con)); // Imprimir el error en la consola

            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="es-MX">
    <head>
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Noticias | Agregar Noticia</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet"/>

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet"/>
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script>
            function getNews(val) {
                $.ajax({
                    type: "POST",
                    url: "get_news.php",
                    data: 'catid=' + val,
                    success: function (data) {
                        $("#news").html(data);
                    }
                });
            }
        </script>
    </head>


    <body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Agregar un comentario </h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <!---Success Message--->
                            <?php if ($msg) { ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>¡Bien hecho!</strong> <?php echo htmlentities($msg); ?>
                                </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if ($error) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
                            <?php } ?>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Correo</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlentities($_SESSION['AdminEmailId']); ?>" placeholder="Correo" required>
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Comentario</label>
                                            <input type="text" class="form-control" id="comment" name="comment"
                                                   placeholder="Escriba un comentario" required>
                                        </div>



                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Categoria</label>
                                            <select class="form-control" name="category" id="category"
                                                    onChange="getNews(this.value);" required>
                                                <option value="">Selecciona Categoria de la noticia</option>
                                                <?php

                                                $ret = mysqli_query($con, "select id,CategoryName from  tblcategory where Is_Active=1");
                                                while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                    <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Selecciona notica</label>
                                            <select class="form-control" name="news" id="news" required>
                                            </select>
                                        </div>

                                        <button type="submit" name="submit"
                                                class="btn btn-success waves-effect waves-light">Comentar
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                            Descartar
                                        </button>
                                    </form>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->


                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php'); ?>

        </div>

    </div>
    <!-- END wrapper -->


    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>

        jQuery(document).ready(function () {

            $('.summernote').summernote({
                height: 240,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });
        });
    </script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>


    </body>
    </html>
<?php } ?>