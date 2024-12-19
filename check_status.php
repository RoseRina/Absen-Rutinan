<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check_whatsapp'])) {
    $check_whatsapp = htmlspecialchars($_POST['check_whatsapp']);
    $filename = 'absensi.txt';

    if (file_exists($filename)) {
        $file_contents = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($file_contents as $line) {
            if (strpos($line, "Nomor WhatsApp  : $check_whatsapp") !== false) {
                echo "<h2>Dari hasil pemeriksaan Nomor Anda, Anda sudah Melakukan Absen. Jadi tidak perlu lagi.</h2><a href='index.html'>Kembali</a>";
                exit;
            }
        }
    }

    echo "<h2>Anda belum melakukan absen Pada Bulan ini. Silahkan Isi formulir yang sudah disediakan untuk Absen.</h2><a href='index.html'>Kembali</a>";
} else {
    echo "<h2>Data tidak valid atau formulir belum diisi dengan benar!</h2><a href='index.html'>Kembali</a>";
}
?>
