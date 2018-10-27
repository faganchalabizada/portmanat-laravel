<?php

namespace FaganChalabizada\Portmanat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class Portmanat
{

    private $p_id;        // Partnyor ID
    private $s_id;        // Xidmət ID
    private $key;        // Xidmətin şifrəsi
    private $o_id;        // Order ID
    private $tr_id;        // Tranzaksiya ID
    private $method;    // Metod (account və ya code)
    private $amount;    // Məbləğ
    private $test;        // Xidmət rejimin statusu
    private $hash;        // Məlumatların şifrələnmiş adı

    public function __construct()
    {
        $this->p_id = config("portmanat.p_id");
        $this->s_id = config("portmanat.s_id");
        $this->key = config("portmanat.key");
        $this->o_id = request("o_id", NULL);
        $this->tr_id = request("transaction", NULL);
        $this->amount = request("amount", NULL);
        $this->hash = request("hash", NULL);
        $this->test = request("test", NULL);
        $this->method = request("method", NULL);

    }

    /**
     * Check request
     * @return bool
     */
    public function result()
    {
        $hash = strtoupper(md5($this->p_id . $this->s_id . $this->o_id . $this->tr_id . $this->key));

        if ($hash == $this->hash) //Əgər dogrudursa 1, yoxsa 0 qaytarılmalı
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get Order ID
     * @return integer
     */
    public function getOrderID()
    {
        return $this->o_id;
    }

    /**
     * Get Transaction ID
     * @return integer
     */
    public function getTransactionID()
    {
        return $this->tr_id;
    }

    /**
     * Get Amount
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return boolean
     */
    public function test()
    {
        return $this->test;
    }

}
