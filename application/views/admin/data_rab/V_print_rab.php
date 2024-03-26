<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .tb {
        border-collapse: collapse;
    }
</style>

<body>
    <table width="100%">
        <tr>
            <?php foreach ($print2 as $pr) : ?>
                <td></td>
                <td style="padding-left: 30px;padding-right: 50px;">
                    <table width="100%" style="border: 1px solid black; padding:5px;">
                        <tr>
                            <td>Purchase Order</td>
                            <td style="padding-right: 200px;">: <?= $pr->no_po; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal PO</td>
                            <td>: <?= $pr->tanggal_po; ?></td>
                        </tr>
                    </table>
                </td>

                <td style="padding-right: 200px;"></td>


        </tr>
        <tr>
            <td style="padding-right: 20px;">
                <span><?= $pr->nama_perusahaan; ?></span>
                <br>
                <span>Alamat:<?= $pr->alamat_perusahaan; ?></span>
                <br>
                <br>
                <span>Tagihan dan Faktur Pajak dibuat atas nama :</span>
                <br>
                <span><?= $pr->nama_perusahaan; ?></span>
                <br>
                <br>
                <table>
                    <tr>
                        <td style="padding-right: 15px;">Alamat </td>

                        <td><br>
                            <?= $pr->alamat_perusahaan; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Catatan </td>
                        <td><br><br>Harap cantumkan Nomor PO dalam setiap tagihan/ Invoice dan Delivery Order / Surat Jalan</td>
                    </tr>
                </table>
            </td>
            <td style="padding-left: 30px;padding-right: 10px;">
                <p>Kepada :</p>
                <table class="tb" width="100%" border="1" cellpadding="">
                    <tr>
                        <td style="padding-right: 20px;">Nama&nbsp;Perusahaan
                            <br> Alamat
                            <br><br><br><br><br><br><br> Telepon
                            <br> Email
                        </td>
                        <td> <br>CV Setia Megah Resindo <br>
                            Jl. Guru Bongol, Mekar Permai, Karang Anyar Pegasangan Timur, Mataram
                            <br><br><br><br><br><br> +62819-1719-2999
                            <br><a href="">setiamegahrasindo@gmail.com</a><br><br>
                        </td>
                    </tr>

                </table>
                <p>Dikirim ke</p>
                <p><?= $pr->nama_perusahaan; ?></p>
                <p>Alamat: <?= $pr->alamat_perusahaan; ?></p>
                <p>Telepon: <?= $pr->no_hp_perusahaan; ?></p>
            </td>
            <td>
                <table width="100%" style="border: 1px solid black;font-size:15px;">
                    <tr>
                        <td>Buyer</td>
                        <td>: <?= $pr->nama_buyer; ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>: <?= $pr->no_hp_buyer; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $pr->email_buyer; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    <table class="tb" border="1" cellpadding="10" width="100%">
        <tr>
            <th>No</th>
            <th>URAIAN</th>
            <th>VOLUME</th>
            <th>SATUAN</th>
            <th>PERIODE</th>
            <th>HARGA SATUAN</th>
            <th>HARGA TOTAL</th>
            <th>TANGGAL KEBUTUHAN</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($barang as $brg) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><b><?= $brg->nama_barang; ?></b></td>
                <td><?= $brg->jumlah_rab_brg; ?></td>
                <td><?= $brg->satuan; ?></td>
                <td><?= $brg->harga_sewa; ?></td>
                <td style="text-align: right;">Rp.<?= number_format($brg->harga_sewa, 0, ',', '.'); ?></td>
                <td style="text-align: right;"><?php $total = $brg->jumlah_rab_brg * $brg->harga_sewa; ?>
                    Rp.<?= number_format($total, 0, ',', '.'); ?>
                </td>
                <td><?= $brg->harga_sewa; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>

</body>


</html>