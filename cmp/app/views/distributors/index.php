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
		
		<section class="content">
            <div class="inner">

            <!-- BUAT EDIT DATA -->
            <!-- Modal -->
            <?php $i=1; foreach ($data['distributors'] as $distributors): ?>
            <div class="modal fade" id="editModal<?php echo $distributors->id_distributor;?>" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Distributor</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form form method="POST" action="<?php echo URLROOT;?>/distributors/updateDistributor/<?php echo $distributors->id_distributor; ?>" enctype="multipart/form-data">
            				<table>
                    <div class="form-group">
                        <label for="nama">Nama distributor</label>
                        <input required type="text" class="form-control" name="nama" id="nama" value="<?php echo $distributors->nama_distributor;?>">
                      </div>

                      <div class="form-group">
                        <label for="sales">Sales Distributor</label>
                        <input required type="text" class="form-control" name="sales" id="sales" value="<?php echo $distributors->sales; ?>">
                      </div>

                      <div class="form-group">
                        <label for="hp">No Hp</label>
                        <input required type="number" min="0" class="form-control" name="hp" id="hp" value="<?php echo $distributors->hp; ?>">
                      </div>

                      <div class="form-group">
		                    <label>Alamat</label>   
                        <textarea required type="textarea" class="form-control" name="alamat" id="alamat" rows="3" cols="60"><?php echo $distributors->alamat_distributor; ?></textarea>
                        <small  mall class="form-text text-muted"></small> 
                    </div>    

                    <input type="hidden" name="id" value="<?php echo $distributors->id_distributor; ?>">

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
          
		    	<table>
		    		<tr>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Insert Data</button>
		    		</tr>      
		    	</table>
          

          <!-- BUAT TAMBAH DATA -->
          <!-- Modal -->
            <div class="modal fade" id="tambahModal" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert Data Distributor</h4>
                  </div>
                  <div class="modal-body">
                    
                  <form method="POST" action="<?php echo URLROOT;?>/distributors/tambahDistributor" enctype="multipart/form-data">
            				<table>
                      <div class="form-group">
                        <label for="nama">Nama distributor</label>
                        <input required type="text" class="form-control" name="nama" id="nama" value="">
                      </div>

                      <div class="form-group">
                        <label for="sales">Sales Distributor</label>
                        <input required type="text" class="form-control" name="sales" id="sales" value="">
                      </div>

                      <div class="form-group">
                        <label for="hp">No Hp</label>
                        <input required type="number" min="0" class="form-control" name="hp" id="hp" value="">
                      </div>

                      <div class="form-group">
		                    <label>Alamat</label>
			                  <textarea required type="textarea" class="form-control" name="alamat" id="alamat" value="" rows="3" cols="60"></textarea>
                        <small  mall class="form-text text-muted"></small>
	                  </div>    

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
            <?php $i=1; foreach ($data['distributors'] as $distributors): ?>
            <div class="modal fade" id="infoModal<?php echo $distributors->id_distributor;?>" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Distributor</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form method="POST" action="<?php echo URLROOT;?>/distributors/updateDistributor/<?php echo $distributors->id_distributor; ?>" enctype="multipart/form-data">
            				<table>
                    <div class="form-group">
                        <label for="nama">Nama distributor</label>
                        <input readonly required type="text" class="form-control" name="nama" id="nama" value="<?php echo $distributors->nama_distributor;?>">
                      </div>

                      <div class="form-group">
                        <label for="sales">Sales Distributor</label>
                        <input readonly required type="text" class="form-control" name="sales" id="sales" value="<?php echo $distributors->sales; ?>">
                      </div>

                      <div class="form-group">
                        <label for="hp">No Hp</label>
                        <input readonly required type="number" min="0" class="form-control" name="hp" id="hp" value="<?php echo $distributors->hp; ?>">
                      </div>

                      <div class="form-group">
		                    <label>Alamat</label>   
                        <textarea readonly required type="textarea" class="form-control" name="alamat" id="alamat" rows="3" cols="60"><?php echo $distributors->alamat_distributor; ?></textarea>
                        <small  mall class="form-text text-muted"></small> 
                    </div>    

                    <input type="hidden" name="id" value="<?php echo $distributors->id_distributor; ?>">

                      <br>
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
                <th>Nama Distributor</th>
                <th>Tanggal Input</th>
                <th>Aksi</th>
            </tr>
        </thead>

            <tbody>
            <?php $i=1; foreach ($data['distributors'] as $distributors): ?>
	        	<tr>
	        		<td><?php echo $i++;?></td>
	        		<td><?php echo $distributors->nama_distributor;?></td>
              <td><?php echo $distributors->tgl_input;?></td>
	        		<td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $distributors->id_distributor;?>">Update</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal<?php echo $distributors->id_distributor;?>">Detail</button>
	        			<a href="<?php echo URLROOT; ?>/distributors/deleteDistributor/<?php echo $distributors->id_distributor; ?>" onclick="javascript:return confirm('Hapus Data Distributor?');"><button class="btn btn-danger">Hapus</button></a>
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
	


 