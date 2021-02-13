<?php

$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.arugaz.my.id/api/media/tiktok?url='.$_GET['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($output,true);
    $dl = $jsn["result"]["mp4direct"];
    $thumb = $jsn["result"]["image"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="css/all.css">
    <title>tk Downloader</title>
</head>
<body>
    <header>
        <i class="fab fa-tiktok fa-5x"></i>
        <p class="judul">tk<br>Downloader</p>
    </header>
    <div class="line">
        <a class="home" href="index.html">Home</a>
    </div>
    <main>
        <form action="tktk.php" method="get">
            <input type="text" name="url" id="" placeholder="insert link here ...">
            <button type="submit">go!</button>
        </form>
        <div class="konten">
            <img src="<?php echo $thumb; ?>" alt="klik kanan download" width="100" height="100" class="thumb" style="vertical-align:middle">
            <br>
            <button class="btn success"><a href="<?php echo $dl; ?>" class="dl">Download</a></button>
        </div>
    </main>
</body>
</html>