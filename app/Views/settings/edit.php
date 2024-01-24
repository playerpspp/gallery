<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
</head>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <!-- <a onclick="history.back()"><button class="btn btn-primary">
                        Back
                    </button></a> -->
                    <div class="card">
                        <div class="card-title">
                            <h4>Settings</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/settings/actedit') ?>" method="POST"  enctype="multipart/form-data">
                                <input required type="hidden" id="id" name="id"  class="form-control" value="<?= $hotel->id_hotel?>">

                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                    <div class="form-group">
                                        <label>Nama Hotel</label>
                                        <input required type="text" id="nama" name="nama"  class="form-control" placeholder="Nama Hotel" value="<?= $hotel->nama_hotel?>">
                                    </div>

                                     <div class="form-group">
                                        
                                        <label>Foto</label>
                                        <?php if(empty($type->foto)) { ?>
                                            <label>belum ada foto</label>
                                            <?php }elseif(!empty($type->foto)){ ?>
                                                <br>
                                                <img src="<?= base_url('/assets/images/logo/'.$type->foto) ?>" >
                                                <br>
                                                <br>
                                                <h6>Silahkan ganti foto dengan yang baru jika diinginkan</h6>
                                                <?php }?>
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