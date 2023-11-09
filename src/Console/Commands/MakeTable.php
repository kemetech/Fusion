<?php

namespace Fusion\Console\Commands;

use Facades\Grid as FacadesGrid;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeTable extends Command
{
    protected $model;
    protected $name;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:grid {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating new data table grid';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (strpos($this->argument('model'), '\\')){
            $this->model = $this->argument('model');
            $this->name = Arr::last(explode('\\', $this->model));

        } else {
            $this->model = 'App\\Models\\' . Str::studly($this->argument('model'));
            $this->name = $this->argument('model');
        }; 
        try {
            resolve($this->model);
        } catch (\Throwable $th) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS! </> 😳 \n");
            $this->line("<fg=red;options=bold>Model name is invalid:</> {$this->name}");
            return;
        }
        $viewName = Str::lower($this->name) . '-table';
        $className = Str::studly($this->name) . 'Table';

        $table = $this->createTable($className, $viewName);
        if ($table) {
            FacadesGrid::model($this->model);
            $this->info("Livewire component {$className} and view {$viewName} created successfully.");
        }

        // $this->createView($viewName);

    }



    
    protected function createTable($className, $viewName)
    {
        $componentPath = app_path("Livewire/Tables/{$className}.php");
        $welcome = $this->isFirstTable($componentPath);

        $this->ensureDirectoryExists($componentPath);

        if (File::exists($componentPath)) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</>");

            return false;
        }

        $componentStub = File::get(dirname(__DIR__).'/../../stubs/table.stub');
        $componentStub = str_replace('{{ class }}', $className, $componentStub);
        $componentStub = str_replace('{{ model }}', Str::studly($this->model), $componentStub);


        File::put($componentPath, $componentStub);


        if ($welcome && ! app()->runningUnitTests()) {
            $this->welcome();
        }


    }

    protected function createView($viewName)
    {
        $viewPath = resource_path("views/livewire/Tables/{$viewName}.blade.php");
        $viewStub = File::get(dirname(__DIR__).'/../../stubs/tableview.stub');

        $this->ensureDirectoryExists($viewPath);

        File::put($viewPath, $viewStub);
    }

    public function isFirstTable($path)
    {
        return ! File::isDirectory(dirname($path));
    }

    protected function ensureDirectoryExists($path)
    {
        if (! File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0777, $recursive = true, $force = true);
        }
    }

    public function welcome()
    {
        $asciiLogo = <<<EOT
        
        <fg=yellow>         A
        <fg=yellow>        /_\
        <fg=yellow>       /_|_\
        <fg=yellow> :    /|__|_\ <fg=green>     | |                     | |          | |     
        <fg=yellow> ::  /|_|__|_\ <fg=green>    | | _____ _ __ ___   ___| |_ ___  ___| |__           
        <fg=yellow> ::./__|_|__|_\ <fg=green>   | |/ / _ | '_ ` _ \ / _ | __/ _ \/ __| '_ \          
        <fg=yellow> :./_|__|__|__|\ <fg=green>  |   |  __| | | | | |  __| ||  __| (__| | | |         
        <fg=yellow> ./|__|___|__|__\ <fg=green> |_|\_\___|_| |_| |_|\___|\__\___|\___|_| |_|             
        <fg=yellow> /__|___|__|___|_\.............................................
        <fg=yellow> ..............................................................
        EOT;

        //         A
        //        /_\
        //       /_|_\
        // :    /|__|_\      | |                     | |          | |     
        // ::  /|_|__|_\     | | _____ _ __ ___   ___| |_ ___  ___| |__           
        // ::./__|_|__|_\    | |/ / _ | '_ ` _ \ / _ | __/ _ \/ __| '_ \          
        // :./_|__|__|__|\   |   |  __| | | | | |  __| ||  __| (__| | | |         
        // ./|__|___|__|__\  |_|\_\___|_| |_| |_|\___|\__\___|\___|_| |_|             
        // /__|___|__|___|_\.............................................
        // ..............................................................                                                              
                                                                                 
            $this->line("\n".$asciiLogo."\n");
            $this->line("\n<options=bold>Congratulations, you've created your first Kemetech grid table!</> 🎉🎉🎉\n");
    } 

}
