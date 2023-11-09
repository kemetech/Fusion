<?php

namespace Fusion\Providers;

use Fusion\Console\Commands\MakeTable;
use Fusion\Contracts\Action;
use Fusion\Grid\Action as GridAction;
use Fusion\Services\GridService;
use Fusion\View\Components\Badge;
use Fusion\View\Components\Button;
use Fusion\View\Components\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FusionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('grid',function($app) { return new GridService; });
        $this->app->singleton(Action::class, GridAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeTable::class,
            ]);
        }
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'fusion');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tables'),
        ]);

        Blade::component('fusion::components.cell', 'fusion-grid-cell');
        Blade::component('fusion::components.action', 'fusion-grid-action');
        Blade::component('fusion::components.basic.icon', 'fusion-icon');
        Blade::component('fusion::components.basic.notification', 'fusion-notification');
        Blade::component('fusion::components.basic.tooltip', 'fusion-tooltip');
        Blade::component('fusion::components.form.input.checkbox', 'fusion-checkbox');
        Blade::component('fusion::components.form.input.checkbox-group', 'fusion-checkbox-group');
        Blade::component('fusion::components.form.input.radio', 'fusion-radio');
        Blade::component('fusion::components.form.input.radio-group', 'fusion-radio-group');
        Blade::component('fusion::components.form.input.toggle', 'fusion-toggle');
        Blade::component('fusion::components.form.form', 'fusion-form');
        Blade::component('fusion::components.basic.label', 'fusion-label');
        Blade::component('fusion::components.alpine.modal', 'fusion-modal');
        Blade::component('fusion::components.alpine.dropdown.dropdown', 'fusion-dropdown');
        Blade::component('fusion::components.alpine.dropdown.item', 'fusion-dropdown-item');
        Blade::component('fusion::components.alpine.dropdown.menu', 'fusion-dropdown-menu');
        Blade::component('fusion::components.basic.devider', 'fusion-devider');
        Blade::component('fusion::components.alpine.alert', 'fusion-alert');

        Blade::component('fusion::components.basic.avatar', 'fusion-avatar');


        Blade::component('fusion::components.form.errors', 'fusion-errors');

        Blade::component('fusion-button', Button::class);
        Blade::component('fusion-input', Input::class);
        Blade::component('fusion-badge', Badge::class);




    }
}
