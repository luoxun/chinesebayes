<?php 

namespace Bayes\Facades;


use Illuminate\Support\Facades\Facade;

class Bayes extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Bayes';
    }

}
