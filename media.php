<?php
$directory = "img";

$images = array_filter(scandir($directory), function($file) use ($directory) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    return in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
});
echo json_encode(array_values($images));
?>
