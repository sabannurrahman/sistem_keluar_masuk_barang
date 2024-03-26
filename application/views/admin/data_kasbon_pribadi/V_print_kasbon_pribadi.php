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


    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>



    <?php
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }
    ?>

    <table class="tb" border="1" cellpadding="15" width="100%">
        <tr>

            <td rowspan="2" colspan="2">

                <img style="position: absolute;" src="<?= base_url('assets/'); ?>gambar/logo.png" alt="logo" width="70px" height="100px">
                <div style="padding-left: 120px;">
                    <h2>Kasbon Pribadi</h2><br>

                    <span>Tanggal : <?= tgl_indo($tanggal); ?></span>

                </div>
            </td>
            <td width=200px style="text-align:center">Penerima</td>
        </tr>
        <tr>
            <td><br><br><br><br><br></td>
        </tr>
        <tr>
            <th width="20px">No</th>
            <th>Keterangan</th>
            <th>Jumlah</th>

        </tr>
        <?php $no = 1;
        $total = 0; ?>

        <?php foreach ($print as $pr) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pr->keterangan; ?></td>

                <td style="text-align: right;">
                    Rp.<?= number_format($pr->jumlah, 0, ',', '.'); ?>
                    <?php
                    $total = $total + $pr->jumlah; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td style="text-align: right;"> Total</td>
            <td style="text-align: right;"><?php $total; ?>
                Rp.<?= number_format($total, 0, ',', '.'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3"> Terbilang : <b> <?php $angka = $total;
                                                echo terbilang($angka) . " rupiah"; ?></b>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" style="text-align: center;padding-left:100px;padding-right:100px;margin-bottom:20px;">
                    <tr>
                        <td style="border-bottom:1px solid black;">Penerima <br><br><br><br><br><br><br></td>
                        <td style="width: 200px;"></td>
                        <td style="border-bottom:1px solid black;">disetujui <br><br><br><br><br><br><br></td>

                    </tr>
                    <br>
                </table>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>





</body>


</html>