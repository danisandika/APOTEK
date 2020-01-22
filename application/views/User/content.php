<html>
    <head>
        <title>Selamat Datang di Apotek Mustika Farma</title>
    </head>
    <body>
        <h1>Terima kasih sudah bergabung dengan kami!</h1>
        <h3>Ini Username dan Password anda</h3>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
            <tr>
                <th>Username:</th><td><?php echo $isiUsername; // Tampilkan isi pesan ?></td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Password:</th><td><?php echo $isiPassword; // Tampilkan isi pesan ?></td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Role:</th><td><?php echo $isiRole; // Tampilkan isi pesan ?></td>
            </tr>
            <tr>
                <th>Website:</th><td><a href="http://localhost:8080/APOTEK/CDashboard">Apotek Mustika Farma</a></td>
            </tr>
        </table>
        <h3><?php echo $pesan; // Tampilkan isi pesan ?></h3>
    </body>
</html>
