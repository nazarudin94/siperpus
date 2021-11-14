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
                        <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <div class="row">
                            <!--     <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>

                                </div> -->
                                <!-- <div class="col-md-6 d-flex justify-content-end"> -->
                                   <a href="<?= base_url('data/tambahbuku') ?>" class="btn btn-primary" >Tambah Anggota</a>

                               <!-- </div> -->
                           </div>
                       </div>
                       <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sampul</th>
                                        <th>ISBN</th>
                                        <th>Title</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Buku</th>
                                        <th>Stok Buku</th>
                                        <th>Dipinjam</th>
                                        <th>Tanggal Masuk </th>
                                    </tr>
                                </thead>
                                <tbody>
                                

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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


<!-- insert Modal-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog"
>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Anggota Baru</h5>

        </div>
        <div class="modal-body">
            <form class="user" method="POST" id="formdata">
                <div class="form-group">
                    <input type="text" class="form-control"
                    id="nama" name="nama" 
                    placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                    id="kelas" name="kelas" placeholder="kelas" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                    id="alamat" name="alamat" 
                    placeholder="alamat" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control"
                    id="tgl_lahir" name="tgl_lahir" placeholder="tanggal lahir" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                    id="nis" name="nis" 
                    placeholder="No Induk Santri" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                    id="no_anggota" name="no_anggota" placeholder="No Anggota" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" data-dismiss="modal" onclick="Add();" >Add</a>
                </div>
            </form>
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
        var xhr = new XMLHttpRequest();
        var url = "<?= base_url('home/insertdata') ?>";
        let myForm = document.getElementById('formdata');
        let formData = new FormData(myForm);
        console.log(formData);
        xhr.open("POST", url, true);
        xhr.send(formData);
        return false;

    }

</script>

</body>

</html>