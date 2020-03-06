<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 06.03.2020
 * Time: 10:51
 */

namespace App\Helper;

class NumberFormatHelper
{
    public static function formatFormData(
        array $formData
    ): int {
        return (int)$formData['howLongSeries'];
    }
}