<?php


use PHPUnit\Framework\TestCase;

class DateDiffTest extends TestCase
{
    public function test_day_diff()
    {
        $diffCalculator = new \App\DateDiff();
        $diff = $diffCalculator->calculate("1380/10/05", "1380/10/06");
        $this->assertEquals($diff, [0, 0, 1]);
    }

    public function test_month_diff()
    {
        $diffCalculator = new \App\DateDiff();
        $diff = $diffCalculator->calculate("1380/09/05", "1380/10/06");
        $this->assertEquals($diff, [0, 1, 1]);
    }

    public function test_year_diff()
    {
        $diffCalculator = new \App\DateDiff();
        $diff = $diffCalculator->calculate("1379/09/05", "1380/10/06");
        $this->assertEquals($diff, [1, 1, 1]);
    }
}