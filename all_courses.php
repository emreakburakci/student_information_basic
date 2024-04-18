<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tüm Dersler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    include "db_config.php";

    $sql = "SELECT ders_kodu, ders_adi FROM ders";
    $result = $conn->query($sql);

    // Sonuçları kontrol etme ve tablo oluşturma
    if ($result->num_rows > 0) {
        echo "<h2>Tüm Dersler</h2>";
        echo "<table>";
        echo "<tr><th>Ders Kodu</th><th>Ders Adı</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ders_kodu"] . "</td><td>" . $row["ders_adi"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='message'>Hiç ders bulunamadı.</div>";
    }

    // Veritabanı bağlantısını kapatma
    $conn->close();
    ?>
</body>

</html>