<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soru Formu</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcının cevabı alınıyor
    $cevap = htmlspecialchars($_POST["cevap"]);

    // Python komutu oluşturuluyor
    $python_komutu = "echo -e \"2\\n$cevap\" | python3 /home/h/allgit1/smsbomber/1.py";

    // Python komutu çalıştırılıyor
    $sonuc = shell_exec($python_komutu);

    // Python'un çıktısı ekrana yazdırılıyor
    echo "<pre>$sonuc</pre>";
}
?>

<!-- Soru Formu -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="cevap">hedef:</label>
    <input type="text" id="cevap" name="cevap" required>
    <br><br>
    <input type="submit" value="Gönder">
</form>

</body>
</html>
