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
                                <form action="<?= base_url('/profile/actprofile') ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                        <label>Photo Profile:</label>
                                        <input type="file" id="foto" name="foto" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Username: </label>
                                        <input type="text" id="username" value="<?= $user->username ?>" name="username" class="form-control" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <label>Email: </label>
                                        <input type="email" id="email" value="<?= $user->email ?>" name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form><br>
                                <h5><a href="/profile/self">Mau mengubah data diri?</a></h5>
                                <h5><a href="/profile/password">Mau ganti password?</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?= view('layout/_footer') ?>