<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 06.03.2020
 * Time: 10:57
 */

namespace App\Service\FindNumber;

use App\DTO\NumberDTO;
use App\Helper\NumberFormatHelper;
use Symfony\Component\Form\FormInterface;

class FindNumberFormService implements FindNumberFormServiceInterface
{
    private $findNumberService;

    public function __construct(
        FindNumberServiceInterface $findNumberService
    ) {
        $this->findNumberService = $findNumberService;
    }

    public function execute(
        FormInterface $form
    ): NumberDTO {
        if ($this->checkForm($form)) {
            return $this->getCalculatedData($form);
        } else {
            return new NumberDTO();
        }
    }

    private function getCalculatedData(
        FormInterface $form
    ): NumberDTO {
        return $this->findNumberService->execute(
            NumberFormatHelper::formatFormData($form->getData())
        );
    }

    private function checkForm(
        FormInterface $form
    ): bool {
        return ($form->isSubmitted() && $form->isValid());
    }
}