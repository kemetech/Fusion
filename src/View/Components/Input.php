<?php

namespace Fusion\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Arr;

class Input extends Component
{
    public $sizeClasses = [
        'default' => 'py-2 text-sm',
        'sm' => 'py-1 text-sm',
        'lg' => 'py-2.5 text-base'
    ];
    public $frameSizeClasses = [
        'default' => ' text-sm',
        'sm' => 'text-xs',
        'lg' => 'text-base'
    ];

    public $floatingSize = [
        'default' => 'peer-placeholder-shown:text-sm peer-focus:text-xs',
        'sm' => 'peer-placeholder-shown:text-xs peer-focus:text-xs',
        'lg' => 'peer-placeholder-shown:text-base peer-focus:text-sm',

    ];
    
    public $styleClasses = [
        'default' => 'bg-gray-50 dark:bg-gray-800 px-3  border border-gray-300 dark:border-gray-600  focus:border-primary-500  ',
        'line'  => 'border-b border-gray-300 dark:border-gray-600 border-0 bg-transparent focus:outline-offset-none dark:focus:border-primary-500 focus:border-primary-500',
        'ghost' => 'border-0 bg-transparent focus:outline-offset-none',
    ];
    public $radiusClasses = [
        'default' => 'rounded-md',
        'square' => '',
        'pill' => 'rounded-full'
    ];
    public $btnRadius = [
        'default' => 'md right',
        'square' => 'sqaure',
        'pill' => 'pill right'
    ];
    public $btnSize = [
        'default' => 'default',
        'lg' => 'lg',
        'sm' => 'sm',
    ];

    public $fieldClasses;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $hint = null,
        public bool $required = false,
        public bool $noError = false,

        public ?string $style = 'default',
        public string $size = 'default',

        public ?string $btn = null,
        public string $btnColor = 'primary',
        public string $btnVariant = 'default',
        public ?string $btnIcon = null,
        public ?string $btnHref = null,
        public ?string $tooltip = null,
        public ?string $tooltipDir = 'top',

        public ?string $type='text',
        public ?string $field='text',

        public ?string $prefix = null,
        public ?string $suffix = null,


        public ?string $icon = null,
        public ?string $iconDir = 'right',
        public string $iconSize = 'default',
        public string $iconStroke = "1.5",
        public bool $solidIcon = false,

        public ?string $mask = null,
        public bool $noSpinner = false,
        public bool $autogrow = false,
        public bool $noLense = false,
        public string $width = 'w-24',
        public ?string $minimum = '0',
        public ?string $maximum = '1000000',
        public bool $floating = false,
        public ?string $placeholder = null,
        public string $radius = 'default',
        public ?string $button = null,

    )
    {
        if($size == 'lg') {
            $this->iconSize='md';
        } 
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->getClasses();
        return view($this->getView());
    }

    protected function getView(){
        
        return "fusion::components.form.input.$this->field";
    }

    public function getClasses() 
    {
        $this->fieldClasses = Arr::toCssClasses([
            'flex-auto peer border-none bg-transparent disabled:cursor-not-allowed focus:border-transparent focus:outline-none focus:ring-0 p-0 focus:ring-transparent  text-gray-700 focus:placeholder-transparent dark: dark:focus:placeholder-transparent  placeholder-gray-400 dark:placeholder-gray-500 dark:text-gray-300',
            $this->sizeClasses[$this->size],
            "[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" => $this->noSpinner == true,

        ]);
    }
}
