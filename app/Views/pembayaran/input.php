<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
</head>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <a onclick="history.back()"><button class="btn btn-primary">
                        Back
                    </button></a>
                    <div class="card">
                        <div class="card-title">
                            <h4>New pembayaran Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/pembayaran/actinput') ?>" method="POST">


                                    <div class="form-group">
                                      <label for="email-id-column">Pelanggan</label>
                                        <select class="form-control" id="pelanggan" name="pelanggan" >
                                            <option>-PILIH-</option>
                                            <?php
                                             foreach ($pelanggan as $pelangg) {
                                                 ?>
                                                 <option value ="<?= $pelangg->idPelanggan?>"><?php echo $pelangg->nama?>
                                                </option>
                                                <?php } ?>
                                            </select>
                            </div>
                          

                                   <div class="form-group">
                                      <label for="email-id-column">Tagihan</label>
                                      <select class="form-control"id="tagihan" name="tagihan">
                                          <option>-PILIH- </option>
                                          <?php
                                          foreach ($tagihan as $tagih) {
                                              ?>
                                              <option value="<?= $tagih->idTagihan ?>"><?= $bulanTahun = $tagih->bulan . ' ' . $tagih->tahun ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>

                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<?= view('layout/_footer') ?>