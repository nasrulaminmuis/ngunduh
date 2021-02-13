<?php
function get_between($input, $start, $end)
{
  $substr = substr($input, strlen($start)+strpos($input, $start), (strlen($input) - strpos($input, $end))*(-1));
  return $substr;
}

$a = "com/p/";
$b = "/?";

$id=get_between($_GET['url'], $a, $b);

$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/p/'.$id.'/?__a=1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($output,true);
    $url = $jsn["graphql"]["shortcode_media"]["display_url"];
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
        <form action="print.php" method="get">
            <input type="text" name="url" id="" placeholder="insert link here ...">
            <button type="submit">go!</button>
        </form>
        <div class="konten">
            <img src="<?php echo $url; ?>" alt="klik kanan download">
        </div>
    </main>
</body>
</html>