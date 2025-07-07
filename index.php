<?php
$directory = "img";
$all_img = array_slice(scandir($directory), 2);

// Add a video entry to the array
$video_file = "video.mp4"; // Place this in the same directory or adjust the path
$media_list = [];

foreach ($all_img as $img) {
    $media_list[] = ['type' => 'image', 'src' => "img/$img"];
    // Insert video after each image or every N images
    $media_list[] = ['type' => 'video', 'src' => $video_file];
}

$array_length = count($media_list);
$cookie_name = "index";
$index = isset($_COOKIE[$cookie_name]) ? intval($_COOKIE[$cookie_name]) : 0;

if ($index >= $array_length) {
    $index = 0;
}

$current_media = $media_list[$index];
$next_index = $index + 1;
setcookie($cookie_name, $next_index, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="15">
  <title>Kiosk Media</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      background: black;
    }
    img.bg, video.bg {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }
    video.rotated {
  transform: rotate(90deg);
  transform-origin: center center;
  width: 100vh;
  height: 100vw;
  position: absolute;
  top: 50%;
  left: 50%;
  object-fit: cover;
  transform: translate(-50%, -50%) rotate(90deg);
}

  </style>
</head>
<body>
  <?php if ($current_media['type'] === 'image'): ?>
    <img class="bg" src="<?= $current_media['src'] ?>" />
  <?php else: ?>
    <video class="bg rotated" autoplay muted loop>
      <source src="<?= $current_media['src'] ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  <?php endif; ?>
</body>
</html>
