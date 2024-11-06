<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include 'inc/head.php'; ?>
    </head>

    <body class="skin-blue">
        <?php include 'inc/header.php'; ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include 'sidebar-nav.php'; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php if ($level == '1') { ?>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('t_model');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Total Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo site_url('item');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <!-- Additional boxes can be added here following similar structure -->

                    </div><!-- /.row -->
                <?php } ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include 'inc/jq.php'; ?>
    </body>
</html>
