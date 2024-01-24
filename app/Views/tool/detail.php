<?= view("layout/_header") ?>


<head>
	<link href="/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
	<link href="/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
</head>
<style type="css">
th{
color: #000;
font-size: 16px;
	}
</style>

<div class="row">
	<div class="col-md-12">
    <a onclick="history.back()"><button class="btn btn-primary">
                        Back
                    </button></a>
			<div class="card">
			<div class="card-body">


							<div class="card-title">
					<h4 style="margin-left: 3px;">Detail Booking Tanggal <?= $booking->tgl_dipesan ?> oleh  <?= $booking->nama_pesan ?></label></h4>

				</div>

					<table class="table">
    
                    <tr> <th>Type Kamar     </th>  <th>:</th>  <th><?= $booking->type ?>				   </th>    </tr>
					<tr> <th>Harga Booking  </th>  <th>:</th>  <th><?= $booking->harga_pesanan ?>		   </th>    </tr>
                    <tr> <th>Nama pemesan   </th>  <th>:</th>  <th><?= $booking->nama_pesan ?>             </th>    </tr>
                    <tr> <th>Nomor pemesan  </th>  <th>:</th>  <th><?= $booking->nohp_pesan ?>             </th>    </tr>
                    <tr> <th>NIK pemesan    </th>  <th>:</th>  <th><?= $booking->NIK_pesan ?>              </th>    </tr>
                    <tr> <th>Tanggal pesanan</th>  <th>:</th>  <th><?= $booking->tgl_dipesan ?>            </th>    </tr>
                    <tr> <th>Tanggal mulai  </th>  <th>:</th>  <th><?= $booking->tgl_dimulai ?>            </th>    </tr>
                    <tr> <th>Tanggal selesai</th>  <th>:</th>  <th><?= $booking->tgl_berakhir ?>           </th>    </tr>
                    </table>
                    <h4>Do you want to cancel your book?</h4>
                    <a href="<?= base_url('/home/delete/'. $booking->id_pesanan) ?>"><button class="btn btn-box btn-danger" title="Delete"><i class="ti-trash"></i></button></a>

					</div>
				</div>

			</div>
		</div>
	</div>






	<?= view('layout/_footer') ?>