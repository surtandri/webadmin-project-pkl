<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Kategori</title>
	  <?php require_once APPROOT.'/views/admins/inc/template.php'; ?>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
		
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
    <body> 
		
		<section class="content">
            <div class="inner">
                <php>

            <!-- Modal -->
            <?php $i=1; foreach ($data['kategoris'] as $kategoris): ?>
            <div class="modal fade" id="editModal<?php echo $kategoris->id_kategori;?>" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Kategori</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form form method="POST" action="<?php echo URLROOT;?>/kategoris/updateKategori/<?php echo $kategoris->id_kategori; ?>" enctype="multipart/form-data">
            				<table>
                      <p>Nama Kategori</p>
            					<tr>
            						  <td required style="width:15pc;"><input type="text" class="form-control" value="<?php echo $kategoris->nama_kategori; ?>" name="nama" placeholder="Masukan Merk Barang Baru">
            							  <input type="hidden" name="id" value="<?php echo $kategoris->id_kategori; ?>">
            						  </td>
            						<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
                                </tr>
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

          <form method="POST" action="<?php echo URLROOT;?>/kategoris/tambahKategori" enctype="multipart/form-data">
		    	<table>
		    		<tr>
		    			<td style="width:15pc;"><input type="text" class="form-control" required name="kategori" placeholder="Masukan Kategori Barang Baru"></td>
		    			<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
		    		</tr>
		    	</table>
		    </form>

            <br/>

	<table id="tabel-data">     
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Tanggal Input</th>
                <th>Aksi</th>
            </tr>
        </thead>

            <tbody>
            <?php $i=1; foreach ($data['kategoris'] as $kategoris): ?>
	        	<tr>
	        		<td><?php echo $i++;?></td>
	        		<td><?php echo $kategoris->nama_kategori;?></td>
	        		<td><?php echo $kategoris->tgl_input;?></td>
	        		<td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $kategoris->id_kategori;?>">Update</button>
	        			<a href="<?php echo URLROOT; ?>/kategoris/deleteKategori/<?php echo $kategoris->id_kategori; ?>" onclick="javascript:return confirm('Hapus Data Kategori ?');"><button class="btn btn-danger">Hapus</button></a>
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
	


 