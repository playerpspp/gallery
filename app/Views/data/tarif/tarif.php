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
					<h4 style="margin-left: 3px;">Tabel Tipe Kamar  </h4>

				</div>

					<div class="table-responsive">

					<a style="margin-left: 5px;" href="<?= base_url('/tarif/input/') ?>"><button class="btn btn-box btn-success" title="Add new"><i class="ti-plus"></i></button></a>
				<br>
						<table id="row-select" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th width="200px">Kode Tarif</th>
                                    <th width="175px">Daya Listrik</th>
									<th width="175px">Tarif/Kwh</th>
									<th width="175px">Jumlah Pemakai</th>
									<th width="150px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($tarif as $tar) { ?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $tar->kodeTarif ?></td>
										<td><?= $tar->daya ?> AV</td>
										<td>Rp <?= $tar->tarifPerKwh ?></td>

										<?php if( empty($pelanggan[$tar->idTarif]->jumlah) ) { ?>
										<td>0</td>
										<?php }else{ ?>
											<td><?= $pelanggan[$tar->idTarif]->jumlah ?></td>
											<?php }?>
										<td>
										<?php if(session()->get('role') == "Admin") {?>
											<a href="<?= base_url('/tarif/edit/'. $tar->idTarif) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>
											
											<a href="<?= base_url('/tarif/delete/'. $tar->idTarif) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>
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