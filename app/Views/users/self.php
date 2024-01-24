<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
    <title>Profile</title>
</head>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-title">
                            <h4>Ubah Profile</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/profile/actself') ?>" method="POST">

                                    <div class="form-group">
                                        <label>Name: </label>
                                        <input type="text" id="name" value="<?= $user->nama ?>" name="name" class="form-control" placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <label>NIK: </label>
                                        <input type="text" id="NIK" value="<?= $user->NIK ?>" name="NIK" class="form-control" placeholder="NIK">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>No HP: </label>
                                        <input type="text" id="nohp" value="<?= $user->NoHp ?>" name="nohp" class="form-control" placeholder="No. Hp">
                                    </div> -->

                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form><br>
                                <h5><a href="/profile/">Mau ganti Username dan Email?</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?= view('layout/_footer') ?>