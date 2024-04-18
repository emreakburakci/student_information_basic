<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademisyen Listesi</title>
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
    $sql = "SELECT * FROM akademisyen";

    // Sorguyu çalıştır ve sonuçları al
    $result = $conn->query($sql);

    // Eğer sonuçlar varsa
    if ($result->num_rows > 0) {
        // Başlık satırını yazdır
        echo "<h2>Akademisyen Listesi</h2>";
        echo "<table>
                <tr>
                    <th>Akademisyen No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>E-posta</th>
                </tr>";
        // Verileri satır satır yazdır
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["akademisyen_no"] . "</td>
                    <td>" . $row["ad"] . "</td>
                    <td>" . $row["soyad"] . "</td>
                    <td>" . $row["eposta"] . "</td>
                </tr>";
        }
        echo "</table>"; // Tablo kapat
    } else {
        echo "<div class='message'>Kayıt bulunamadı.</div>";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>
</body>

</html>