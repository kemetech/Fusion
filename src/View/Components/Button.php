<?php

namespace Fusion\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Button extends Component
{
    public $colorClasses= [
        'default' => [
            'neutral'   =>  'text-slate-500              hover:shadow-md active:shadow-sm active:bg-slate-100     border-slate-500   ',            
            'primary'   =>  'text-white bg-primary-500   hover:shadow-md active:shadow-sm active:bg-primary-600   border-transparent ',
            'secondary' =>  'text-white bg-secondary-500 hover:shadow-md active:shadow-sm active:bg-secondary-600 border-transparent ',
            'danger'    =>  'text-white bg-danger-500    hover:shadow-md active:shadow-sm active:bg-danger-600    border-transparent ',
            'info'      =>  'text-white bg-info-500      hover:shadow-md active:shadow-sm active:bg-info-600      border-transparent ',
            'success'   =>  'text-white bg-success-500   hover:shadow-md active:shadow-sm active:bg-success-600   border-transparent ',
            'warning'   =>  'text-white bg-warning-500   hover:shadow-md active:shadow-sm active:bg-warning-600   border-transparent ',       
        ],
        'outline' => [
            'neutral'   => 'outline-none border-slate-500     text-slate-500     hover:text-white hover:shadow-md hover:bg-slate-600     active:shadow-sm active:bg-slate-900     dark:border-slate-400     dark:text-slate-400     dark:hover:bg-slate-800',            
            'primary'   => 'outline-none border-primary-500   text-primary-500   hover:text-white hover:shadow-md hover:bg-primary-500   active:shadow-sm active:bg-primary-600   dark:border-primary-400   dark:text-primary-400   dark:hover:text-white  ',
            'secondary' => 'outline-none border-secondary-500 text-secondary-500 hover:text-white hover:shadow-md hover:bg-secondary-500 active:shadow-sm active:bg-secondary-600 dark:border-secondary-400 dark:text-secondary-400 dark:hover:text-white  ',
            'danger'    => 'outline-none border-danger-500    text-danger-500    hover:text-white hover:shadow-md hover:bg-danger-500    active:shadow-sm active:bg-danger-600    dark:border-danger-400    dark:text-danger-400    dark:hover:text-white  ',
            'success'   => 'outline-none border-success-500   text-success-500   hover:text-white hover:shadow-md hover:bg-success-500   active:shadow-sm active:bg-info-600      dark:border-success-400   dark:text-success-400   dark:hover:text-white  ',
            'info'      => 'outline-none border-info-500      text-info-500      hover:text-white hover:shadow-md hover:bg-info-500      active:shadow-sm active:bg-success-600   dark:border-info-400      dark:text-info-400      dark:hover:text-white  ',
            'warning'   => 'outline-none border-warning-500   text-warning-500   hover:text-white hover:shadow-md hover:bg-warning-500   active:shadow-sm active:bg-warning-600   dark:border-warning-400   dark:text-warning-400   dark:hover:text-white  ',
        ],
        'ghost' => [
            'neutral'   => 'border-transparent text-slate-500     hover:bg-slate-100/25     hover:shadow-sm active:text-slate-600     active:shadow-none dark:text-slate-400     dark:hover:bg-slate-700/10     dark:active:text-slate-600    ',            
            'primary'   => 'border-transparent text-primary-500   hover:bg-primary-100/25   hover:shadow-sm active:text-primary-600   active:shadow-none dark:text-primary-400   dark:hover:bg-primary-700/10   dark:active:text-primary-600  ',
            'secondary' => 'border-transparent text-secondary-500 hover:bg-secondary-100/25 hover:shadow-sm active:text-secondary-600 active:shadow-none dark:text-secondary-400 dark:hover:bg-secondary-700/10 dark:active:text-secondary-600',
            'danger'    => 'border-transparent text-danger-500    hover:bg-danger-100/25    hover:shadow-sm active:text-danger-600    active:shadow-none dark:text-danger-400    dark:hover:bg-danger-700/10    dark:active:text-danger-600   ',
            'success'   => 'border-transparent text-success-500   hover:bg-success-100/25   hover:shadow-sm active:text-info-600      active:shadow-none dark:text-success-400   dark:hover:bg-success-700/10   dark:active:text-info-600     ',
            'info'      => 'border-transparent text-info-500      hover:bg-info-100/25      hover:shadow-sm active:text-success-600   active:shadow-none dark:text-info-400      dark:hover:bg-info-700/10      dark:active:text-success-600  ',
            'warning'   => 'border-transparent text-warning-500   hover:bg-warning-100/25   hover:shadow-sm active:text-warning-600   active:shadow-none dark:text-warning-400   dark:hover:bg-warning-700/10   dark:active:text-warning-600  ',

        ],
        'link' => [
            'neutral'   => 'border-transparent text-slate-500     dark:text-slate-400     hover:underline',            
            'primary'   => 'border-transparent text-primary-500   dark:text-primary-400   hover:underline',
            'secondary' => 'border-transparent text-secondary-500 dark:text-secondary-400 hover:underline',
            'danger'    => 'border-transparent text-danger-500    dark:text-danger-400    hover:underline',
            'success'   => 'border-transparent text-success-500   dark:text-success-400   hover:underline',
            'info'      => 'border-transparent text-info-500      dark:text-info-400      hover:underline',
            'warning'   => 'border-transparent text-warning-500   dark:text-warning-400   hover:underline',

        ],
        'metal' => [
            'neutral'   => 'bg-gradient-to-b from-white         to-slate-200     text-slate-500 hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'primary'   => 'bg-gradient-to-b from-primary-500   to-primary-700   text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'secondary' => 'bg-gradient-to-b from-secondary-500 to-secondary-700 text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'danger'    => 'bg-gradient-to-b from-danger-500    to-danger-700    text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'info'      => 'bg-gradient-to-b from-info-500      to-info-700      text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'success'   => 'bg-gradient-to-b from-success-500   to-success-700   text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
            'warning'   => 'bg-gradient-to-b from-warning-500   to-warning-700   text-white     hover:bg-gradient-to-t border-0 hover:shadow-md active:shadow-sm  active:bg-gradient-to-tr',
        ],
    ] ;

    public $sizeClasses = [
        'default' => 'py-2  px-5 text-sm ',
        'sm'      => 'py-1  px-4 text-sm ',
        'lg'      => 'py-2  px-5 text-base sm:py-3 sm:px-6',
        'tiny'    => 'py-.5 px-2 text-xs ',
    ];
    public $iconClasses = [
        'default' => 'py-2.5 px-2.5',
        'sm' => 'py-1 px-1',
        'lg' => 'py-3 px-3',
        'tiny' => 'py-1 px-1',
    ];

    public $borderClasses = [
        'default' => 'rounded ',
        'md' => 'rounded-md ',
        'lg' => 'rounded-lg ',
        'square' => ' ', 
        'pill' => 'rounded-full ',
        'rounded right' => 'rounded-r',
        'rounded left' => 'rounded-l',
        'pill right' => 'rounded-r-full',
        'pill left' => 'rounded-l-full',
        'md right' => 'rounded-e-md',
        'md left' => 'rounded-s-md',


    ];
    public $widthClasses;
    public $linkCursor;
    public $classes;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $href = null,

        public bool $disabled = false,

        public string $variant = 'default',
        public string $color = 'primary',

        public ?string $icon = null,
        public ?string $iconDir = 'right',
        public bool $solidIcon = false,
        public ?string $iconSize = 'default',
        public ?string $iconStroke = '1.5',

        public ?string $tooltip = null,
        public string $tooltipDir = 'top',
        public ?string $notification = null,
        public string $notificationColor = 'danger',
        public string $notificationStyle = 'default',

        public string $size = 'default',
        public string $radius = 'default',

        public ?bool $full = false,

        public ?string $btn = null,
        public bool $circle = false,
        public string $tag = 'button',

        public bool $animate = false,

    )
    {
        if($circle){
            $this->radius = 'pill';
        }
        switch ($size) {
            case 'tiny':
                $this->iconSize = 'tiny';
                break;
            case 'lg':
                $this->iconSize = 'md';
                break;
            
            default:
                $this->iconSize = 'default';
                break;
        }
        
        
    }

    public function getClasses() 
    {
       
        $this->classes = Arr::toCssClasses([
            'group justify-center inline-flex items-center gap-2 border',
            'hover:-translate-y-1' => $this->animate,
            'w-full' => $this->full,
            'cursor-pointer ' => $this->href,
            $this->colorClasses[$this->variant][$this->color],
            $this->sizeClasses[$this->size] => $this->btn,
            $this->iconClasses[$this->size] => !$this->btn,
            $this->borderClasses[$this->radius],
            'cursor-not-allowed opacity-60' => $this->disabled,
            'relative' => $this->tooltip || $this->notification,

        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->getClasses();
        return 'fusion::components.basic.button';
    }

    

}
