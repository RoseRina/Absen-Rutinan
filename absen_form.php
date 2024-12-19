<?php
session_start();
if (!isset($_SESSION['allowed_to_absen']) || $_SESSION['allowed_to_absen'] !== true) {
    echo "<h2>Anda belum diperbolehkan mengisi form absensi. Silakan periksa status terlebih dahulu.</h2><a href='index.html'>Kembali</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Form Absensi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #fff;
        }
        .container {
            max-width: 500px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            font-weight: 500;
            margin-bottom: 20px;
            color: #ffc107;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
            color: #ffc107;
        }
        input, select, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border: 2px solid #ffc107;
        }
        button {
            background-color: #ffc107;
            border: none;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Isi Form Absensi</h2>
        <form action="process.php" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

            <label for="whatsapp">Nomor WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" value="<?php echo isset($_SESSION['check_whatsapp']) ? $_SESSION['check_whatsapp'] : ''; ?>" readonly>

            <label for="group">Nama Grup yang di Join:</label>
            <select id="group" name="group" required>
                <option value="">-- Pilih Grup --</option>
                <option value="Grup 1">🇵 🇪 🇯 🇺 🇦 🇳 🇬 🇨 🇺 🇦 🇳 1</option>
                <option value="Grup 2">🇵 🇪 🇯 🇺 🇦 🇳 🇬 🇨 🇺 🇦 🇳 2</option>
                <option value="Grup 3">🇵 🇪 🇯 🇺 🇦 🇳 🇬 🇨 🇺 🇦 🇳 3</option>
            </select>

            <label for="feedback">Kritik dan Saran untuk Grup:</label>
            <textarea id="feedback" name="feedback" rows="5" placeholder="Tulis kritik dan saran Anda" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
