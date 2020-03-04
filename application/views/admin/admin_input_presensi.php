<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view("admin/_patrials/head.php") ?>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <!-- /.navbar -->
   <?php $this->load->view("admin/_patrials/navbar.php") ?>
 
  <!-- Sidebar -->
   <?php $this->load->view("admin/_patrials/admin_sidebar.php") ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Presensi Kehadiran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <script type='text/javascript'>
          if (<?=$this->session->flashdata('ale')?> != null) {
            document.write("<div class='alert alert-primary' role='alert'>Belum waktunya update presensi!</div>");
          }
          //alert(<?=$this->session->flashdata('ale')?>);</script>
        <h5>Presensi Hari Ini!</h5>
        <div class="row">
          
          <?php if ($presensi_today != null) { ?>
          <table class="table">
            <tr>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Update</th>
                <th>Pulang</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach ($presensi_today as $key){ ?>
            <tr>
                <td><?=$key->tanggal_presensi;?></td>
                <td><?=$key->jam_masuk_presensi;?></td>
                <td>
          <?php if ($key->jam_tengah == '00:00:00') {?>
                  <a href="<?=base_url('index.php/presensi/jam_update/'.$key->jam_masuk_presensi.'/'.$key->id_presensi)?>" class="btn btn-primary" role="button" >Update</a>    
          <?php }else{
                    echo $key->jam_tengah;
                }?>
                </td>
                <td>
          <?php if ($key->jam_keluar_presensi == '00:00:00') {?>
                  <a href="<?=base_url('index.php/presensi/jam_pulang/'.$key->jam_masuk_presensi.'/'.$key->id_presensi)?>" class="btn btn-primary" role="button" >Update</a>    
          <?php }else{
                    echo $key->jam_keluar_presensi;
                }?>    
                </td>
                <td><?=$key->keterangan_presensi?></td>
            </tr>
          <?php } ?>
          </table>

          <!-- ./col -->
        
        <?php }  else{?>
        <!-- /.row -->
        <!-- Main row -->
       
          <div class="col-md">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Presensi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="post"
              action="<?=base_url('index.php/presensi/jam_masuk')?>">
              <?php date_default_timezone_set('Asia/Jakarta'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="exampleInputEmail1" placeholder="Enter email" name="tanggal">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Waktu</label>
                    <input type="text" class="form-control" value="<?php echo date('H:i:s'); ?>" id="exampleInputPassword1" name="jam_masuk">
                  </div>
                  <!--<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile"> 
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>-->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <?php } ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view("admin/_patrials/js.php") ?>
</body>
</html>
