<?= view("layout/_header") ?>

<?= view('layout/_nav') ?>

<head>
    <title>Ganti Password</title>

    
</head>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-title">
                            <h4>Ubah Password</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/profile/actpassword') ?>" method="POST">
                                    <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="row">
                                    <div class="col-md-10"> <!-- Adjust the column width as needed -->
                                            <input name="password_old" type="password" class="form-control" id="passwordInputOld" placeholder="Password">
                                        </div>
                                        <div class="col-md-2"> <!-- Adjust the column width as needed -->
                                            <button type="button" class="btn btn-primary" id="togglePasswordOld"><i class="ti-eye"></i></button>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="row">
                                    <div class="col-md-10"> <!-- Adjust the column width as needed -->
                                            <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">
                                        </div>
                                        <div class="col-md-2"> <!-- Adjust the column width as needed -->
                                            <button type="button" class="btn btn-primary" id="togglePassword"><i class="ti-eye"></i></button>
                                        </div>
                                    </div>

                                </div>

                                

                                <div class="form-group">
                                    <label>Password confirm</label>
                                    <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="Password Confirm">
                                </div>

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

<script>
    const passwordInput = document.getElementById('passwordInput');
    const toggleButton = document.getElementById('togglePassword');

    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            // toggleButton.textContent = 'Hide Password';
        } else {
            passwordInput.type = 'password';
            // toggleButton.textContent = 'Show Password';
        }
    });

    const passwordInputOld = document.getElementById('passwordInputOld');
    const toggleButtonOld = document.getElementById('togglePasswordOld');

    toggleButtonOld.addEventListener('click', function() {
        if (passwordInputOld.type === 'password') {
            passwordInputOld.type = 'text';
            // toggleButton.textContent = 'Hide Password';
        } else {
            passwordInputOld.type = 'password';
            // toggleButton.textContent = 'Show Password';
        }
    });
</script>
 
<?= view('layout/_footer') ?>