<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class PresenterMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */

    protected $signature = 'make:viewPresenter {name} {--s}';

    /**
     * The console command description.
     * @var string
     */

    protected $description = 'Create a new ViewPresenter class';

    /**
     * The type of class being generated.
     * @var string
     */
    protected $type = 'Presenter';

    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('s'))
        {
            return app_path() . '/Console/Commands/Stubs/ScriptPresenterClone.stub';
        }else
        {
            return app_path() . '/Console/Commands/Stubs/PresenterClone.stub';
        }

    }

    /**
     * Get the default namespace for the class.
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('s'))
        {
            return $rootNamespace.'\ViewPresenters\Scripts';
        }
        else
        {
            return $rootNamespace.'\ViewPresenters';
        }
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the presenter.'],
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
        if ($this->option('s'))
        {
            $stub = parent::replaceClass($stub, $name);
            return str_replace('ScriptPresenterClone', $this->argument('name'), $stub);
        }
        else
        {
            $stub = parent::replaceClass($stub, $name);
            return str_replace('PresenterClone', $this->argument('name'), $stub);
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

            ['script', 's', InputOption::VALUE_NONE, 'Defines an appropriate subdirectory'],

        ];
    }
}
