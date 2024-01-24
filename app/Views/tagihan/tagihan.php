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
					<h4 style="margin-left: 3px;">Data Tagihan Listrik </h4>

				</div>

				<!-- <a style="margin-left: 5px;" href="<?= base_url('/tagihan/input/') ?>"><button class="btn btn-box btn-success" title="Add new"><i class="ti-plus"></i></button></a> -->
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
									<th width="125px">Jumlah Meter</th>
									<th width="125px">Biaya</th>
                                    <th width="125px">Status</th>
									<!-- <th width="125px">Action</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								
								foreach ($tagihan as $tagih) { ?>
								
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $tagih->nama?> </td>
                                        <td><?= $tagih->bulan?> </td>
                                        <td><?= $tagih->tahun?> </td>
                                        <td><?= $tagih->jumlahMeter?> </td>
                                        <td><?= $tagih->biaya ?></td>
										<td><?= $tagih->status ?></td>


										<td>
										<!-- <a href="<?= base_url('/penggunaan/detail/'. $tagih->idTagihan) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>

											<a href="<?= base_url('/penggunaan/edit/'. $tagih->idTagihan) ?>"><button class="btn btn-box btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a> -->
											<?php if(session()->get('role') == "Admin") {?>
											
											<a href="<?= base_url('/penggunaan/delete/'. $tagih->idTagihan) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>
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