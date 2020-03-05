<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 20:11
 */

namespace App\Service\FindNumber;

use App\DTO\NumberDTO;

class FindNumberService implements FindNumberServiceInterface
{
    public function executeFromController(
        array $formData
    ): NumberDTO {
        $numberOfLongSeries = $this->formatFormData($formData);
        $generatedSeries = $this->generateSeries($numberOfLongSeries);
        $this->getMaxNumberFromSeries($generatedSeries);

        return new NumberDTO(
            $numberOfLongSeries,
            $this->getMaxNumberFromSeries($generatedSeries)
        );
    }

    public function executeFromCommand(int $number): NumberDTO
    {
        $generatedSeries = $this->generateSeries($number);
        $this->getMaxNumberFromSeries($generatedSeries);

        return new NumberDTO(
            $number,
            $this->getMaxNumberFromSeries($generatedSeries)
        );
    }

    private function formatFormData(
        array $formData
    ): int {
        return (int)$formData['howLongSeries'];
    }

    private function getMaxNumberFromSeries(
        $series
    ): int{
        return max($series);
    }

    private function generateSeries(
        int $numberOfSeries
    ): array {
        $series = [];
        for ($i = 0; $i <= $numberOfSeries; $i++) {
            $series[] += $this->calculateSeriesReq($i);
        }

        return $series;
    }

    private function calculateSeriesReq(
        int $numberOfSeries
    ): int {
        if ($numberOfSeries === 0) {
            return 0;
        } elseif ($numberOfSeries === 1) {
            return 1;
        } elseif ($numberOfSeries % 2 === 0) {
            return $this->calculateSeriesReq($numberOfSeries / 2);
        }

        return
            $this->calculateSeriesReq(($numberOfSeries - 1) / 2) +
            $this->calculateSeriesReq((($numberOfSeries - 1) / 2) + 1);
    }
}