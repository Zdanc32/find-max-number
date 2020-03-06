<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 06.03.2020
 * Time: 10:57
 */

namespace App\Service\FindNumber;

use App\DTO\NumberDTO;
use Symfony\Component\Form\FormInterface;

interface FindNumberFormServiceInterface
{
    public function execute(FormInterface $form): NumberDTO;
}