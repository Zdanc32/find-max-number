<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 14:22
 */

namespace App\Controller\Calculator;

use App\DTO\NumberDTO;
use App\Form\FindNumber\FindNumberForm;
use App\Service\FindNumber\FindNumberFormService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

 /**
  * @Route("/", name="find_number")
  */
class FindNumberController extends AbstractController
{
    private $findNumberFormService;

    public function __construct(
        FindNumberFormService $findNumberFormService
    ) {
        $this->findNumberFormService = $findNumberFormService;
    }

    public function __invoke(Request $request)
    {
        $form = $this->createForm(FindNumberForm::class);
        $form->handleRequest($request);
        $numberDTO = $this->findNumberFormService->execute($form);

        return $this->render(
            'calculator/formPage.html.twig', [
                'selectedNumber' => $numberDTO->getNumber(),
                'maxNumber' => $numberDTO->getMaxNumber(),
                'form' => $form->createView()
            ]
        );
    }
}