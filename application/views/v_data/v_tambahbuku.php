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
                                         <form action="<?php echo base_url('data/prosesbuku');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control select2" required="required"  name="kategori">
                                        <option disabled selected value> -- Pilih Kategori -- </option>
                                        <?php foreach($kats as $isi){?>
                                            <option value="<?= $isi['id_kategori'];?>"><?= $isi['nama_kategori'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rak / Lokasi</label>
                                    <select name="rak" class="form-control select2" required="required">
                                        <option disabled selected value> -- Pilih Rak / Lokasi -- </option>
                                        <?php foreach($rakbuku as $isi){?>
                                            <option value="<?= $isi['id_rak'];?>"><?= $isi['nama_rak'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" name="isbn"  placeholder="Contoh ISBN : 978-602-8123-35-8">
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="title" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Nama Pengarang">
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Nama Penerbit">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Buku</label>
                                    <input type="number" class="form-control" name="thn" placeholder="Tahun Buku : 2019">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" name="jml" placeholder="Jumlah buku : 12">
                                </div>
                                
                                <div class="form-group">
                                    <label>Sampul <small style="color:green">(gambar) * opsional</small></label>
                                    <input type="file" accept="image/*" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label>Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                                    <input type="file" accept="" name="lampiran">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea class="form-control" name="ket" id="summernotehal" style="height:120px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="tambah" value="tambah">
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