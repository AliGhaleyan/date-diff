<?php


namespace App;


class DateDiff
{
    public function calculate(string $first, string $second): array
    {
        [$startYear, $startMonth, $startDay] = $this->separateSections($first);
        [$endYear, $endMonth, $endDay] = $this->separateSections($second);

        $startNumber = [0, 0, 0];
        $endNumber = [0, 0, 0];

        if ($startDay > $endDay)
            $startNumber[2] = $startDay - $endDay;
        elseif ($startDay < $endDay)
            $endNumber[2] = $endDay - $startDay;

        if ($startMonth > $endMonth)
            $startNumber[1] = $startMonth - $endMonth;
        elseif ($startMonth < $endMonth)
            $endNumber[1] = $endMonth - $startMonth;

        if ($startYear > $endYear)
            $startNumber[0] = $startYear - $endYear;
        elseif ($startYear < $endYear)
            $endNumber[0] = $endYear - $startYear;

        return $this->calculator($startNumber, $endNumber);
    }

    public function separateSections(string $date): array
    {
        [$year, $month, $date] = explode("/", $date);
        return [(int)$year, (int)$month, (int)$date];
    }

    public function calculator(array $start, array $end)
    {
        [$startYear, $startMonth, $startDay] = $start;
        [$endYear, $endMonth, $endDay] = $end;

        $resultDay = $this->calculateDay($startDay, $endDay, $endMonth, $endYear);

        $resultMonth = $this->calculateMonth($startMonth, $endMonth, $endYear);

        $resultYear = $this->calculateYear($startYear, $endYear);

        return [$resultYear, $resultMonth, $resultDay];
    }

    protected function calculateDay(int $startDay, int &$endDay, int &$endMonth, int &$endYear)
    {
        if ($endDay >= $startDay)
            $resultDay = $endDay - $startDay;
        else {
            if ($endMonth >= 1) {
                $endMonth -= 1;
                $endDay += 30;
                $resultDay = $endDay - $startDay;
            } else {
                $endYear -= 1;
                $endMonth += 11;
                $endDay += 30;
                $resultDay = $endDay - $startDay;
            }
        }

        return $resultDay;
    }

    protected function calculateMonth(int $startMonth, int &$endMonth, int &$endYear)
    {
        if ($endMonth >= $startMonth)
            $resultMonth = $endMonth - $startMonth;
        else {
            if ($endYear >= 1) {
                $endYear -= 1;
                $endMonth += 12;
                $resultMonth = $endMonth - $startMonth;
            } else throw new \Exception("Invalid end date.");
        }

        return $resultMonth;
    }

    protected function calculateYear(int $startYear, int &$endYear)
    {
        $resultYear = 0;
        if ($endYear >= $startYear)
            $resultYear = $endYear - $startYear;

        return $resultYear;
    }
}