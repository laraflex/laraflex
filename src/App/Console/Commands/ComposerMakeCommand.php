<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ComposerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'make:viewcomposer {name}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Create a new Composer class';

    /**
     * The type of class being generated.    *
     * @var string
     */
    protected $type = 'Composer';

    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Console/Commands/Stubs/ComposerClone.stub';
    }

    /**
     * Get the default namespace for the class.
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\ViewComposers';
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
        return str_replace('ComposerClone', $this->argument('name'), $stub);

    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
       parent::handle();
    }
}
