<?php

/****************************************************************************\

Generator.php - Generate QR Code and return image content using QRCode. MIT license.

Copyrights for this script are held by Möf Selvi.

\****************************************************************************/

namespace QRCode;

class Generator
{
    public static function generateQrCode($data, $options=[])
    {
        $qr = new QRCode($data, $options);
        $image = $qr->render_image();

        ob_start();

        imagepng($image);
		imagedestroy($image);

        $image_data = ob_get_contents();
        ob_end_clean();

        return $image_data;
    }
}