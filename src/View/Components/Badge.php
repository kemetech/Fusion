<?php

namespace Fusion\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Badge extends Component
{
    public $colorClasses= [
        'default' => [
            'default'   =>  'text-slate-500  outline-none  border  dark:border-slate-500  dark:text-slate-400 ',            
            'primary' => 'bg-primary-500 text-white bg-primary-600  border-transparent shadow-sm ',
            'secondary' => 'bg-secondary-500 text-white bg-secondary-600    border-transparent shadow-sm ',
            'danger' => 'bg-danger-500 text-white bg-danger-600    border-transparent shadow-sm ',
            'info' => 'bg-info-500 text-white bg-info-600   border-transparent shadow-sm ',
            'success' => 'bg-success-500 text-white bg-success-600   border-transparent shadow-sm ',
            'warning' => 'bg-warning-500 text-white bg-warning-600   border-transparent shadow-sm ',

            'black' => 'bg-gray-900 text-white text-gray-100 bg-gray-800  dark:bg-white dark:text-gray-900 dark:bg-gray-100   border-transparent shadow-sm ',
            'slate' => 'bg-slate-500 text-white bg-slate-600   border-transparent shadow-sm ',
            'gray' => 'bg-gray-500 text-white bg-gray-600   border-transparent shadow-sm ',
            'zinc' => 'bg-zinc-500 text-white bg-zinc-600  border-transparent shadow-sm ',
            'neutral' => 'bg-neutral-500 text-white bg-neutral-600  border-transparent shadow-sm ',
            'stone' => 'bg-stone-500 text-white bg-stone-600   border-transparent shadow-sm ',
            'red' => 'bg-red-500 text-white bg-red-600    border-transparent shadow-sm ',
            'orange' => 'bg-orange-500 text-white bg-orange-600   border-transparent shadow-sm ',
            'amber' => 'bg-amber-500 text-white bg-amber-600   border-transparent shadow-sm ',
            'yellow' => 'bg-yellow-500 text-white bg-yellow-600   border-transparent shadow-sm ',
            'lime' => 'bg-lime-500 text-white bg-lime-600  border-transparent shadow-sm ',
            'green' => 'bg-green-500 text-white bg-green-600  border-transparent shadow-sm ',
            'teal' => 'bg-teal-500 text-white bg-teal-600  border-transparent shadow-sm ',
            'cyan' => 'bg-cyan-500 text-white bg-cyan-600  border-transparent shadow-sm ',
            'sky' => 'bg-sky-500 text-white bg-sky-600  border-transparent shadow-sm ',
            'blue' => 'bg-blue-500 text-white bg-blue-600   border-transparent shadow-sm ',
            'indigo' => 'bg-indigo-500 text-white bg-indigo-600   border-transparent shadow-sm ',
            'violet' => 'bg-violet-500 text-white bg-violet-600   border-transparent shadow-sm ',
            'purple' => 'bg-purple-500 text-white bg-purple-600    border-transparent shadow-sm ',
            'fuchsia' => 'bg-fuchsia-500 text-white bg-fuchsia-600  border-transparent shadow-sm ',
            'pink' => 'bg-pink-500 text-white bg-pink-600    border-transparent shadow-sm ',
            'rose' => 'bg-rose-500 text-white bg-rose-600    border-transparent shadow-sm ',
            'emerald' => 'bg-emerald-500 text-white bg-emerald-600   border-transparent shadow-sm ',
        ],
        'outline' => [
            'default'   =>  'text-slate-500 outline-none  border  dark:border-slate-500   dark:text-slate-400 ',            
            'primary' => 'border-1 border-primary-500  text-primary-500 dark:text-primary-400 dark:border-primary-400  border-primary-600  ',
            'secondary' => 'border-1 border-secondary-500  text-secondary-500 dark:text-secondary-400 dark:border-secondary-400   border-secondary-600   ',
            'danger' => 'border- border-danger-500  text-danger-500  border-danger-600  ',
            'success' => 'border-1 border-success-500  text-success-500  border-success-600  ',
            'info' => 'border-1 border-info-500  text-info-500  border-info-600  ',
            'warning' => 'border-1 border-warning-500  text-warning-500  border-warning-600  ',

            'black' => 'border-1 border-gray-900  text-gray-900 dark:text-white dark:border-white   border-gray-800   ',
            'slate' => 'border-1 border-slate-500  text-slate-500 dark:text-slate-400 dark:border-slate-400 border-slate-600 ',
            'gray' => 'border-1 border-gray-500  text-gray-500 dark:text-gray-400 dark:border-gray-400  border-gray-600 ',
            'stone' => 'border-1 border-stone-500  text-stone-500 dark:text-stone-400 dark:border-stone-400  border-stone-600   ',
            'neutral' => 'border-1 border-neutral-500  text-neutral-500 dark:text-neutral-400 dark:border-neutral-400 border-neutral-600  ',
            'zinc' => 'border-1 border-zinc-500  text-zinc-500 dark:text-zinc-400 dark:border-zinc-400  border-zinc-600 ',
            'red' => 'border-1 border-red-500  text-red-500 dark:text-red-400 dark:border-red-400  border-red-600 ',
            'yellow' => 'border-1 border-yellow-500  text-yellow-500 dark:text-yellow-400 dark:border-yellow-400   border-yellow-600  ',
            'orange' => 'border-1 border-orange-500  text-orange-500 dark:text-orange-400 dark:border-orange-400  border-orange-600  ',
            'teal' => 'border-1 border-teal-500  text-teal-500 dark:text-teal-400 dark:border-teal-400 border-teal-600  ',
            'cyan' => 'border-1 border-cyan-500  text-cyan-500 dark:text-cyan-400 dark:border-cyan-400  border-cyan-600  ',
            'amber' => 'border-1 border-amber-500  text-amber-500 dark:text-amber-400 dark:border-amber-400  border-amber-600  ',
            'green' => 'border-1 border-green-500  text-green-500 dark:text-green-400 dark:border-green-400  border-green-600  ',
            'emerald' => 'border-1 border-emerald-500  text-emerald-500 dark:text-emerald-400 dark:border-emerald-400  border-emerald-600 ',
            'blue' => 'border-1 border-blue-500  text-blue-500 dark:text-blue-400 dark:border-blue-400   border-blue-600   ',
            'indigo' => 'border-1 border-indigo-500  text-indigo-500 dark:text-indigo-400 dark:border-indigo-400  border-indigo-600  ',
            'violet' => 'border-1 border-violet-500  text-violet-500 dark:text-violet-400 dark:border-violet-400   border-violet-600  ',
            'purple' => 'border-1 border-purple-500  text-purple-500 dark:text-purple-400 dark:border-purple-400  border-purple-600  ',
            'sky' => 'border-1 border-sky-500  text-sky-500 dark:text-sky-400 dark:border-sky-400  border-sky-600 ',
            'rose' => 'border-1 border-rose-500  text-rose-500 dark:text-rose-400 dark:border-rose-400   border-rose-600  ',
            'pink' => 'border-1 border-pink-500  text-pink-500 dark:text-pink-400 dark:border-pink-400   border-pink-600  ',
            'lime' => 'border-1 border-lime-500  text-lime-500 dark:text-lime-400 dark:border-lime-400  border-lime-600  ',
            'fuchsia' => 'border-1 border-fuchsia-500  text-fuchsia-500 dark:text-fuchsia-400 dark:border-fuchsia-400  border-fuchsia-600 ',
        ],
        'ghost' => [
            'default'   =>  'text-slate-500  border-transparent dark:text-slate-400  ',            
            'primary' => ' text-primary-500 bg-primary-100  border-transparent dark:bg-primary-700/10 ',
            'secondary' => 'text-secondary-500 bg-secondary-100  border-transparent dark:bg-secondary-700/10 ',
            'danger' => ' text-danger-500 bg-danger-100   border-transparent dark:bg-danger-700/10 ',
            'success' => ' text-success-500 bg-success-100   border-transparent dark:bg-success-700/10 ',
            'info' => ' text-info-500 bg-info-100    border-transparent dark:bg-info-700/10 ',
            'warning' => '  text-warning-500 bg-warning-100    border-transparent dark:bg-warning-700/10 ',

            'black' => ' text-gray-900 bg-gray-100 dark:text-white border-transparent dark:bg-gray-800/10 ',
            'slate' => ' text-slate-500 bg-slate-100  border-transparent dark:bg-slate-700/10 ',
            'neutral' => ' text-neutral-500 bg-neutral-100  border-transparent dark:bg-neutral-700/10 ',
            'zinc' => ' text-zinc-500 bg-zinc-100  border-transparent dark:bg-zinc-700/10 ',
            'stone' => ' text-stone-500 bg-stone-100  border-transparent dark:bg-stone-700/10 ',
            'red' => ' text-red-500 bg-red-100  border-transparent dark:bg-red-700/10 ',
            'orange' => ' text-orange-500 bg-orange-100  border-transparent dark:bg-orange-700/10 ',
            'yellow' => ' text-yellow-500 bg-yellow-100  border-transparent dark:bg-yellow-700/10 ',
            'amber' => ' text-amber-500 bg-amber-100  border-transparent dark:bg-amber-700/10 ',
            'indigo' => ' text-indigo-500 bg-indigo-100  border-transparent dark:bg-indigo-700/10 ',
            'violet' => ' text-violet-500 bg-violet-100  border-transparent dark:bg-violet-700/10 ',
            'purple' => ' text-purple-500 bg-purple-100  border-transparent dark:bg-purple-700/10 ',
            'pink' => ' text-pink-500 bg-pink-100  border-transparent dark:bg-pink-700/10 ',
            'rose' => ' text-rose-500 bg-rose-100  border-transparent dark:bg-rose-700/10 ',
            'sky' => ' text-sky-500 bg-sky-100  border-transparent dark:bg-sky-700/10 ',
            'green' => ' text-green-500 bg-green-100  border-transparent dark:bg-green-700/10 ',
            'emerald' => ' text-emerald-500 bg-emerald-100  border-transparent dark:bg-emerald-700/10 ',
            'blue' => ' text-blue-500 bg-blue-100  border-transparent dark:bg-blue-700/10 ',
            'gray' => ' text-gray-500 bg-gray-100  border-transparent dark:bg-gray-700/10 ',
            'lime' => ' text-lime-500 bg-lime-100  border-transparent dark:bg-lime-700/10 ',
            'teal' => ' text-teal-500 bg-teal-100  border-transparent dark:bg-teal-700/10 ',
            'cyan' => ' text-cyan-500 bg-cyan-100  border-transparent dark:bg-cyan-700/10 ',
            'fuchsia' => ' text-fuchsia-500 bg-fuchsia-100  border-transparent dark:bg-fuchsia-700/10 ',
        ],
        'metal' => [
            'default' => 'bg-gradient-to-b from-white  to-slate-200 text-slate-500 border-0  ',
            'primary' => 'bg-gradient-to-b from-primary-500  to-primary-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'secondary' => 'bg-gradient-to-b from-secondary-500  to-secondary-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'danger' => 'bg-gradient-to-b from-danger-500  to-danger-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'info' => 'bg-gradient-to-b from-info-500  to-info-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'success' => 'bg-gradient-to-b from-success-500  to-success-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'warning' => 'bg-gradient-to-b from-warning-500  to-warning-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',

            'black' => 'bg-gradient-to-b dark:from-white dark:to-gray-300 dark:text-gray-900 from-gray-900  to-gray-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'slate' => 'bg-gradient-to-b from-slate-500  to-slate-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'gray' => 'bg-gradient-to-b from-gray-500  to-gray-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'zinc' => 'bg-gradient-to-b from-zinc-500  to-zinc-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'neutral' => 'bg-gradient-to-b from-neutral-500  to-neutral-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'stone' => 'bg-gradient-to-b from-stone-500  to-stone-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'red' => 'bg-gradient-to-b from-red-500  to-red-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'orange' => 'bg-gradient-to-b from-orange-500  to-orange-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'amber' => 'bg-gradient-to-b from-amber-500  to-amber-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'yellow' => 'bg-gradient-to-b from-yellow-500  to-yellow-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'lime' => 'bg-gradient-to-b from-lime-500  to-lime-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'green' => 'bg-gradient-to-b from-green-500  to-green-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'teal' => 'bg-gradient-to-b from-teal-500  to-teal-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'cyan' => 'bg-gradient-to-b from-cyan-500  to-cyan-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'sky' => 'bg-gradient-to-b from-sky-500  to-sky-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'blue' => 'bg-gradient-to-b from-blue-500  to-blue-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'indigo' => 'bg-gradient-to-b from-indigo-500  to-indigo-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'violet' => 'bg-gradient-to-b from-violet-500  to-violet-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'purple' => 'bg-gradient-to-b from-purple-500  to-purple-700 text-white bg-gradient-to-br  border-0 shadow-sm ',
            'fuchsia' => 'bg-gradient-to-b from-fuchsia-500  to-fuchsia-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'pink' => 'bg-gradient-to-b from-pink-500  to-pink-700 text-white bg-gradient-to-br  border-0 shadow-sm  ',
            'rose' => 'bg-gradient-to-b from-rose-500  to-rose-700 text-white bg-gradient-to-br border-0 shadow-sm  ',
            'emerald' => 'bg-gradient-to-b from-emerald-500  to-emerald-700 text-white bg-gradient-to-br  border-0 shadow-sm ',
        ],
    ] ;

    public $sizeClasses = [
        'default' => 'py-.5 px-1.5 text-xs ',
        'md' => 'py-.5 px-2 text-sm ',
        'lg' => 'py-.5 px-2  text-base',
    ];
    public $iconClasses = [
        'default' => 'p-1',
        'md' => 'p-2',
        'lg' => 'p-2',
    ];

    public $borderClasses = [
        'default' => 'rounded ',
        'medium' => 'rounded-md ',
        'large' => 'rounded-lg ',
        'square' => ' ', 
        'pill' => 'rounded-full ',
        'rounded right' => 'rounded-r',
        'rounded left' => 'rounded-l',
        'pill right' => 'rounded-r-full',
        'pill left' => 'rounded-l-full',
        'md right' => 'rounded-e-md',
        'md left' => 'rounded-s-md',

    ];
    public $iconSize = [
        'default' => 'tiny',
        'md' => 'tiny',
        'lg' => 'default'
    ];
    public $classes;
    

    /**
     * Create a new component instance.
     */
    public function __construct(


        public string $variant = 'default',

        public string $color = 'default',



        public ?string $icon = null,
        public ?string $iconDir = 'right',
        public bool $soliIcon = false,

        public string $size = 'default',
        public string $radius = 'default',

        public ?string $badge = null,
        public bool $circle = false,

    )
    {
        if($circle){
            $this->radius = 'pill';
        }
    }

    public function getClasses() 
    {
        $this->classes = Arr::toCssClasses([
            'group justify-center inline-flex items-center gap-1 border relative font-semibold',
            $this->colorClasses[$this->variant][$this->color],
            $this->sizeClasses[$this->size] => $this->badge,
            $this->iconClasses[$this->size] => !$this->badge,
            $this->borderClasses[$this->radius],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->getClasses();
        return $this->getView();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function getView(): View|Closure|string
    {
        return 'fusion::components.basic.badge';
    }

}
