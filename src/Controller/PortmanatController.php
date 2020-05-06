<?php

namespace App\Http\Controllers;


use FaganChalabizada\Portmanat\Portmanat;

class PortmanatController extends Controller
{

    private $data;

    public function result()
    {
        $Portmanat = new Portmanat();

        if ($Portmanat->result()) {//request valid

            $transaction_id = $Portmanat->getTransactionID();
            $amount = $Portmanat->getAmount();

            $user_id = request("user_id", 0);//you should manually add user_id param to html form


            if (!$Portmanat->test()) {//Test mode deactivated
                //here you can replenish balance



            }

            echo '1';
            return;
        }

        echo '0';
        return;
    }

    public function success()
    {
        return redirect("topUp/portmanat/f")->with(['success' => true]);
    }

    public function failed()
    {
        $errors[] = "Something went wrong.";
        return redirect("topUp/portmanat/f")->withErrors($errors);
    }

    /**
     * Portmanat top up balance page
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex($type)
    {
        $this->data['type'] = $type;
        return view('topUp.portmanat.index', $this->data);
    }


}
