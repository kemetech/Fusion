<?php

namespace Fusion\Services;

use Fusion\Grid\Column;
use Fusion\Grid\Action;

class GridService 
{
    protected $share;
    protected $columns = [];
    protected $columnsNames;
    protected $relations = [];
    protected $actions;
    protected $filterables = [];
    protected $searchable = null;
    protected $pagination ;
    protected $columnsTypes = [];
    protected $model;

    public function model($model)
    {
        $this->model = resolve($model);
    }

    public function column($column)
    {
        $this->setColumnsNames($column);
        return $this->columns[] = new Column($column);
    }

    public function action($action)
    {
        return $this->actions[] = new Action($action) ;
    }

    public function setColumnsNames($column)
    {
        return $this->columnsNames[] = $column;
    }

    public function pagination($pagination = 10)
    {
        $this->pagination = $pagination;
    }

    public function getPagination()
    {
        return $this->pagination;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getData($order, $direction)
    {
        return $this->model->orderBy($order, $direction);
    }

    public function relations($relations = null)
    {
        $this->relations = $relations;
    }

    public function getRelations()
    {
        return $this->relations;
    }

    public function getColumnsNames()
    {
        return $this->columnsNames;
    }

    public function search($column)
    {
        $this->searchable = $column;
    }


    public function GetSearchable()
    {
        return $this->searchable;
    }

    public function getActions()
    {
        return $this->actions;
    }


    
}