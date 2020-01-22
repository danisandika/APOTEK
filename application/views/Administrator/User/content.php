<html>
    <head>
        <title>Selamat Datang di Apotek Mustika Farma</title>
    </head>
    <body>
        <h1>Terima kasih sudah bergabung dengan kami!</h1>
        <h3>Ini Username dan Password anda, Silahkan Konfirmasi Pendaftaran dengan klik tautan dibawah.</h3>
        <table cellspacing="0" style="border: 2px dashed #007BFF; width: 100%;">
            <tr style="background-color: #FFFFFF;">
                <th align="left">Username:</th><td><?php echo $isiUsername; // Tampilkan isi pesan ?></td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th align="left">Password:</th><td><?php echo $isiPassword; // Tampilkan isi pesan ?></td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <th align="left">Role:</th><td><?php echo $isiRole; // Tampilkan isi pesan ?></td>
            </tr>
        </table>
        <h3>
          <a href="http://localhost:8080/APOTEK/CUser/Konfirmasi_user/<?php echo $isiUsername ?>">Konfirmasi Pendaftaran</a>
        </h3>
        <br>
        <h4><?php echo $pesan; // Tampilkan isi pesan ?></h4>

    </body>
</html>
