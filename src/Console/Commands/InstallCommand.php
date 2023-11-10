<?php

namespace Fusion\Console\Commands;

use Illuminate\Console\Command;
use RuntimeException;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fusion:install {--stack : The development stack that you are using (blank,breeze,jetstream)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fusion ui library installation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $fileContent = file_get_contents(base_path('tailwind.config.js'));
        // $contentPaths = Str::before(Str::after($fileContent, 'content: ['), ']');
        // $after = "'./resources/views/*.blade.php'";
        // $name = "'zzzz'";
        // $content = PHP_EOL.
        // '        '."'./packages/Kemetech/Fusion/resources/views/*.blade.php',".PHP_EOL.
        // '        '."'./packages/Kemetech/Fusion/resources/views/**/*.blade.php',".PHP_EOL.
        // '        '."'./packages/Kemetech/Fusion/resources/views/**/**/*.blade.php',".PHP_EOL.
        // '        '."'./packages/Kemetech/Fusion/src/View/Components/*.php',".PHP_EOL.
        // '        '."'./packages/Kemetech/Fusion/src/View/Components/**/*.php',".PHP_EOL;
        // $mc = str_replace(
        //     $after,
        //     $after.$content.',',
        //     $contentPaths,
        // );

        // dd($mc);

             // Install Stack...
             if (! $this->installFusionStack()) {
                return 1;
            }

            $this->info('Fusion ui installed successful!');


    }
    protected function installFusionStack ()
    {

        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                '@tailwindcss/forms' => '^0.5.2',
                '@tailwindcss/typography' => '^0.5.0',
                'autoprefixer' => '^10.4.7',
                'postcss' => '^8.4.14',
                'tailwindcss' => '^3.1.0',
            ] + $packages;
        });

        // Tailwind Configuration...
        copy(__DIR__.'/../../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__.'/../../../stubs/vite.config.js', base_path('vite.config.js'));

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }


        $this->line('');
        $this->components->info('Blank laravel scaffolding installed successfully.');

        return true;
    }

   

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool  $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';
        $packages = json_decode(file_get_contents(base_path('package.json')), true);
        

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
    
    // /**
    //  * Replace a given string within a given file.
    //  *
    //  * @param  string  $search
    //  * @param  string  $replace
    //  * @param  string  $path
    //  * @return void
    //  */
    // protected function replaceInFile($search, $replace, $path)
    // {
    //     file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    // }

 
   /**
     * Run the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    '.$line);
        });
    }

}
