<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MediatorMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mediator {name} {--r}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Mediator class';

    /**
     * The type of class being generated.
     * @var string
     */
    protected $type = 'Mediator';

    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('r'))
        {
            return app_path() . '/Console/Commands/Stubs/ResourceMediatorClone.stub';
        }else
        {
            return app_path() . '/Console/Commands/Stubs/ModelMediatorClone.stub';
        }

    }

    /**
     * Get the default namespace for the class.
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('r'))
        {
            return $rootNamespace.'\ResourceMediators';
        }
        else
        {
            return $rootNamespace.'\ModelMediators';
        }
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the Mediatro.'],
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
        if ($this->option('r'))
        {
            $stub = parent::replaceClass($stub, $name);
            return str_replace('ResourceMediatorClone', $this->argument('name'), $stub);
        }
        else
        {
            $stub = parent::replaceClass($stub, $name);
            return str_replace('ModelMediatorClone', $this->argument('name'), $stub);
        }

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
        return [

            ['name', 'r', InputOption::VALUE_NONE, 'Defines an appropriate subdirectory'],

        ];
    }
}
