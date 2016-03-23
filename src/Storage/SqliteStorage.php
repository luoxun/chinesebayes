<?php

namespace Documer\Storage;

use Documer\DocumerConfig;
use Documer\medoo;

class SqliteStorage implements Adapter
{

    var $labels ;

    var $databases;


    const DBLABEL = 'label';

    const DBWORD = 'word';


    function __construct()
    {
        $config = new DocumerConfig();

        $database = $this->eden('sqlite', $config->sqlite['dbfile']['dbpath'].'/'.$config->sqlite['dbfile']['filename']);

        $this->databases = $database;
        $data = $database->search('label')
           ->addFilter('name = "good"')
           ->setColumns('*')->getRow();
    }

    function eden()
    {
        $class = \Eden\Core\Control::i();
        if (func_num_args() == 0) {
            return $class;
        }

        $args = func_get_args();
        return $class->__invoke($args);
    }

    /**
     * Get distinct names of labels
     *
     * @return array
     */
    public function getDistinctLabels()
    {
        $labelarr = array();
        $data = $this->databases->search(self::DBLABEL)->getRows();

        foreach($data as $lab)
            array_push($labelarr,$lab['name']);

        return $labelarr;
    }

    /**
     * Get how many times we have seen this word before
     *
     * @param $word
     *
     * @return int
     */
    public function getWordCount($word)
    {
        $word = ' "'.$word.'" ';

        $sql = 'select count(*) as count from '.self::DBWORD.' where wordname = '.$word;

        $data = $this->databases->query($sql);
        $data = $data[0];

        return $data['count'];
    }

    /**
     * Get the probability that this word shows up in a LABEL document
     *
     * @param $word
     * @param $label
     *
     * @return float
     */
    public function getWordProbabilityWithLabel($word, $label)
    {
        $word = ' "'.$word.'" ';
        $label = ' "'.$label.'" ';
        $sql = 'select count(*) as count from '.self::DBWORD.' where wordname = '.$word.' and value = '.$label;
        $data = $this->databases->query($sql);
        $data = $data[0];
        return $data['count'];
    }

    /**
     * Get the probability that this word shows up in a any other LABEL
     *
     * @param $word
     * @param $label
     *
     * @return float     */
    public function getInverseWordProbabilityWithLabel($word, $label)
    {
        $word = ' "'.$word.'" ';
        $label = ' "'.$label.'" ';

        $sql = 'select count(*) as count from '.self::DBWORD.' where wordname ='.$word.' and value !='.$label;
        $data = $this->databases->query($sql);
        $data = $data[0];
        return $data['count'];
    }

    public function insertLabel($label)
    {
        $db = $this->databases;


        $data = $db->search('label')
            ->addFilter('name = '.' "'.$label.'" ')
            ->setColumns('*')->getRow();
        //var_dump($data);exit;

        if(empty($data)){

            $db->insertRow(self::DBLABEL, array('name'=>$label));
        }

        return true;

    }

    public function insertWord($word, $label)
    {

        $this->databases->insertRow(self::DBWORD, array('wordname'=> $word,'value'=>$label));
    }
}
