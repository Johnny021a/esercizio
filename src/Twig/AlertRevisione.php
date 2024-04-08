<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AlertRevisione extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('alert_revisione',[$this,'alertRevisione']),
        ];
    }

    public function AlertRevisione($data)
    {
        $dataInsert = date_create($data);
        $currentData = date_create(date('Y-m-d'));
        $diff = date_diff($dataInsert,$currentData);
        $mesi = $diff->format('%m');
        $anno = $diff->format('%y');
        $icon = "😺";
        if(($mesi > 9) || ($anno > 0))
        {
            return $icon;
        }
    }
}

?>