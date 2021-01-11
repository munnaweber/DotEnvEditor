<?php 
namespace Munna\DotEnvEditor;
use Illuminate\Support\ServiceProvider;

class DotEnvEditorServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind('dot-env-editor', function($app){
            return new DotEnvEditor();
        });
    }
    public function boot(){

    }
}