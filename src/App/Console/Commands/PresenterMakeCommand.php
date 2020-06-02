<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class PresenterMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */

    protected $signature = 'make:viewPresenter {name} {path?}';

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

    protected $subFolder = array(); // Sub pasta para namespace;
    protected $name;

    /**
     * Get the stub file for the generator.
     * @return string
     */


    protected function getStub()
    {
        return app_path() . '/Console/Commands/Stubs/PresenterClone.stub';
    }

    /**
     * Get the default namespace for the class.
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if (!empty($this->argument('path'))){
            $path = trim(strtr($this->argument('path'), '/', ''));
            return $rootNamespace.'\ViewPresenters\\' . $path;
        }else{
            return $rootNamespace.'\ViewPresenters';
        }
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the presenter.'],
            ['path', InputArgument::OPTIONAL, 'The optional path.', NULL],

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
        if (!empty($path = $this->argument('path'))){
            if (substr_count($name,'/') != 0){
                $path = strtr($path, '/', '\\');
            }else{
                $path = "\\" . $path;
            }
            $stub = parent::replaceClass($stub, $name);
            $namespace = 'App\ViewPresenters' . $path;
            $stub = str_replace('App\ViewPresenters', $namespace, $stub);
            return str_replace('PresenterClone', $this->argument('name'), $stub);

        }else{
            $stub = parent::replaceClass($stub, $name);
            return str_replace('PresenterClone', $this->argument('name'), $stub);
        }
    }

    protected function hasPathName($name){
        if (substr_count($name,'/') != 0){
            $collectTmp = collect(explode('/', $name));
            $name = $collectTmp->last;
            $this->subFolder = '\\' .$collectTmp->first;
        }
        return $name;
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
       parent::handle();
    }
    /*
    protected function getOptions()
    {
        return [
            ['script', 's', InputOption::VALUE_NONE, 'Defines an appropriate subdirectory'],

        ];
    }
    */
}
