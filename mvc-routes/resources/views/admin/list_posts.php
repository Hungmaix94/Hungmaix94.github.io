<?php include '_admin_template/header.php' ?>
<?php //echo "<pre>"; var_dump($data); echo "</pre>"; exit; ?>
<!-- --><?php //echo"<pre>";var_dump($_SES.,SION);echo"</pre>";?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!--//cho nay de header nhe-->
    <?php include '_admin_template/menu.php'?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include '_admin_template/sidebar.php'?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <div class="box-body">
        <?php if(isset($_SESSION['error']['posts'])): ;?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <? echo $_SESSION['error']['posts']?>
            </div>
        <?php endif ;?>
             <?php if(isset($_SESSION['mes']['delete'])): ;?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $_SESSION['mes']['delete'];?>
            </div>
            <?php endif ;?>




        </div>
        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-sm-12 ">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo (isset($title)? $title : "Danh sách" );?></h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Cập nhập</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_PATH; ?>/admin/post/edit/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                                        </td>
                                        <td><?php echo $row['created_time']; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_PATH; ?>admin/category/edit/<?php echo $row['category_ID']; ?>">
                                                <span class="label label-success"><?php echo $row['category_name']; ?></span></a>
                                        </td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><a href="<?php echo BASE_PATH;?>/admin/post/edit/<?php echo $row['id'];?>"><button class="btn btn-primary">Sửa</button></a></td>
                                        <td><a href="<?php echo BASE_PATH;?>/admin/post/delete/<?php echo $row['id'];?>"><button class="btn btn-danger">Xóa</button></a></td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

</div>
<?php unset($_SESSION['mes']);?>
<?php unset($_SESSION['error']);?>
<!-- ./wrapper -->
<?php include '_admin_template/footer.php' ?>




