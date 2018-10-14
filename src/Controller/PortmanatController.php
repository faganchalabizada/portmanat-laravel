<?php

namespace App\Http\Controllers;

use FaganChalabizada\Portmanat;

class PortmanatController extends Controller
{
    public function result() {
        $Portmanat = new Portmanat\Portmanat;

        if ($Portmanat->result()) {//request valid

            $order_id = $Portmanat->getOrderID();
            $transaction_id = $Portmanat->getTransactionID();
            $amount = $Portmanat->getAmount();

            if (!$Portmanat->test()) {//Test mode deactivated
                //here you can replenish balance
            }

            return '1';
        }

        return '0';
    }
    
    public function success() {
        //Success page
        return 'Payment is successfully processed';
    }
    
    public function failed() {
        //Fail page
        return 'Something went wrong. Try again';
    }
}
