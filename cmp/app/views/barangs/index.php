<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Distributor</title>
  	<?php require_once APPROOT.'/views/admins/inc/template.php'; ?>
		  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
		
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
    <body> 
		
    <br><br>
		<section class="content">
            <div class="inner">
            <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#tambahModal">
							<i class="fa fa-plus"></i> Insert Data</button>
						<a href="index.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a>
						<a href="<?php echo URLROOT;?>/barangs/index" style="margin-right :0.5pc;" 
							class="btn btn-success btn-md pull-right">
							<i class="fa fa-refresh"></i> Refresh Data</a>
						<div class="clearfix"></div>

            <!-- BUAT EDIT DATA -->
            <!-- Modal -->
            <?php $i=1; foreach ($data['barangs'] as $barangs): ?>
            <div class="modal fade" id="editModal<?php echo $barangs->id_barang;?>" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Barang</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form form method="POST" action="<?php echo URLROOT;?>/barangs/updateBarang/<?php echo $barangs->id_barang; ?>" enctype="multipart/form-data">
            				<table class="table table-striped bordered">

                      <tr>
												<td>Kode Barang</td>
												<td><input type="text" placeholder="ex: MAXVCT" required class="form-control" name="kode" value="<?php echo $barangs->kode_barang;?>"></td>
											</tr>

                      <tr>
												<td>Merk</td>
												<td>             
												<select name="merk" class="form-control" required>
                          <option value="<?php echo $barangs->id_merk;?>"><?php echo $barangs->nama_merk;?></option>
													<option value="#">Pilih Merk</option>
													<?php $i = 1; foreach ($data['merks'] as $merks) : ?>
                            <option value="<?=$merks->id_merk?>"><?php echo $merks->nama_merk;?></option> 
                          <?php endforeach;?>
												</select>                       
												</td>
											</tr>

                      <tr>
												<td>Kategori</td>
												<td>
												<select name="kategori" class="form-control" required>
                          <option value="<?php echo $barangs->id_kategori;?>"><?php echo $barangs->nama_kategori;?></option>
													<option value="#">Pilih Kategori</option>
													<?php $i = 1; foreach ($data['kategoris'] as $kategoris) : ?>
                            <option value="<?=$kategoris->id_kategori?>"><?=$kategoris->nama_kategori?></option> 
                          <?php endforeach;?>
												</select>
												</td>
											</tr>

                      <tr>
												<td>Distributor</td>
												<td>
												<select name="distributor" class="form-control" required>
                          <option value="<?php echo $barangs->id_distributor;?>"><?php echo $barangs->nama_distributor;?></option>
													<option value="#">Pilih Distributor</option>
													<?php $i = 1; foreach ($data['distributors'] as $distributors) : ?>
                            <option value="<?=$distributors->id_distributor?>"><?=$distributors->nama_distributor?></option> 
                          <?php endforeach;?>
												</select>
												</td>
											</tr>
                      
                      <tr>
												<td>Nama Barang</td>
												<td><input type="text" placeholder="ex: VICTRA 140/70-15 TL" required class="form-control" name="nama" value="<?php echo $barangs->nama_barang;?>" ></td>
											</tr>

                      <tr>
												<td>Nama Kendaraan</td>
												<td><input type="text" placeholder="ex: Fuso" required class="form-control" name="kendaraan" value="<?php echo $barangs->nama_kendaraan;?>"></td>
											</tr>
                      
                      <tr>
												<td>Stok</td>
												<td><input type="number" placeholder="ex: 20" required class="form-control"  name="stok" value="<?php echo $barangs->stok;?>"></td>
											</tr>

                      <tr>
												<td>Satuan Barang</td>
												<td>
												<select name="satuan" class="form-control" required>
                          <option value="<?php echo $barangs->satuan_barang;?>"><?php echo $barangs->satuan_barang;?></option>
													  <option value="#">Pilih Satuan Barang</option>
                            <option value="PCS">PCS</option> 
                            <option value="SET">SET</option> 
												</select>
												</td>
											</tr>

                      <tr>
												<td>Harga Beli</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="beli" value="<?php echo $barangs->harga_beli;?>"></td>
											</tr>

                      <tr>
												<td>Harga Jual (1)</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="jual1" value="<?php echo $barangs->harga_jual1;?>"></td>
											</tr>

                      <tr>
												<td>Harga Jual (2)</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="jual2" value="<?php echo $barangs->harga_jual2;?>"></td>
											</tr>

                      <input type="hidden" name="id" value="<?php echo $barangs->id_barang; ?>">

                      <br>
                      <td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
            				</table>
            			</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
            </div>
                <?php endforeach;?>
            <br>
          
          <!-- BUAT TAMBAH DATA -->
          <!-- Modal -->
            <div class="modal fade" id="tambahModal" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert Data Barang</h4>
                  </div>
                  <div class="modal-body">


                  <form method="POST" action="<?php echo URLROOT;?>/barangs/tambahBarang" enctype="multipart/form-data">
            				<table class="table table-striped bordered">
                      
                      <tr>
												<td>Kode Barang</td>
												<td><input type="text" placeholder="ex: MAXVCT" required class="form-control"  name="kode"></td>
											</tr>

                      <tr>
												<td>Merk</td>
												<td>             
												<select name="merk" class="form-control" required>
													<option value="#">Pilih Merk</option>
													<?php $i = 1; foreach ($data['merks'] as $merks) : ?>
                            <option value="<?=$merks->id_merk?>"><?php echo $merks->nama_merk;?></option> 
                          <?php endforeach;?>
												</select>                       
												</td>
											</tr>

                      <tr>
												<td>Kategori</td>
												<td>
												<select name="kategori" class="form-control" required>
													<option value="#">Pilih Kategori</option>
													<?php $i = 1; foreach ($data['kategoris'] as $kategoris) : ?>
                            <option value="<?=$kategoris->id_kategori?>"><?=$kategoris->nama_kategori?></option> 
                          <?php endforeach;?>
												</select>
												</td>
											</tr>

                      <tr>
												<td>Distributor</td>
												<td>
												<select name="distributor" class="form-control" required>
													<option value="#">Pilih Distributor</option>
													<?php $i = 1; foreach ($data['distributors'] as $distributors) : ?>
                            <option value="<?=$distributors->id_distributor?>"><?=$distributors->nama_distributor?></option> 
                          <?php endforeach;?>
												</select>
												</td>
											</tr>
                      
                      <tr>
												<td>Nama Barang</td>
												<td><input type="text" placeholder="ex: VICTRA 140/70-15 TL" required class="form-control" name="nama"></td>
											</tr>

                      <tr>
												<td>Nama Kendaraan</td>
												<td><input type="text" placeholder="ex: Fuso" required class="form-control"  name="kendaraan"></td>
											</tr>
                      
                      <tr>
												<td>Stok</td>
												<td><input type="number" placeholder="ex: 20" required class="form-control"  name="stok"></td>
											</tr>

                      <tr>
												<td>Satuan Barang</td>
												<td>
												<select name="satuan" class="form-control" required>
													  <option value="#">Pilih Satuan Barang</option>
                            <option value="PCS">PCS</option> 
                            <option value="SET">SET</option> 
												</select>
												</td>
											</tr>

                      <tr>
												<td>Harga Beli</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="beli"></td>
											</tr>

                      <tr>
												<td>Harga Jual (1)</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="jual1"></td>
											</tr>

                      <tr>
												<td>Harga Jual(2)</td>
												<td><input type="number" placeholder="ex: 1000" required class="form-control"  name="jual2"></td>
											</tr>

                      <br>
                      <td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
    
            				</table>
            			</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br/>


            <!-- BUAT LIHAT INFO DATA -->
            <?php $i=1; foreach ($data['barangs'] as $barangs): ?>
            <div class="modal fade" id="infoModal<?php echo $barangs->id_barang;?>" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Barang</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form form method="POST" action="<?php echo URLROOT;?>/barangs/updateBarang/<?php echo $barangs->id_barang; ?>" enctype="multipart/form-data">
            				<table class="table table-striped bordered">

                      <tr>
												<td>Kode Barang</td>
												<td><input readonly type="text" placeholder="ex: MAXVCT" required class="form-control" name="kode" value="<?php echo $barangs->kode_barang;?>"></td>
											</tr>

                      <tr>
												<td>Merk</td>
												<td><input readonly type="text" placeholder="ex: Maxxis" required class="form-control" name="merk" value="<?php echo $barangs->nama_merk;?>" ></td>
											</tr>

                      <tr>
												<td>Kategori</td>
												<td><input readonly type="text" placeholder="ex: Ban Luar" required class="form-control" name="kategori" value="<?php echo $barangs->nama_kategori;?>" ></td>
											</tr>
                      
                      <tr>
												<td>Distributor</td>
												<td><input readonly type="text" placeholder="ex: PT.GAJAH" required class="form-control" name="distributor" value="<?php echo  $barangs->nama_distributor;?>" ></td>
											</tr>
                      
                      <tr>
												<td>Nama Barang</td>
												<td><input readonly type="text" placeholder="ex: VICTRA 140/70-15 TL" required class="form-control" name="nama" value="<?php echo $barangs->nama_barang;?>" ></td>
											</tr>

                      <tr>
												<td>Nama Kendaraan</td>
												<td><input readonly type="text" placeholder="ex: Fuso" required class="form-control" name="kendaraan" value="<?php echo $barangs->nama_kendaraan;?>"></td>
											</tr>
                      
                      <tr>
												<td>Stok</td>
												<td><input readonly type="number" placeholder="ex: 20" required class="form-control"  name="stok" value="<?php echo $barangs->stok;?>"></td>
											</tr>
                      
                      <tr>
												<td>Satuan Barang</td>
												<td><input readonly type="text" placeholder="ex: 1000" required class="form-control"  name="satuan" value="<?php echo $barangs->satuan_barang;?>"></td>
											</tr>

                      <tr>
												<td>Harga Beli</td>
												<td><input readonly type="number" placeholder="ex: 1000" required class="form-control"  name="beli" value="<?php echo $barangs->harga_beli;?>"></td>
											</tr>

                      <tr>
												<td>Harga Jual (1)</td>
												<td><input readonly type="number" placeholder="ex: 1000" required class="form-control"  name="jual1" value="<?php echo $barangs->harga_jual1;?>"></td>
											</tr>

                      <tr>
												<td>Harga Jual (2)</td>
												<td><input readonly type="number" placeholder="ex: 1000" required class="form-control"  name="jual2" value="<?php echo $barangs->harga_jual2;?>"></td>
											</tr>

                      <input type="hidden" name="id" value="<?php echo $barangs->id_barang; ?>">

                      <br>
                      <td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
            				</table>
            			</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
            </div>
                <?php endforeach;?>
            <br>

	<table id="tabel-data">     
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Nama</th>
                <th>Kendaraan</th>
                <th>Stok</th>
                <th>Satuan</th></th>
                <th>HB</th>
                <th>HJ1</th>
                <th>HJ2</th>
                <th>Tgl input</th>
                <th>Aksi</th>
            </tr>
        </thead>
            
            <tbody>
            <?php $i=1; foreach ($data['barangs'] as $barangs): ?>
	        	<tr>
	        		<td><?php echo $i++;?></td>
	        		<td><?php echo $barangs->kode_barang;?></td>
              <td><?php echo $barangs->nama_kategori;?></td>
              <td><?php echo $barangs->nama_merk;?></td>
              <td><?php echo $barangs->nama_barang;?></td>
              <td><?php echo $barangs->nama_kendaraan;?></td>
              <td><?php echo $barangs->stok;?></td>
              <td><?php echo $barangs->satuan_barang;?></td>
              <td>Rp. <?php echo $barangs->harga_beli;?></td>
              <td>Rp.<?php echo $barangs->harga_jual1;?></td>
              <td>Rp.<?php echo $barangs->harga_jual2;?></td>
              <td><?php echo $barangs->tgl_input;?></td>

	        		<td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $barangs->id_barang;?>">Update</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal<?php echo $barangs->id_barang;?>">Detail</button>
	        			<a href="<?php echo URLROOT; ?>/barangs/deleteBarang/<?php echo $barangs->id_barang; ?>" onclick="javascript:return confirm('Hapus Data Barang?');"><button class="btn btn-danger">Hapus</button></a>
	        		</td>
	        	</tr>
            <?php endforeach;?>
            </tbody>

        <script>
            $(document).ready(function(){
            $('#tabel-data').DataTable();
            });
        </script>

    </table>

          </p>
        </div>
      </section>
    </body>
</html>
	


 