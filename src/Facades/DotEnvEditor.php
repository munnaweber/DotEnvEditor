<?php 

namespace Munna\DotEnvEditor\Facades;

use Illuminate\Support\Facades\Facade;

class DotEnvEditor extends Facade{

    protected static function getFacadeAccessor(){
        return 'dot-env-editor';
    }

}