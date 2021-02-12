<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manajemen Penjualan</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
		
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <body>
        <?php require_once APPROOT.'/views/admins/inc/template.php'; ?>

        <section class="content">
        <div class="inner">
          <p>
          <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Keranjang Penjualan</h3>
						<br>
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-search"></i> Cari Barang</h4>
								</div>
								<div class="panel-body">
									<input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
								</div>
							</div>
						</div>

						<script>
							$(document).ready(function(){
							  $("#cari").change(function(){
							    $.ajax({
									type: "POST",
									url: "<?php echo URLROOT;?>/penjualans/cariBarangPenjualan",
									data:'keyword='+$(this).val(),
									beforeSend: function(){
										$("#hasil_cari").hide();
										$("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
									},
									success: function(html){
										$("#tunggu").html('');
										$("#hasil_cari").show();
										$("#hasil_cari").html(html);
									}
								});
							  });
							});
						</script>

						<div class="col-sm-8">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
								</div>
								<div class="panel-body">
									<div id="hasil_cari"></div>
									<div id="tunggu"></div>
								</div>
							</div>
						</div>
						
						
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-shopping-cart"></i> KASIR
									<a class="btn btn-danger pull-right" style="margin-top:-0.5pc;" href="<?php echo URLROOT;?>/penjualans/hapusKeranjang">
										<b>RESET KERANJANG</b></a>
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered">
											<tr>
												<td><b>Tanggal</b></td>

													<?php date_default_timezone_set('Asia/Kuala_Lumpur');?>

												<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
											</tr>
										</table>
										
									<br/>
									<?php $hasil = $lihat -> jumlah(); ?>
									<div id="kasirnya">
										<table class="table table-stripped">
											<!-- <?php
											// proses bayar dan ke nota
											if(!empty($_GET['nota'] == 'yes')) {
												$total = $_POST['total'];
												$bayar = $_POST['bayar'];
												if(!empty($bayar))
												{
													$hitung = $bayar - $total;
													if($bayar >= $total)
													{
														$id_barang = $_POST['id_barang'];
														$id_member = $_POST['id_member'];
														$jumlah = $_POST['jumlah'];
														$total = $_POST['total1'];
														$tgl_input = $_POST['tgl_input'];
														$periode = $_POST['periode'];
														$jumlah_dipilih = count($id_barang);
														
														for($x=0;$x<$jumlah_dipilih;$x++){

															$d = array($id_barang[$x],$id_member[$x],$jumlah[$x],$total[$x],$tgl_input[$x],$periode[$x]);
															$sql = "INSERT INTO nota (id_barang,id_member,jumlah,total,tanggal_input,periode) VALUES(?,?,?,?,?,?)";
															$row = $config->prepare($sql);
															$row->execute($d);

															// ubah stok barang
															$sql_barang = "SELECT * FROM barang WHERE id_barang = ?";
															$row_barang = $config->prepare($sql_barang);
															$row_barang->execute(array($id_barang[$x]));
															$hsl = $row_barang->fetch();
															
															$stok = $hsl['stok'];
															$idb  = $hsl['id_barang'];

															$total_stok = $stok - $jumlah[$x];
															echo $total_stok;
															$sql_stok = "UPDATE barang SET stok = ? WHERE id_barang = ?";
															$row_stok = $config->prepare($sql_stok);
															$row_stok->execute(array($total_stok, $idb));
															
														}
														echo '<script>alert("Belanjaan Berhasil Di Bayar !");</script>';
													}else{
														echo '<script>alert("Uang Kurang ! Rp.'.$hitung.'");</script>';
													}
												}
											}
											?> -->
											<form method="POST" action="index.php?page=jual&nota=yes#kasirnya">
											
												<?php foreach($hasil_penjualan as $isi){;?>
													<input type="hidden" name="id_barang[]" value="<?php echo $isi['id_barang'];?>">
													<input type="hidden" name="id_member[]" value="<?php echo $isi['id_member'];?>">
													<input type="hidden" name="jumlah[]" value="<?php echo $isi['jumlah'];?>">
													<input type="hidden" name="total1[]" value="<?php echo $isi['total'];?>">
													<input type="hidden" name="tgl_input[]" value="<?php echo $isi['tanggal_input'];?>">
													<input type="hidden" name="periode[]" value="<?php echo date('m-Y');?>">
												<?php $no++; }?>
												<tr>
													<td>Total Semua  </td>
													<td><input type="text" class="form-control" name="total" value="<?php echo $total_bayar;?>"></td>
												
													<td>Bayar  </td>
													<td><input type="text" class="form-control" name="bayar" value="<?php echo $bayar;?>"></td>
													<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
													<?php  if(!empty($_GET['nota'] == 'yes')) {?>
													 <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
														<b>RESET</b></a></td><?php }?></td>
												</tr>
											</form>
											<tr>
												<td>Kembali</td>
												<td><input type="text" class="form-control" value="<?php echo $hitung;?>"></td>
												<td></td>
												<td>
													<a href="print.php?nm_member=<?php echo $_SESSION['admin']['nm_member'];?>
													&bayar=<?php echo $bayar;?>&kembali=<?php echo $hitung;?>" target="_blank">
													<button class="btn btn-default">
														<i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
													</button></a>
												</td>

											</tr>
										</table>
										<br/>
										<br/>
									</div>
								</div>
							</div>
						</div>
				  </div>
              </div>
			  
          </section>
		  
      </section>
	
          </p>
        </div>
      </section>
    </body>
</html>




