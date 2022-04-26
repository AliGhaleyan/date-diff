<?php


namespace App;


class DateDiff
{
    public function calculateDiff(string $start, string $end)
    {
        [$startYear, $startMonth, $startDate] = $this->separateSections($start);
        [$endYear, $endMonth, $endDate] = $this->separateSections($end);

        $number = 0;
        if ($startYear < $endYear)
            $number += ($endYear - $startYear) * 365;

        var_dump($number);
        return $number;
    }

    public function separateSections(string $date): array
    {
        list($year, $month, $date) = explode("/", $date);
        return [(int)$year, (int)$month, (int)$date];
    }
}