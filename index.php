<?php

$directory = "img";
$all_img = array_slice(scandir($directory), 2);
$array_length = count($all_img);
$img_loc = "./default.jpg";
if (!empty($all_img)) {

  $cookie_name = "index";
  $cookie_value = 0;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  $in_num = $_COOKIE[$cookie_name];
  if ($array_length < $in_num)
    $in_num = 0;
  if ($array_length == $in_num)
    $in_num = 0;



  $img_loc = "img/" . $all_img[$in_num];

  if ($array_length <= $in_num)
    $in_num = -1;
  $added_number = $in_num + 1;

  setcookie($cookie_name, $added_number, time() + (86400 * 30), "/"); // 86400 = 1 day
}
$image_url = '<img class="bg" src="' . $img_loc . '" />';
?>
<!DOCTYPE html>
<html lang="lt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="refresh" content="20">
  <title>Kiosk images</title>
  <style>
    /*
  1. Use a more-intuitive box-sizing model.
*/
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    /*
  2. Remove default margin
*/
    * {
      margin: 0;
    }

    /*
  3. Allow percentage-based heights in the application
*/
    html,
    body {
      height: 100%;
    }

    /*
  Typographic tweaks!
  4. Add accessible line-height
  5. Improve text rendering
*/
    body {
      line-height: 1.5;
      -webkit-font-smoothing: antialiased;
    }

    /*
  6. Improve media defaults
*/
    img,
    picture,
    video,
    canvas,
    svg {
      display: block;
      max-width: 100%;
    }

    /*
  7. Remove built-in form typography styles
*/
    input,
    button,
    textarea,
    select {
      font: inherit;
    }

    /*
  8. Avoid text overflows
*/
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      overflow-wrap: break-word;
    }

    /*
  9. Create a root stacking context
*/
    #root,
    #__next {
      isolation: isolate;
    }

    img {
      width: 100%;
      z-index: 0;
    }
  </style>

</head>

<body>
  <?php echo $image_url; ?>
</body>

</html>