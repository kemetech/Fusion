<?php

namespace Fusion\Traits;

use Livewire\Features\SupportEvents\HandlesEvents;

trait FusionAlert
{
    use HandlesEvents;

    public function success ($message, $title = 'success')
    {
        session()->flash('fusion message', $message);
        session()->flash('fusion type', 'success');
        session()->flash('fusion title', $title);
    }

    public function error ($message, $title = 'error')
    {
        session()->flash('fusion message', $message);
        session()->flash('fusion type', 'error');
        session()->flash('fusion title', $title);
    }

    public function info ($message, $title = 'info')
    {
        session()->flash('fusion message', $message);
        session()->flash('fusion type', 'info');
        session()->flash('fusion title', $title);
    }
   
}