<?php
    require('../../json/CService.php');

    if(isset($_GET['period']))
    {
        switch($_GET['period'])
        {
            case 'today' :  $c = new CService('today');
                            $T = $c->getAllSla();
            break;
            case 'this_week' :  $c = new CService('this_week');
                                $T = $c->getAllSla();
            break;
            case 'this_month' : $c = new CService('this_month');
                                $T = $c->getAllSla();
            break;
            case 'this_year' :  $c = new CService('this_year');
                                $T = $c->getAllSla();
            break;
            case 'last_24' :    $c = new CService('last_24');
                                $T = $c->getAllSla();
            break;
            case'last_7_days' : $c = new CService('last_7_days');
                                $T = $c->getAllSla();
            break;
            case 'last_30_days' :   $c = new CService('last_30_days');
                                    $T = $c->getAllSla();
            break;
            case 'last_365_days' :  $c = new CService('last_365_days');
                                    $T = $c->getAllSla();
            break;
            default :   $c = new CService('today');
                        $T = $c->getAllSla();
            break;
        }
        
        $sla_statusController =new sla_statusController();
        $serviceController = new serviceController();
        require("content_default.php");    
    }
    else
    {
        $c = new CService('today');
        $T = $c->getAllSla();
        $sla_statusController =new sla_statusController();
        $serviceController = new serviceController();
        require("content_default.php");
    }
    
?>
