<?php


use PHPUnit\Framework\TestCase;

class DateDiffTest extends TestCase
{
    public function test_date_diff()
    {
        $dateDiff = new \App\DateDiff();
        $dateDiff->calculateDiff("1379/10/04", "1380/10/05");
    }
}