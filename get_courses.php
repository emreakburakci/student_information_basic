<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Dersleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
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
    <h1>Öğrenci Dersleri</h1>

    <?php
    include "db_config.php";
    $studentId = $_GET['student_id'];

    // İlgili öğrencinin derslerini al
    $sql = "SELECT d.ders_kodu, d.ders_adi
            FROM ogrenci_ders AS od
            INNER JOIN ders AS d ON od.ders_kodu = d.ders_kodu
            WHERE od.ogrenci_no = $studentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Dersleri tablo halinde listeleyen HTML oluştur
        echo "<table>";
        echo "<tr><th>Ders Kodu</th><th>Ders Adı</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ders_kodu"] . "</td>";
            echo "<td>" . $row["ders_adi"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='message'>Bu öğrencinin dersi bulunmamaktadır.</div>";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>
</body>

</html>