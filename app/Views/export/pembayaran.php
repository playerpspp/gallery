<head>
	<title>Laporan Pembayaran</title>
</head>
<div style="align-items: center;" align="center">
<table border="1" width="80%" align="center">
							<thead>
								<tr>
								<th>No</th>
									<th>Pelanggan</th>
                  					<th>Pembayaran</th>
									<th>Biaya Tarif</th>
									<th>Tanggal</th>
									<th>Biaya Admin</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($pembayaran as $bayar) { ?>
									<tr>
									<th scope="row"><?= $no++ ?></th>
										<td><?= $bayar->nama ?></td>
										<td><?= $bayar->bulan .' '. $bayar->tahun ?></td>
										<td>Rp <?= number_format($bayar->biaya, 0, ',', '.') ?></td>


                    					<td> <?= $bayar->tanggal ?></td>
										<td> <?= $bayar->biayaAdmin ?></td>
                                       
									
									</tr>
								<?php } ?>
								</tbody>
							</table>
</div>
<script>
window.print();
</script>

