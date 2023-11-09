<?php
namespace Fusion\Contracts;

interface Column
{
    public function sortable ();
    public function filterable ();
    public function type ($type);
}