<?php

namespace Fusion\Grid;

use Exception;
use Fusion\Contracts\Action as ContractsAction;

class Action implements ContractsAction
{
    public $action;
    public $route;
    public $attributes = [];
    public $sortable = false;
    public $filterable = false;
    protected $acceptedActions = ['view', 'edit', 'delete'];



    public function __construct($name)
    {
        if (! in_array($name, $this->acceptedActions)) {
            throw new Exception($name .' action is not accepted .. Only (view, edit and delete) are supported');
        }
        $this->action = $name;
    }

    public function route($route) {
        $this->route = $route;
        return $this;
    }

    public function attributes($attributes)
    {
        $this->attributes = $attributes;
    }

}