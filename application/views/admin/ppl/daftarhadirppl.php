<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Daftar Hadir PPL <?= $ppl['nama']; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h2 {
            margin: 0;
        }

        h4 {
            margin: 0;
        }

        h3 {
            margin-bottom: 0;
        }

        #peserta {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #peserta td,
        #peserta th {
            border: 1px solid #ddd;
            padding-right: 8px;
            padding-left: 8px;
            padding-top: 18px;
            padding-bottom: 18px;
        }

        #peserta tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #peserta tr:hover {
            background-color: #ddd;
        }

        #peserta th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Daftar Hadir PPL <?= $ppl['nama']; ?></h2>
    <h4>Tanggal: <?= date('d F Y', strtotime($ppl["tanggal_ppl"])); ?></h4>

    <h3>Anggota</h3>
    <table id="peserta">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Ttd</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesertapplanggota as $pa) : ?>
                <tr>
                    <td style="width: 80px;">
                        <?= $pa['id_pendaftar'] ?>
                    </td>
                    <td style="width: 450px;">
                        <?= $pa['nama'] ?>
                    </td>
                    <td>
                    </td>
                </tr>
            <?php endforeach ?>
    </table>

    <hr>

    <h3>Member</h3>
    <table id="peserta">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Ttd</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesertapplmember as $pa) : ?>
                <tr>
                    <td style="width: 80px;">
                        <?= $pa['id_pendaftar'] ?>
                    </td>
                    <td style="width: 450px;">
                        <?= $pa['nama'] ?>
                    </td>
                    <td>
                    </td>
                </tr>
            <?php endforeach ?>
    </table>



</body>

</html>