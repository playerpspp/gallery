<!-- <div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Users</div>
                    <div class="stat-digit"><?//= count($pengguna)?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-view-grid color-primary border-primary"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Jumlah Kamar</div>
                    <div class="stat-digit"><?//= count($kamar)?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-agenda color-warning border-warning"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Pesanan yang Akan Datang</div>
                    <div class="stat-digit"><?//= count($pesanan)?></div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h3>Halo, apa yang kamu akan lakukan hari ini?</h3>
            <br>
            <div class="col-lg-12">
            <?php if(session()->get('role') == "Admin" || session()->get('role') == "Petugas") { ?>
            <a style="margin-left: 5px;" href="<?= base_url('customer/input') ?>">      <button type="button" class="btn btn-primary m-b-10 ">Tambah Pelanggan</button>   </a>          
            <a style="margin-left: 5px;" href="<?= base_url('worker/input') ?>">    <button type="button" class="btn btn-warning m-b-10 ">Tambah Petugas</button>       </a>
            <?php } ?>       
            <a style="margin-left: 5px;" href="<?= base_url('penggunaan') ?>">          <button type="button" class="btn btn-dark m-b-10 ">Melihat Penggunaan</button>      </a>
            <a style="margin-left: 5px;" href="<?= base_url('tagihan') ?>">          <button type="button" class="btn btn-danger m-b-10 ">Melihat Tagihan</button>      </a>
            <a style="margin-left: 5px;" href="<?= base_url('pembayaran/input') ?>">    <button type="button" class="btn btn-success m-b-10 ">Melakukan Pembayaran</button>    </a>        
            </div>    

        </div>
    </div>
</div>