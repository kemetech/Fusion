<?php

namespace Fusion\Grid;

use Fusion\Contracts\Column as ContractsColumn;

class Column implements ContractsColumn
{
    public $column;
    public $type = 'text';
    public $sortable = false;
    public $filterable = false;


    public function __construct($name)
    {
        $this->column = $name;
    }

    public function sortable() {
        $this->sortable = true;
        return $this;
    }

    public function filterable() {
        $this->filterable = true;
        return $this; 
    }

    public function type($type) {
        $this->type = $type;
        return $this;
    }

}