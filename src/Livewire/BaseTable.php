<?php
namespace Fusion\Livewire;

use Illuminate\Contracts\View\View;
use Fusion\Facades\Grid;
use Livewire\Component;
use Livewire\WithPagination;

class BaseTable extends Component
{
    use WithPagination;

    protected $queryString = ['search'];
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
    
    public $search;

    
    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function field($field)
    {
        $this->sortBy = $field;

        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
    }
    public function getDataProperty()
    {
        $data = Grid::getData($this->sortBy, $this->sortDirection); 
        // Assign the sorted options to a property for rendering in the table

        if (! empty(Grid::getRelations())) {
            $data->with(Grid::getRelations());
        }

        if (!empty($this->search)) {
            $data->where(Grid::getSearchable(), 'like', '%' . $this->search . '%');
        }

        $data = $data->paginate(Grid::getPagination(), Grid::getColumnsNames());
        return $data;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }


    public function render(): View
    {
        $columns = Grid::getColumns();
        $actions = Grid::getActions();
        return view('grid::table', compact('columns', 'actions')) ;
    }

}