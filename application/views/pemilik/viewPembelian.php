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
	                        <h1 class="h3 mb-0 text-gray-800">Menu Pembelian</h1>
	                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
	                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	                    </div>

	                    <!-- Content Row -->
	                    <div class="row">

	                    </div>

	                    <!-- Content Row -->
	                    <div class="row">

	                        
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