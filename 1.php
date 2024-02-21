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
    // Kullanıcının cevabı ve saniye bilgisini alınıyor
    $cevap = htmlspecialchars($_POST["cevap"]);
    $saniye = htmlspecialchars($_POST["saniye"]);

    // Python komutu oluşturuluyor
    $python_komutu = "echo -e \"$saniye\\n$cevap\" | (python3 /home/h/allgit1/smsbomber/1.py & PID=$!; sleep 10; killall python3)";

    // Python komutu çalıştırılıyor
    $sonuc = shell_exec($python_komutu);

    // Python'un çıktısı ekrana yazdırılıyor
    echo "<pre>$sonuc</pre>";
}
?>

<!-- Soru Formu -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="cevap">Hedef:</label>
    <input type="text" id="cevap" name="cevap" required>
    <br><br>
    <label for="saniye">Kaç saniye sonra gönderilsin:</label>
    <input type="number" id="saniye" name="saniye" required>
    <br><br>
    <input type="submit" value="Gönder">
</form>

</body>
</html>
