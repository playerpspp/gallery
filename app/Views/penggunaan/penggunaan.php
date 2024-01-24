<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
	<link href="/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
	<link href="/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
</head>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<div class="card-title">
					<h4 style="margin-left: 3px;">Data Penggunaan Listrik </h4>

				</div>

				<a style="margin-left: 5px;" href="<?= base_url('/penggunaan/input/') ?>"><button class="btn btn-box btn-success" title="Add new"><i class="ti-plus"></i></button></a>
				<br>

				<div class="card-body">
					<div class="table-responsive">
						<table id="row-select" class="display table table-borderd table-hover ">
							<thead>
								<tr>
									<th>No</th>
									<th width="125px">Pelanggan</th>
									<th width="125px">Bulan</th>
									<th width="125px">Tahun</th>
									<th width="125px">Meter Awal</th>
									<th width="125px">Meter Akhir</th>
                                    <th width="125px">Alamat</th>
									<th width="125px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($penggunaan as $pengguna) { ?>
								
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $pengguna->nama?> </td>
                                        <td><?= $pengguna->bulan?> </td>
                                        <td><?= $pengguna->tahun?> </td>
                                        <td><?= $pengguna->meterAwal?> </td>
                                        <td><?= $pengguna->meterAkhir?> </td>
                                        <td><?= $pengguna->alamat ?></td>

										<td>
										<!-- <a href="<?= base_url('/penggunaan/detail/'. $pengguna->idPenggunaan) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a> -->
										<?php if(session()->get('role') != "Pelanggan" ) { ?>
											<a href="<?= base_url('/penggunaan/edit/'. $pengguna->idPenggunaan) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>

											<a href="<?= base_url('/penggunaan/delete/'. $pengguna->idPenggunaan) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>
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