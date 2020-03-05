<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 18:15
 */

namespace App\Form\FindNumber;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class FindNumberForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('howLongSeries', NumberType::class)
            ->add('findNumber', SubmitType::class)
        ;
    }
}