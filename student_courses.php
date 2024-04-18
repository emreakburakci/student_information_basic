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

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }

        #courseList {
            margin: 20px auto;
            width: 80%;
        }
    </style>
</head>

<body>
    <?php
    include "db_config.php";
    // Öğrencilerin bilgilerini al
    $sql = "SELECT ogrenci_no, ad, soyad FROM ogrenci";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Öğrencileri tablo halinde listeleyen form oluştur
        echo "<h2>Öğrenci Dersleri</h2>";
        echo "<table>";
        echo "<tr><th>Öğrenci No</th><th>Ad</th><th>Soyad</th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ogrenci_no"] . "</td>";
            echo "<td>" . $row["ad"] . "</td>";
            echo "<td>" . $row["soyad"] . "</td>";
            // Buton oluştur ve onClick fonksiyonu ile ilgili öğrencinin derslerini listeleme fonksiyonunu çağır
            echo "<td><button onclick='listCourses(" . $row["ogrenci_no"] . ")'>Dersleri Göster</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='message'>Tabloda veri bulunamadı.</div>";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>

    <script>
        // Dersleri listeleme fonksiyonu
        function listCourses(studentId) {
            // AJAX kullanarak ilgili öğrencinin derslerini al
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Gelen ders verilerini bir div içine yerleştir
                    document.getElementById("courseList").innerHTML = this.responseText;
                }
            };
            // AJAX isteği gönder
            xmlhttp.open("GET", "get_courses.php?student_id=" + studentId, true);
            xmlhttp.send();
        }
    </script>

    <!-- Dersleri listelemek için boş bir div -->
    <div id="courseList"></div>
</body>

</html>