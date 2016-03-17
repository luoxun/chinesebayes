<?php

namespace Documer;

class DocumerConfig
{

    function __construct()
    {

    }
    /**
     * [$sqlite description]
     * @var array
     */
    var $sqlite  = array(
        'sqlite' => 'sqlite',
        'dbfile' => array(
            'dbpath' => __DIR__,
            'filename' => 'db'
        )

    );
}
