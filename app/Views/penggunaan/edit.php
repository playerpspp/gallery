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
                            <h4>Edit Pelanggan Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/penggunaan/actedit') ?>" method="POST">

                                        <input required type="hidden" id="id" name="id"  class="form-control"  value="<?= $penggunaan->pelangganID ?>">

                                        <div class="form-group">
                              <label for="email-id-column">Pelanggan</label>
                              <select class="form-control" id="basicSelect" name="pelanggan" >
                                            <option>-</option>
                                            <?php
                                                foreach ($pelanggan as $pelanggan) {
                                                    
                                                    $selected = ($penggunaan->pelanggan == $pelanggan->id_pelanggan) ? "selected" : "";
                                                    ?>
                                                    <option value="<?= $pelanggan->id_pelanggan ?>" <?= $selected ?>>
                                                        <?php echo $pelanggan->nama?>
                                                    </option>
                                                <?php } ?>
                                            </select>tahun
                          </div>
                         
                            <div class="form-group">
                              <label for="city-column">Bulan</label>
                              <select class="form-control" id="basicSelect"  name="bulan" >
                                        <option value="Januari"         <?php echo ($penggunaan->bulan === 'Januari') ? 'selected' : ''; ?>>Januari</option>
                                        <option value="Februari"        <?php echo ($penggunaan->bulan === 'Februari') ? 'selected' : ''; ?>>Februari</option>
                                        <option value="Maret"           <?php echo ($penggunaan->bulan === 'Maret') ? 'selected' : ''; ?>>Maret</option>
                                        <option value="April"           <?php echo ($penggunaan->bulan === 'April') ? 'selected' : ''; ?>>April</option>
                                        <option value="Mei"             <?php echo ($penggunaan->bulan === 'Mei') ? 'selected' : ''; ?>>Mei</option>
                                        <option value="Juni"            <?php echo ($penggunaan->bulan === 'Juni') ? 'selected' : ''; ?>>Juni</option>
                                        <option value="Juli"            <?php echo ($penggunaan->bulan === 'Juli') ? 'selected' : ''; ?>>Juli</option>
                                        <option value="Agustus"         <?php echo ($penggunaan->bulan === 'Agustus') ? 'selected' : ''; ?>>Agustus</option>
                                        <option value="September"       <?php echo ($penggunaan->bulan === 'September') ? 'selected' : ''; ?>>September</option>
                                        <option value="Oktober"         <?php echo ($penggunaan->bulan === 'Oktober') ? 'selected' : ''; ?>>Oktober</option>
                                        <option value="November"        <?php echo ($penggunaan->bulan === 'November') ? 'selected' : ''; ?>>November</option>
                                        <option value="Desember"        <?php echo ($penggunaan->bulan === 'Desember') ? 'selected' : ''; ?>>Desember</option>
                                </select>
                          </div>
                         
                            <div class="form-group">
                              <label for="country-floating">Tahun</label>
                              <input type="text" id="tahun" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $penggunaan->tahun?>"
                              />
                          </div>
                         
                            <div class="form-group">
                              <label for="company-column">Meter Awal</label> 
                              <input type="text" id="awal" class="form-control" name="awal" placeholder="Meter Awal" value="<?php echo $penggunaan->meterAwal?>"
                              />
                          </div>
                         
                            <div class="form-group">
                              <label for="email-id-column">Meter Akhir</label>
                              <input type="text" id="akhir" class="form-control" name="akhir" placeholder="Meter Akhir" value="<?php echo $penggunaan->meterAkhir?>"
                              />
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