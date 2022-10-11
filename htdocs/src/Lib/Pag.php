<?php

namespace Gyu\Lib;

class Pag
{
    public $perPage = 5;
    public $art = 10;
    public $next = true;
    public $prev = true;
    public $start = 1;
    public $end = 5;
    public $totalPage;

    public function __construct($total, $page)
    {
        $this->totalPage = ceil($total / $this->art);
        $this->end = ceil($page / $this->perPage) * $this->perPage;
        $this->start = $this->end - $this->perPage +1;
        if($this->end >= $this->totalPage){
            $this->end = $this->totalPage;
            $this->next = false;
        }

        if($this->start <= 1){
            $this->start = 1;
            $this->prev = false;
        }
    }
}

