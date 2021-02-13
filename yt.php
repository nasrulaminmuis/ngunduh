<?php

$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.arugaz.my.id/api/media/ytvideo?url='.$_GET['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($output,true);
    $dl = $jsn["result"]["dl_link"];
    $thumb = $jsn["result"]["thumb"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Ig Downloader</title>
</head>
<body>
    <header>
        <i class="fab fa-instagram fa-5x"></i>
        <p class="judul">Ig<br>Downloader</p>
    </header>
    <div class="line">
        <a class="home" href="index.html">Home</a>
    </div>
    <main>
        <form action="ig.php" method="get">
            <input type="text" name="url" id="" placeholder="insert link here ...">
            <button type="submit">go!</button>
        </form>
        <div class="konten">
            <img src="0<?php echo $thumb; ?>" alt="klik kanan download" width="200" height="100" class="thumb" style="vertical-align:middle">
            <br>
            <button class="btn success"><a href="<?php echo $dl; ?>" class="dl">Download</a></button>
        </div>
    </main>
</body>
</html>