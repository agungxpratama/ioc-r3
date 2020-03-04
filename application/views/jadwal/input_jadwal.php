<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view("admin/_patrials/head.php") ?>
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
            <h1 class="m-0 text-dark">Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
              <li class="breadcrumb-item active">Input Jadwal</li>
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
        <!-- /.row -->
        <!-- Main row -->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Jadwal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=base_url()?>index.php/jadwal/simpan_jadwal" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Anda" name="id_pegawai">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Tim</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Tim Anda" name="id_tim">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Waktu</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tanggal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipe Jadwal</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Tim Anda" name="tipe_jadwal">
                  </div>
                  <!-- Untuk penginputan file exel yang tertera -->
                  <div class="form-group">
                    <label for="exampleInputFile">File</label>
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
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
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
