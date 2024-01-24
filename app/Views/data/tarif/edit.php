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
                            <h4>Edit Tarif Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/tarif/actedit') ?>" method="POST"  enctype="multipart/form-data">
                                <input required type="hidden" id="id" name="id"  class="form-control" value="<?= $tarif->id_type?>">

                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                        <label>Kode Tarif</label>
                                        <input required type="text" id="kodeTarif" name="kodeTarif"  class="form-control" placeholder="Kode Tarif"value="<?= $tarif->kodeTarif?>">
                                    </div>

                                    <div class="form-group">
                                        <label>daya</label>
                                        <input required type="number" id="daya" name="daya"  class="form-control" placeholder="Daya Listrik"  value="<?= $tarif->daya?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Tarif Per Kwh</label>
                                        <input required type="number" id="tarif" name="tarif"  class="form-control" placeholder="Tarif Per Kwh" value="<?= $tarif->tarifPerKwh?>">
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