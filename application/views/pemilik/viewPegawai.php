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
	                        <h1 class="h3 mb-0 text-gray-800">Menu Manajemen Pegawai</h1>
	                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
	                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>	                        
	                    </div>	                    

	                    <!-- Content Row -->
	                    <div class="card shadow mb-4">
	                        <div class="card-header py-3">
	                            <a href="<?php echo site_url(); ?>/c_pemilik/viewAddPegawai" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Data</span>
                                </a>
	                        </div>
	                        <div class="card-body">
	                            <div class="table-responsive">
	                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                                    <thead>
	                                        <tr>
	                                            <th>ID Pegawai</th>
	                                            <th>Nama Pegawai</th>
	                                            <th>Username</th>
	                                            <th>Password</th>
	                                            <th>No. HP</th>
	                                            <th>Aksi</th>
	                                        </tr>
	                                    </thead>
	                                    <tfoot>
	                                        <tr>
	                                            <th>ID Pegawai</th>
	                                            <th>Nama Pegawai</th>
	                                            <th>Username</th>
	                                            <th>Password</th>
	                                            <th>No. HP</th>
	                                            <th>Aksi</th>
	                                        </tr>
	                                    </tfoot>

	                                    <?php foreach($pegawai as $data){ ?>
	                                    <tbody>
	                                        <tr>
	                                            <td><?php echo $data->id; ?></td>
	                                            <td><?php echo $data->nama; ?></td>
	                                            <td><?php echo $data->username; ?></td>
	                                            <td><?php echo $data->password; ?></td>
	                                            <td><?php echo $data->noHP; ?></td>
	                                            <td>
	                                            	<a href="<?php echo site_url('/c_pemilik/viewEditPegawai/'.$data->id); ?>" title="Edit"><span style="color: Dodgerblue;"><i class="fas fa-edit"></i></span></a>
	                                            	
                                                	<a href="" title="Delete" data-toggle="modal" data-target="#deleteModal" onclick="func_delete('<?php echo site_url("c_pemilik/deletePegawai/".$data->id);?>');"><span style="color: Tomato;"><i class="fas fa-trash"></i></span></a>
	                                            </td>
	                                        </tr>	                                        
	                                    </tbody>
	                                	<?php } ?>

	                                </table>
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

	    <!-- Modal-->
	    <?php $this->load->view('pemilik/_partial/modal'); ?>

	    <!-- JavaScript -->
	    <?php $this->load->view('pemilik/_partial/js'); ?>
    </body>
</html>