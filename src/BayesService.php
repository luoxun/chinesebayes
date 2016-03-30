<?php 

namespace Bayes;

class BayesService{

    public $bayes ;

    function __construct($store)
    {
        //mb_internal_encoding("UTF-8");
        $this->bayes = new Bayes($store);

    }




    public function guess($text)
    {
        return $this->bayes->guess($text);

    }

    public function train($label, $text)
    {
        return $this->bayes->train($label, $text);
    }

}

