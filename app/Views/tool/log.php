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
					<h4 style="margin-left: 3px;">Tabel Log Activity Hotel </h4>

				</div>

				<div class="bootstrap-data-table-panel">
                        <div class="table-responsive">

				<br>
						<table  id="row-select" class="display table table-borderd table-hover">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama User</th>
									<th>Log</th>
									<th>Date and Time</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($logs as $log) { ?>
									<tr>
										<th scope="row"><?= $no++ ?></th>

										<?php if(!empty($log->nama_user)){?>
										<td><?= $log->nama_user ?> (Guest)</td>
										<?php }elseif(!empty($log->log_user)){?>
											<td><?= $log->nama_pekerja ?> (User)</td>
										<?php } ?>

										<td><?= $log->log ?></td>
										<td><?= $log->datetime ?></td>
                                       
									
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
	</div>






	<?= view('layout/_footer') ?>