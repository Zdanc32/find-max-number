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
use App\Service\FindNumber\FindNumberServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

 /**
  * @Route("/", name="find_number")
  */
class FindNumberController extends AbstractController
{
    private $findNumberService;

    public function __construct(
      FindNumberServiceInterface $findNumberService
    ) {
        $this->findNumberService = $findNumberService;
    }

    public function __invoke(Request $request)
    {
        $numberDTO = new NumberDTO();
        $form = $this->createForm(FindNumberForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $numberDTO = $this->findNumberService->executeFromController($form->getData());
        }

        return $this->render(
            'calculator/formPage.html.twig', [
                'selectedNumber' => $numberDTO->getNumber(),
                'maxNumber' => $numberDTO->getMaxNumber(),
                'form' => $form->createView()
            ]
        );
    }
}