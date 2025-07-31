<?php

/**
 * Author: Möf Selvi
 * Simple captcha script in PHP (class version).
 * Licensed under MIT.
 */

namespace Captcha;

class Captcha
{
    private $fontFiles = ["arial.ttf", "sewer.ttf", "sixty.ttf"];
    private $codeLen;
    private $imgH;
    private $imgW;
    private $code;
    private $img;
    private $captcha;
    
    public function __construct($codeLen = 10, $imgH = 100)
    {
        $this->codeLen = $codeLen;
        $this->imgH = $imgH;
        $this->imgW = $codeLen * 50;
        $this->code = $this->getRandStr($codeLen);
        $this->captcha = $this->code;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["captcha"] = strtoupper($this->captcha);
    }

    private function getFontFile()
    {
        return dirname(__FILE__) . "/" . $this->fontFiles[array_rand($this->fontFiles)];
    }

    private function getRandStr($length)
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $str;
    }

    public function render()
    {
        $img = imagecreate($this->imgW, $this->imgH);
        $bg = imagecolorallocate($img, rand(240,255), rand(240,255), rand(240,255));
        for ($capti = 0; $capti < $this->codeLen; $capti++) {
            $fontfile = $this->getFontFile();
            $color0 = imagecolorallocate($img, rand(10,200), rand(10,200), rand(10,200));
            imagettftext(
                $img,
                rand($this->imgW/$this->codeLen - 10, $this->imgH/$this->codeLen + 10),
                rand(-50, 50),
                ($capti+0.2)*$this->imgW/$this->codeLen,
                $this->imgH/1.5,
                $color0,
                $fontfile,
                $this->code[$capti]." "
            );
        }
        // Vertical grid lines
        $number_to_loop = ceil($this->imgW / 10);
        for ($i = 0; $i < $number_to_loop; $i++) {
            $grid_color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
            $x = ($i + 1) * 10;
            imageline($img, $x, 0, $x+rand(-15,15), $this->imgH, $grid_color);
        }
        // Horizontal grid lines
        $number_to_loop = ceil($this->imgH / 10);
        for ($i = 0; $i < $number_to_loop; $i++) {
            $grid_color2 = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
            $y = ($i + 1) * 10;
            imageline($img, 0, $y, $this->imgW, $y+rand(-15,15), $grid_color2);
        }
        // Random lines
        for ($i = 0; $i < 5; $i++) {
            $line_color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
            $rand_x_1 = rand(0, $this->imgW - 1);
            $rand_x_2 = rand(0, $this->imgW - 1);
            $rand_y_1 = rand(0, $this->imgH - 1);
            $rand_y_2 = rand(0, $this->imgH - 1);
            imageline($img, $rand_x_1, $rand_y_1, $rand_x_2, $rand_y_2, $line_color);
        }
        // header('Content-type: image/png');
        // imagepng($img);
        // imagedestroy($img);

        ob_start();

        imagepng($img);
		imagedestroy($img);

        $image_data = ob_get_contents();
        ob_end_clean();

        return $image_data;
    }

    public function getCode()
    {
        return $this->code;
    }
}

// Usage example:
// $captcha = new CaptchaGenerator();
// $captcha->render();
?>