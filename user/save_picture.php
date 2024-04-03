<?php
$imageData = $_POST['image'];
$imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
$imageData = base64_decode($imageData);
$filename = 'images/captured_image_' . time() . '.jpg';
file_put_contents($filename, $imageData);
echo 'Image saved successfully as ' . $filename;
?>
