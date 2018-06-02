<?php
class RandomNum{
    function create($long)//生成随机数，输入值为随机数长度
    {
        srand(microtime() * 100000);
        for ($c_number = "", $i = 0; $i < $long; $i++) {
            $c_number .= dechex(rand(0, 15));
        }
        return $c_number;
    }
    function image($check)//生成图像，输入值为随机数
    {
        $image_width = 55;
        $image_height = 18;
        $length=strlen($check);
        $image_b = imagecreate($image_width, $image_height);
        imagecolorallocate($image_b, 255, 255, 255);
        for ($i = 0; $i < $length; $i++) {
            $font = mt_rand(3, 5);
            $x = mt_rand(1, 8) + $image_width * $i / $length;
            $y = mt_rand(1, $image_height / $length);
            $color = imagecolorallocate($image_b, mt_rand(0, 100), mt_rand(0, 150), mt_rand(0, 200));
            imagestring($image_b, $font, $x, $y, $check[$i], $color);
        }
        return $image_b;
    }
}
