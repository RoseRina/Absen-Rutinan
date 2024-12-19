<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $check_whatsapp = htmlspecialchars($_POST['check_whatsapp'] ?? '');
    $filename = 'absensi.txt';

    // Periksa apakah nomor WhatsApp sudah ada di absensi
    $status_found = false;
    if (file_exists($filename)) {
        $file_contents = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($file_contents as $line) {
            if (strpos($line, "Nomor WhatsApp  : $check_whatsapp") !== false) {
                $status_found = true;
                break;
            }
        }
    }

    if ($status_found) {
        echo "<div style='font-family:Roboto, sans-serif; background-color:#1e3c72; color:white; display:flex; justify-content:center; align-items:center; height:100vh;'>
                <div style='text-align:center; background-color:#2a5298; padding:20px; border-radius:10px; box-shadow:0px 4px 6px rgba(0,0,0,0.3);'>
                    <h2 style='color:#ffc107;'>Anda sudah melakukan absen</h2>
                    <p>Tidak perlu absen lagi. Terima kasih telah berpartisipasi!</p>
                    <a href='index.html' style='text-decoration:none; background-color:#ffc107; color:#333; padding:10px 20px; border-radius:5px; font-weight:bold;'>Kembali</a>
                </div>
              </div>";
    } else {
        echo "<div style='font-family:Roboto, sans-serif; background-color:#1e3c72; color:white; display:flex; justify-content:center; align-items:center; height:100vh;'>
                <div style='text-align:center; background-color:#2a5298; padding:20px; border-radius:10px; box-shadow:0px 4px 6px rgba(0,0,0,0.3);'>
                    <h2 style='color:#ffc107;'>Anda belum melakukan absen</h2>
                    <p>Silakan isi formulir absensi di halaman sebelumnya.</p>
                    <a href='index.html' style='text-decoration:none; background-color:#ffc107; color:#333; padding:10px 20px; border-radius:5px; font-weight:bold;'>Kembali</a>
                </div>
              </div>";
    }
} else {
    echo "<div style='font-family:Roboto, sans-serif; background-color:#1e3c72; color:white; display:flex; justify-content:center; align-items:center; height:100vh;'>
            <div style='text-align:center; background-color:#2a5298; padding:20px; border-radius:10px; box-shadow:0px 4px 6px rgba(0,0,0,0.3);'>
                <h2 style='color:#ffc107;'>Akses tidak valid!</h2>
                <a href='index.html' style='text-decoration:none; background-color:#ffc107; color:#333; padding:10px 20px; border-radius:5px; font-weight:bold;'>Kembali</a>
            </div>
          </div>";
}
?>
