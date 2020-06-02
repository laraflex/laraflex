<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class DependenciesMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */

    protected $signature = 'make:dependencies {name}';

    /**
     * The console command description.
     * @var string
     */

    protected $description = 'Create a new Dependencies class';

    /**
     * The type of class being generated.
     * @var string
     */
    protected $type = 'Dependency';

    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Console/Commands/Stubs/DependenciesClone.stub';

    }

    /**
     * Get the default namespace for the class.
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\ViewPresenters\Dependencies';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the Dependency.'],
        ];
    }

    /**
     * Substitui o nome da classe para o stub fornecido.
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */

    protected function replaceClass($stub, $name)
    {
        
        return str_replace('DependenciesClone', $this->argument('name'), $stub);

    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
       parent::handle();
    }

    protected function getOptions()
    {
        
    }
}