<?php

namespace UPJV;

class MesDates
{
    public function demain()
    {
        $date = date('d-m-Y', strtotime('+1 day'));
        $resultat = ['date' => $date];
        return json_encode($resultat);
    }
}
