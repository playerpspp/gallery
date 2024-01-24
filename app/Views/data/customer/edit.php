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
                                <form action="<?= base_url('/customer/actedit') ?>" method="POST">

                                        <input required type="hidden" id="id" name="id"  class="form-control"  value="<?= $pelanggan->idUser ?>">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required type="text" id="name" name="name"  class="form-control" placeholder="Name" value="<?= $pelanggan->nama ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input required type="text" id="NIK"  name="NIK" class="form-control" placeholder="NIK" value="<?= $pelanggan->NIK ?>">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>NIP</label>
                                        <input required type="text" id="NIP"  name="NIP" class="form-control" placeholder="NIP" value="<?= $pelanggan->NIP ?>">
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input required type="date" id="tgl_lahir"  name="tgl_lahir" class="form-control" value="<?= $pelanggan->tanggal_lahir ?>" >
                                    </div> -->

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea required id="alamat"  name="alamat" class="form-control" placeholder="Alamat"><?= $pelanggan->alamat ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required type="text" id="username"  name="username" class="form-control" placeholder="Username" value="<?= $pelanggan->username ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input readonly type="email" id="email"name="email" class="form-control" placeholder="Email" value="<?= $pelanggan->email ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Tarif</label>
                                        <select required id="tarif" name="tarif" class="form-control">
                                            <option value="<?= $pelanggan->tarifID?>">-</option>
                                          <?php foreach($tarif as $tar) { ?>
                                                <option value="<?= $tar->idTarif?>"><?= $tar->kodeTarif?></option>
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