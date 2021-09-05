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
	                        <h1 class="h3 mb-0 text-gray-800">Menu Penjualan</h1>
	                        
	                    </div>
	                    <div id="notifications"><?php echo $this->session->flashdata('bayar'); ?></div>

	                    <!-- Content Cari Barang -->
	                    <div class="row">
	                    	<div class="col-12">

	                            <!-- Basic Card Example -->
	                            <div class="card shadow mb-4">
	                                <div class="card-header py-3 bg-light">
	                                    <form action="<?php echo site_url(); ?>/c_pemilik/cariBarang" method="POST" id="cariBarang"
	                                    	class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
					                        <div class="input-group">
					                            <input type="text" class="form-control bg-white border-1 small" placeholder="Cari menu..." name="key" 
					                                aria-label="Search" aria-describedby="basic-addon2">
					                            <div class="input-group-append">
					                                <button class="btn btn-primary" type="submit" form="cariBarang">
					                                    <i class="fas fa-search fa-sm"></i>
					                                </button>
					                            </div>
					                        </div>
					                    </form>
	                                </div>
	                                <div class="card-body">
	                                    <table class="table table-sm">
										  <thead>
										    <tr>
										      <th scope="col">ID Menu</th>
										      <th scope="col">Nama Menu</th>
										      <th scope="col">Harga</th>
										      <th scope="col">Jumlah</th>
										      <th scope="col">aksi</th>
										    </tr>
										  </thead>
										  
										  <?php
										   	if($dataCari != NULL):
										   		foreach($dataCari as $data): 
										  ?>

										  <form id="entriMenu" action="<?php echo site_url('c_pemilik/cart/') ?>" method="get">
											  <tbody>
											    <tr>
												      <th><?php echo $data->id; ?></th>
												      <td hidden=""><input type="text" name="id" value="<?php echo $data->id; ?>"></td>											      
												      <td><?php echo $data->nama; ?></td>
												      <td><?php echo "Rp. ".$data->harga; ?></td>
												      <td>
												      	<input type="number" name="jumlah" class="form-control form-control-sm" size="1" value="1">
												      </td>
												      <td>
												      	<input type="submit" class="btn btn-primary btn-sm" value="tambah ke cart">											  
												      </td>										    
												</tr>
											  </tbody>
										  </form>

										  <?php
												endforeach;
											endif; 
										  ?>
											
										</table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <!-- Content Pembayaran Barang -->
	                    <div class="row">
	                    	<div class="col-12">
	                    		<div class="card shadow mb-4">
	                                <div class="card-header py-3 bg-primary">
	                                    <h6 class="m-0 font-weight-bold text-light">Cart</h6>
	                                </div>
	                                <div class="card-body">
	                                	<form action="<?php echo site_url('c_pemilik/bayar/'); ?>" method="post" id="bayar">
	                                		<div class="form-group">
	    										<label for="tanggal">Tanggal</label>
		                                		<input type="date" name="tanggal" class="form-control" name="tanggal" required="" id="tanggal">
		                                	</div>
	                                	</form>
	                                	<table class="table table-sm">
											<thead>
											    <tr>
											      <th scope="col">ID Menu</th>
											      <th scope="col">Nama Menu</th>
											      <th scope="col">Harga Satuan</th>
											      <th scope="col">Jumlah</th>
											      <th scope="col">Harga</th>
											    </tr>
											</thead>
											<tbody>
												<?php
													if($dataCart > 0):
														foreach ($dataCart as $data):
												?>
											    <tr>
											    	<td><?php echo $data->id; ?></td>
											    	<td><?php echo $data->nama; ?></td>
											    	<td><?php echo $data->harga_satuan; ?></td>
											    	<td><?php echo $data->jumlah; ?></td>
											    	<td><?php echo "Rp. ".$data->harga; ?></td>
											    </tr>
											    <?php
											    		endforeach;
											    	endif;
											    ?>
											    <tr>
											    	<th colspan="4">Harga total</th>
											    	<th><?php echo "Rp. ".$harga_total; ?></th>
											    </tr>
											</tbody>
										</table>
										<button type="submit" form="bayar" class="card-link btn btn-primary">Bayar</button>
										<a href="<?php echo site_url('c_pemilik/resetCart/') ?>" class="card-link btn btn-danger">Reset</a>										
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