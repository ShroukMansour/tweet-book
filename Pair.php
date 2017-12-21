<?php
class Pair{
    public $first;
    public $second;
    
    function Piar() {
    }
    function Pair($first, $second) {
        $this->first = $first;
        $this->second = $second;
    }
    function setFirst ($first){
        $this->first = $first;
    }
    function getFirst() {
        return $this->first;
    }
    function setSecond($second) {
        $this->second = $second;
    }
    function getSecond() {
        return $this->second;
    }
    function cmp($b, $a) {
        return strcmp($a->first, $b->first);
    }
}
?>