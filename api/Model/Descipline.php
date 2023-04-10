<?php
declare(strict_types=1);

namespace Model;

use JsonSerializable;
class Descipline extends XmlToJson implements JsonSerializable
{
//    public function __construct()
//    {
//        return 1;
//    }


    private
        $indexDescipl
    ,   $nameDescipl
    ,   $kodKafedriDescipl
    ,   $zEDescipl
    ;

    public function __construct($indexDescipl = "", $nameDescipl = "", $kodKafedriDescipl = "", $zEDescipl = "")
    {
        $this->indexDescipl = $indexDescipl;
        $this->nameDescipl = $nameDescipl;
        $this->kodKafedriDescipl = $kodKafedriDescipl;
        $this->zEDescipl = $zEDescipl;
    }



//    public function __construct(array $array) {
//        $this->array = $array;
//    }
//
    public function jsonSerialize() {
        return array(

        );
    }

}