<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Bilgileri</title>
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
    // Öğrencilerin ve hangi bölümlerde olduklarının bilgilerini al
    $sql = "SELECT o.ogrenci_no, o.ad, o.soyad, b.bolum_adi
            FROM ogrenci AS o
            INNER JOIN ogrenci_bolum AS ob ON o.ogrenci_no = ob.ogrenci_no
            INNER JOIN bolum AS b ON ob.bolum_no = b.bolum_no";

    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Tablo başlığı
        echo "<h2>Öğrenci Bilgileri</h2>";
        echo "<table>";
        echo "<tr><th>Öğrenci No</th><th>Ad</th><th>Soyad</th><th>Bölüm Adı</th></tr>";

        // Verileri tablo halinde yazdır
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ogrenci_no"] . "</td>";
            echo "<td>" . $row["ad"] . "</td>";
            echo "<td>" . $row["soyad"] . "</td>";
            echo "<td>" . $row["bolum_adi"] . "</td>";
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