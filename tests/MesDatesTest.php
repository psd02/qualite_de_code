<?php
namespace UPJV;

require __DIR__."\..\src\MesDates.php";

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class MesDatesTest extends TestCase
{
    #[Test]
    public function demain()
    {
        //$date = date('d-m-Y', strtotime('+1 day'));
        //$resultat = ['date' => $date];
        //return json_encode($resultat);
        $date = new \UPJV\MesDates();
        self::assertNotEmpty($date->demain());
    }
}
