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
                            <h4>New Petugas Form</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/worker/actinput') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required type="text" id="name" name="name"  class="form-control" placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input required type="text" id="NIK"  name="NIK" class="form-control" placeholder="NIK">
                                    </div>

                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input required type="text" id="NIP"  name="NIP" class="form-control" placeholder="NIP">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Nohp</label>
                                        <input required type="text" id="nohp"  name="nohp" class="form-control" placeholder="No.HP">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input required type="date" id="tgl_lahir"  name="tgl_lahir" class="form-control" >
                                    </div> -->

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea required id="alamat"  name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required type="text" id="username"  name="username" class="form-control" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required type="password" id="password"  name="password" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" id="email"name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select required id="role" name="role" class="form-control">
                                            <option>-</option>
                                          <?php foreach($roles as $role) {
                                            if($role->level != "Pelanggan") {?>
                                                <option value="<?= $role->idLevel?>"><?= $role->level?></option>
                                            <?php } 
                                            } ?>
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