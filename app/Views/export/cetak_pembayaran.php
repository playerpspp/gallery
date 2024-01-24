<style>
    /* CSS untuk struk pembayaran */
    .struk-pembayaran {
        width: 300px; /* Sesuaikan dengan lebar yang Anda inginkan */
        border: 2px solid #000;
        padding: 20px;
        margin: 20px auto; /* Tengah horisontal */
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .kop {
        font-weight: bold;
        font-size: 24px;
    }

    .alamat {
        font-size: 16px;
        margin-top: 10px;
    }

    .detail-pembayaran {
        text-align: left;
        margin-top: 20px;
        font-size: 18px;
    }
</style>

<div>
    <?php foreach ($pembayaran as $bayar): ?>
    <div class="struk-pembayaran">
        <p class="kop">Pasca Listrik</p>
        <p class="alamat">Batam Centre</p>
      
        <div class="detail-pembayaran">
            <p>No Pembayaran: <?php echo $bayar->idPembayaran; ?></p>
            <p>Nama Pelanggan: <?php echo $bayar->nama; ?></p>
            <p>Pembayaran: <?php echo $bayar->bulan . ' ' . $bayar->tahun; ?></p>
            <p>Tanggal: <?php echo $bayar->tanggal; ?></p>
            <p>Biaya Admin: <?php echo $bayar->biayaAdmin; ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
