<!DOCTYPE html>
<html lang="en">
    <head>
    	<!-- Head -->
    	<?php $this->load->view('pemilik/_partial/head'); ?>
    </head>
    <body id="page-top">

    	<!-- Page Wrapper -->
    	<div id="wrapper">

    		<!-- Side Bar -->
    		<?php $this->load->view('pemilik/_partial/sidebar'); ?>

    		<!-- Content Wrapper -->
	        <div id="content-wrapper" class="d-flex flex-column">

	            <!-- Main Content -->
	            <div id="content">

	            	<!-- Header -->
	            	<?php $this->load->view('pemilik/_partial/header'); ?>

	            	<!-- Begin Page Content -->
	                <div class="container-fluid">

	                    <!-- Page Heading -->
	                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
	                        <h1 class="h3 mb-0 text-gray-800">Edit Pegawai</h1>
	                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
	                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>	                        
	                    </div>	                    

	                    <!-- Content Row -->
	                    <div class="card shadow mb-4">
	                        <div class="card-header py-3">
	                            <a href="<?php echo site_url(''); ?>/c_pemilik/viewMenu" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-circle-left"></i>
                                    </span>
                                    <span class="text">Back</span>
                                </a>
	                        </div>
	                        <div class="card-body">
	                            <div class="row">
		                            <div class="col-6">	                               

		                                <?php foreach($menu as $data){ ?>
		                                <form action="<?php echo site_url('/c_pemilik/editMenu/'.$data->id); ?>" method="POST" enctype="multipart/form-data">
		                                	<div class="mb-3">
		                                        <label for="id" class="form-label">ID Menu</label>
		                                        <input type="text" class="form-control" id="id" placeholder="ID Pegawai" name="id" value="<?php echo $data->id; ?>" disabled="">
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="nama" class="form-label">Nama Menu</label>
		                                        <input type="text" class="form-control" id="nama" placeholder="Nama Pegawai" name="nama" value="<?php echo $data->nama; ?>">
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="harga" class="form-label">Harga</label>
		                                        <input type="text" class="form-control" id="harga" placeholder="Username" name="harga" value="<?php echo $data->harga; ?>">
		                                    </div>
		                                    <div class="mb-3">
		                                        <input type="submit" class="btn btn-primary" value="Submit">
		                                    </div>
		                                </form> 
		                            	<?php } ?>

		                            </div>
		                        </div> 
	                        </div>
	                    </div>

	                </div>
	                <!-- End of Page Content -->

	            </div>
	            <!-- End of Main Content -->

	            <!-- Footer -->
	            <?php $this->load->view('pemilik/_partial/footer'); ?>

	        </div>
	        <!-- End of Content Wrapper -->

    	</div>
    	<!-- End of Page Wrapper -->

    	<!-- Scroll to Top Button-->
	    <a class="scroll-to-top rounded" href="#page-top">
	        <i class="fas fa-angle-up"></i>
	    </a>

	    <!-- Logout Modal-->
	    <?php $this->load->view('pemilik/_partial/modal'); ?>

	    <!-- JavaScript -->
	    <?php $this->load->view('pemilik/_partial/js'); ?>
    </body>
</html>