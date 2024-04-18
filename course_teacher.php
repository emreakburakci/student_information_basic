<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dersler ve Akademisyenler</title>
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
    // Derslerin ve dersi veren akademisyenlerin bilgilerini al
    $sql = "SELECT d.ders_kodu, d.ders_adi, a.ad AS akademisyen_ad, a.soyad AS akademisyen_soyad
            FROM ders AS d
            INNER JOIN ders_akademisyen AS da ON d.ders_kodu = da.ders_kodu
            INNER JOIN akademisyen AS a ON da.akademisyen_no = a.akademisyen_no";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tablo başlığı
        echo "<h2>Dersler ve Akademisyenler</h2>";
        echo "<table>";
        echo "<tr><th>Ders Kodu</th><th>Ders Adı</th><th>Akademisyen Adı</th><th>Akademisyen Soyadı</th></tr>";

        // Verileri tablo halinde yazdır
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ders_kodu"] . "</td>";
            echo "<td>" . $row["ders_adi"] . "</td>";
            echo "<td>" . $row["akademisyen_ad"] . "</td>";
            echo "<td>" . $row["akademisyen_soyad"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='message'>Tabloda veri bulunamadı.</div>";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>
</body>

</html>