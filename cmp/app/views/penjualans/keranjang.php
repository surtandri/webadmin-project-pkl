    <table class="table table-bordered" id="example1">
		<thead>
			<tr>
				<td> No</td>
				<td> Nama Barang</td>
				<td style="width:10%;"> Jumlah</td>
				<td style="width:20%;"> Total</td>
				<td> Kasir</td>
				<td> Aksi</td>
			</tr>
		</thead>
		<tbody>
            <?php $no=1; foreach ($data['penjualans'] as $penjualans): ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $penjualans->nama_barang;?></td>
				<td>
					<form method="POST" action="fungsi/edit/edit.php?jual=jual">
						<input type="number" name="jumlah" value="<?php echo $isi['jumlah'];?>" class="form-control">
						<input type="hidden" name="id" value="<?php echo $isi['id_penjualan'];?>" class="form-control">
						<input type="hidden" name="id_barang" value="<?php echo $isi['id_barang'];?>" class="form-control">
				</td>
				<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
				<td><?php echo $isi['nm_member'];?></td>
				<td>
						<button type="submit" class="btn btn-warning">Update</button>
					</form>
					<a href="fungsi/hapus/hapus.php?jual=jual&id=<?php echo $isi['id_penjualan'];?>&brg=<?php echo $isi['id_barang'];?>
					&jml=<?php echo $isi['jumlah']; ?>"  class="btn btn-danger"><i class="fa fa-times"></i>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>