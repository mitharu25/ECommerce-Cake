<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Struk Pesanan</title>
    <style>
        /* Styling untuk struk PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .dashed-line {
            border-top: 1px dashed #999;
            margin: 20px 0;
        }
    </style>
</head>

<?php
function formatTanggal($tanggal)
{
    if (empty($tanggal) || strtotime($tanggal) === false) {
        return '-';
    }
    $bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $date = new DateTime($tanggal);
    $formattedDate = $date->format('d') . ' ' . $bulan[(int)$date->format('m') - 1] . ' ' . $date->format('Y');
    return $formattedDate;
}
?>

<body>
    <h1 align="center">WULAN COOKIES & CAKE</h1>
    <p align="center">Jalan Kembar Palem II blok Y No.03, Soreang Indah. Kab.Bandung 40921</p>
    <div class="dashed-line"></div>
    <h2>Struk Pesanan</h2>
    <table>
        <tr>
            <th>Tanggal Pemesanan</th>
            <td><?= formatTanggal($struk['tanggal']) ?></td>
        </tr>
        <tr>
            <th>Atas Nama</th>
            <td><?= $struk['nama'] ?></td>
        </tr>
        <tr>
            <th>Nomor Telephone</th>
            <td><?= $struk['phone'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $struk['alamat'] ?></td>
        </tr>
        <tr>
            <th>Produk</th>
            <td>
                <ul>
                    <?php
                    $i = 1;
                    $produkArray = explode("\n", $struk['produk']);
                    foreach ($produkArray as $produk) {
                        $produkDetail = explode(' - ', $produk);
                        if (count($produkDetail) == 3) {
                            echo "{$produkDetail[0]} ({$produkDetail[1]}) {$produkDetail[2]}<br>";
                        } else {
                            echo "Format data produk tidak sesuai: {$produk}<br>";
                        }
                    }
                    ?>
                </ul>
            </td>
        </tr>
        <tr>
            <th>Total Produk</th>
            <td><?= $struk['total_produk'] ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp <?= number_format($struk['total_harga'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td><?= $struk['metode_pembayaran'] ?></td>
        </tr>
        <tr>
            <th>Tanggal Bayar</th>
            <td><?= $struk['tanggal_bayar'] ?></td>
        </tr>
    </table>
    <div class="dashed-line"></div>
    <p>Terima Kasih telah memilih produk kue kami !</p>
    <br>
    <h3 align="center">Hubungi Kami</h3>
    <h4 align="center">0857-0895-8629</h4>
</body>

</html>