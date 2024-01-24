<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
	<link href="/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
	<link href="/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
</head>

<div class="row">
	<div class="col-md-12">
                    <!-- <a onclick="history.back()"><button class="btn btn-primary">
                        Back
                    </button></a> -->
			<div class="card">
			<div class="card-body">


							<div class="card-title">
					<h4 style="margin-left: 3px;">Tabel Pembayaran Listrik  </h4>

				</div>

					<div class="table-responsive">

					<a style="margin-left: 5px;" href="<?= base_url('/pembayaran/input/') ?>"><button class="btn btn-box btn-success" title="Add new"><i class="ti-plus"></i></button></a>
				<br>
						<table id="row-select" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th width="200px">Pelanggan</th>
                  <th width="175px">Pembayaran</th>
									<th width="175px">Tanggal</th>
									<th width="175px">Biaya Admin</th>
									<th width="220px">Action</th>
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
                    <td>Rp <?= $bayar->tanggal ?></td>
										<td>Rp <?= $bayar->biayaAdmin ?></td>
											
										<td>
                    <a href="<?=base_url('/Pembayaran/cetak/'.$bayar->idPembayaran)?>"><button class="btn btn-warning">Cetak Bukti</button></a>

                    <?php if(session()->get('role') == "Admin") {?>
											<a href="<?= base_url('/pembayaran/edit/'. $bayar->idPembayaran) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>
											
											<a href="<?= base_url('/pembayaran/delete/'. $bayar->idPembayaran) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>






	<?= view('layout/_footer') ?>