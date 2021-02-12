    <table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
                <th>Kendaraan</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
        <?php $i=1; foreach ($data['penjualans'] as $penjualans): ?>
			<tr>
				<td><?php echo $penjualans->kode_barang;?></td>
                <td><?php echo $penjualans->nama_barang;?></td>
                <td><?php echo $penjualans->nama_merk;?></td>
                <td><?php echo $penjualans->nama_kendaraan;?></td>
                <td><?php echo $penjualans->harga_jual1;?></td>
				<td>
				<a href="<?php echo URLROOT;?>/penjualans/tambahKeranjang/<?php echo $penjualans->id_barang;?>" class="btn btn-success">
				<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php endforeach;?>
	</table>