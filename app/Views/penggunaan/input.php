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
                            <h4>New Penggunaan Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/penggunaan/actinput') ?>" method="POST">
                               
                            <div class="form-group">
                              <label for="email-id-column">Pelanggan</label>
                              <select class="form-control" id="basicSelect" name="pelanggan" >
                                            <option>-</option>
                                            <?php
                                             foreach ($pelanggan as $pelangg) {
                                                 ?>
                                                 <option value ="<?= $pelangg->idPelanggan?>"><?php echo $pelangg->nama?>
                                                </option>
                                                <?php } ?>
                                            </select>
                          </div>
                         
                            <div class="form-group">
                              <label for="city-column">Bulan</label>
                              <select class="form-control" id="basicSelect"  name="bulan" >
                                <option>-</option>
                                  <option value="Januari">Januari</option>
                                     <option value="Februari">Februari</option>
                                     <option value="Maret">Maret</option>
                                     <option value="April">April</option>
                                     <option value="Mei">Mei</option>
                                     <option value="Juni">Juni</option>
                                     <option value="Juli">Juli</option>
                                     <option value="Agustus">Agustus</option>
                                     <option value="September">September</option>
                                     <option value="Oktober">Oktober</option>
                                     <option value="November">November</option>
                                     <option value="Desember">Desember</option>  
                                </select>
                          </div>
                         
                            <div class="form-group">
                              <label for="country-floating">Tahun</label>
                              <input type="text" id="tahun" class="form-control" name="tahun" placeholder="Tahun" value="<?= old('tahun') ?>"/>
                          </div>
                         
                            <div class="form-group">
                              <label for="company-column">Meter Awal</label>
                              <input type="number" id="awal" class="form-control" name="awal" placeholder="Meter Awal"  value="<?= old('awal') ?>"/>
                          </div>
                         
                            <div class="form-group">
                              <label for="email-id-column">Meter Akhir</label>
                              <input type="number" id="akhir" class="form-control" name="akhir" placeholder="Meter Akhir"  value="<?= old('akhir') ?>"/>
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