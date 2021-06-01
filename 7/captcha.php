<?php
  session_start();
  $num1 = rand(1, 30);
  $num2 = rand(1, 30);
  $_SESSION['rand_code'] = $num1 + $num2;
  $img = imagecreatetruecolor(200, 60);
  $text_color = imagecolorallocate($img, 103, 55, 250);
  $back_color = imagecolorallocate($img, 255, 255, 255);
  imagefilledrectangle($img, 0, 0, 399, 99, $back_color);
  imagettftext ($img, 30, 0, 10, 40, $text_color, "my.ttf", "$num1 + $num2");
  header("Content-type: image/png");
  imagepng($img);