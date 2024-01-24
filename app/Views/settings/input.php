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
                            <h4>New Hotel Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/settings/actinput') ?>" method="POST"  enctype="multipart/form-data">

                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                    <div class="form-group">
                                        <label>Nama Hotel</label>
                                        <input required type="text" id="nama" name="nama"  class="form-control" placeholder="Nama Hotel" value="<?= old('nama')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input  type="file" id="foto" name="foto"  class="form-control" >
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