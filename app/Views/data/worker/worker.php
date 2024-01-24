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
					<h4 style="margin-left: 3px;">Tabel Petugas Listrik </h4>

				</div>

				<a style="margin-left: 5px;" href="<?= base_url('/worker/input/') ?>"><button class="btn btn-box btn-success" title="Add new"><i class="ti-plus"></i></button></a>
				<br>

				<div class="card-body">
					<div class="table-responsive">
						<table id="row-select" class="display table table-borderd table-hover ">
							<thead>
								<tr>
									<th width="10px">No</th>
									<th width="150px">Name</th>
									<th width="150px">Email</th>
                                    <th width="10px">Username</th>
									<th width="10px">Level</th>
									<th width="125px">NIK</th>
                                    <th width="125px">NIP</th>
									<!-- <th width="10px">No. Hp</th>
                                    <th width="10px">Tgl Lahir</th> -->
                                    <th width="150px">Alamat</th>
									<th width="275px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($workers as $worker) { ?>
								
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $worker->nama ?></td>
										<td><?= $worker->email ?></td>
                                        <td><?= $worker->username ?></td>
										<td><?= $worker->level ?></td>
										<td><?= $worker->NIK ?></td>
                                        <td><?= $worker->NIP ?></td>
										<!-- <td><?= $worker->NoHp ?></td>
                                        <td><?= $worker->tanggal_lahir ?></td> -->
                                        <td><?= $worker->alamat ?></td>
										<td>
										<!-- <a href="<?= base_url('/worker/detail/'. $worker->idUser) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a> -->
										<?php if(session()->get('role') == "Admin") {?>
											<a href="<?= base_url('/worker/edit/'. $worker->idUser) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>

											<a href="<?= base_url('/worker/delete/'. $worker->idUser) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>

											<a href="<?= base_url('/worker/reset/'. $worker->idUser) ?>"><button class="btn btn-box btn-primary" title="Reset Password"><i class="ti-key"></i> Reset Password</button></a>
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