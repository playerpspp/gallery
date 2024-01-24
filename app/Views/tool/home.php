<?= view("layout/_header") ?>


<head>
</head>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                  
                    <div class="card">
                        <div class="card-title">
                            <h2>Welcome to <?= session()->get('hotel')?>, Do you want to book a room? or perharps <a href="<?= base_url('/home/login')?>">
                        Do you want to login?</a></h2>
                            
                        </div>
                        
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('/home/actindex') ?>" method="POST">

                                

                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input required type="text" id="nama" name="nama"  class="form-control" placeholder="Nama" value="<?= old('nama')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor Hp</label>
                                        <input required type="number" id="no" name="no"  class="form-control" placeholder="No" value="<?= old('no')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor NIK</label>
                                        <input required type="number" id="NIK" name="NIK"  class="form-control" placeholder="NIK" value="<?= old('NIK')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Check In</label>
                                        <input required type="date" id="in" name="in"  class="form-control" value="<?= old('in')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Check Out</label>
                                        <input required type="date" id="out" name="out"  class="form-control" value="<?= old('out')?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Type kamar</label><br>
                                          <?php foreach($types as $type) {?>
                                            <?php if ($jumlah[$type->id_type] > 0) {?>
                                                <input type="radio" name="type" value="<?= $type->id_type?>"> 
                                                <?php }else{ ?>
                                                    <input disabled type="radio" name="type" value="<?= $type->id_type?>"> 
                                                    <?php }?>
                                                <label style="font-size: 24px; color:black"><?= $type->type?>  Rp<?= $type->harga?>/hari 
                                            <?php if ($jumlah[$type->id_type] > 0) {?>
                                               <label style="color:red"> Kamar tersebut tersisa <?= $jumlah[$type->id_type] ?> </label>
                                                <?php }else{ ?>
                                                    <label style="color:red"> Maaf, Kamar tersebut sudah habis   </label>
                                                    <?php }?>
                                            </label>   
                                                <?php if(empty($type->foto)) { ?>
                                            <h5>belum ada foto</h5> <br>
                                            <?php }elseif(!empty($type->foto)){ ?>
                                                <br>
                                                <img src="<?= base_url('/assets/images/kamar/'.$type->foto) ?>" > <br>
                                                <?php }?>
                                                <label style="font-size: 18px; color:black">Deskripsi:</label><br>
                                                <label style="font-size: 18px; color:black" readonly><?= nl2br(htmlspecialchars($type->deskripsi)) ?></label> <br>
                                            <?php } ?>
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