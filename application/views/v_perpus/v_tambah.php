<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Anggota</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('template/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('template/header'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">TAMBAH ANGGOTA</h1>
                    </div>
                    <!-- DataTales Example -->
                    <!-- <section class="content"> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <!-- /.box-header -->
                                    <div class="card-body"> 
                                        <form  action="<?php echo base_url('home/tambah');?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Pengguna</label>
                                                        <input type="text" id="nama" class="form-control" name="nama"  placeholder="Nama Pengguna" value="<?=set_value('nama');?>">
                                                         <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="lahir" id="lahir"  placeholder="Contoh : Bekasi" value="<?=set_value('lahir');?>">
                                                          <?= form_error('lahir','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"  placeholder="Contoh : 1999-05-18" value="<?=set_value('tgl_lahir');?>">
                                                        <?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" id="user" name="user"  placeholder="Username" value="<?=set_value('user');?>" >
                                                          <?= form_error('user','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group ">
                                                     <label>Password</label>
                                                            <input type="password" class="form-control" name="password" 
                                                            id="password" placeholder="Password">
                                                  <?= form_error('password','<small class="text-danger pl-3">','</small>');?>

                                                    </div>
                                                    <div class="form-group ">
                                                        <label>Level</label>
                                                        <select name="level" class="form-control" >
                                                            <option>Petugas</option>
                                                            <option>Anggota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <br/>
                                                        <input type="radio" name="jenkel" value="Laki-Laki" > Laki-Laki
                                                        <br/>
                                                        <input type="radio" name="jenkel" value="Perempuan" > Perempuan
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input id="uintTextBox" class="form-control" name="telepon" id="telepon"  placeholder="Contoh : 089618173609" value="<?=set_value('telepon');?>">
                                                         <?= form_error('telepon','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control" name="email" id="email"  placeholder="Contoh : fauzan1892@codekop.com" value="<?=set_value('email');?>">
                                                         <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pas Foto</label>
                                                        <input type="file" accept="image/*" name="gambar"  id="gambar" value="<?=set_value('gambar');?>">
                                                           <?= form_error('gambar','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="alamat" value="<?=set_value('alamat');?>"></textarea>
                                                           <?= form_error('alamat','<small class="text-danger pl-3">','</small>');?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                                            </form>
                                            <a href="<?= base_url('user');?>" class="btn btn-danger btn-md">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </section> -->
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php $this->load->view('template/footer'); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?=base_url();?>assets/js/demo/datatables-demo.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
        function Add(){
        // alert('fs');
        // var xhr = new XMLHttpRequest();
        // var url = "<?= base_url('home/insertdata') ?>";
        // let myForm = document.getElementById('formdata');
        // let formData = new FormData(myForm);
        // console.log(formData);
        // xhr.open("POST", url, true);
        // xhr.send(formData);
        // return false;

        fetch('insertdata',{
            method:"POST",
            body: new FormData(document.getElementById('formdata'))
        })
    }

</script>

</body>

</html>