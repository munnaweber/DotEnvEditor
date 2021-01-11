<?php 

namespace Munna\DotEnvEditor;

class DotEnvEditor{
    public $path;

    public function __construct(){
        $this->path = base_path('.env');
    }

    public function update_key($setkey, $value){
        if($setkey == null){
            return ["status" => false, "message" => "Set $setkey Key Data Properly"];
        }elseif($this->env_key_check($setkey) == false){
            return ["status" => false, "message" => "This $setkey is not found"];
        }
        $file = file($this->path);
        $key = $setkey."=";
        $newdata = array_map(function($item) use ($value, $key){
            $find = stristr($item, $key);
            if($find){
                return $key.$value."\n";
            }
            return $item;
        }, $file);
        $update_data = implode('', $newdata);
        file_put_contents($this->path, $update_data);
        return ['status' => true, 'message' => "The $key key has been updated"];
    }

    public function add_key_before($newKey, $value, $before_key){
        if($newKey == null){
            return ["status" => false, "message" => "Set New Key Data Properly"];
        }elseif($this->env_key_check($newKey) == true){
            return ["status" => false, "message" => "This $newKey New Key Is Already Exists"];
        }elseif($before_key == null){
            return ["status" => false, "message" => "Set Before Key Data Properly"];
        }elseif($this->env_key_check($before_key) == false){
            return ["status" => false, "message" => "This $before_key Before Key is Not Found"];
        }
        $file = file($this->path);
        $before_key_value = $this->env_key($before_key);
        $before_key = $before_key."=";
        $newdata = array_map(function($item) use ($newKey, $value, $before_key, $before_key_value){
            $find = stristr($item, $before_key);
            if($find){
                return $newKey."=".$value."\n".$before_key.$before_key_value."\n";
            }
            return $item;
        }, $file);
        $update_data = implode('', $newdata);
        file_put_contents($this->path, $update_data);
        return ['status' => true, 'message' => "The $newKey key has been added"];
    }
    
    
    public function add_key_after($newKey, $value, $after_key){
        if($newKey == null){
            return ["status" => false, "message" => "Set $newKey New Key Data Properly"];
        }elseif($after_key == null){
            return ["status" => false, "message" => "Set $after_key After Key Data Properly"];
        }elseif($this->env_key_check($newKey) == true){
            return ["status" => false, "message" => "This $newKey New Key Is Already Exists"];
        }elseif($this->env_key_check($after_key) == false){
            return ["status" => false, "message" => "This $after_key After Key Not Found"];
        }
        $file = file($this->path);
        $after_key_value = $this->env_key($after_key);
        $after_key = $after_key."=";
        $newdata = array_map(function($item) use ($newKey, $value, $after_key, $after_key_value){
            $find = stristr($item, $after_key);
            if($find){
                return $after_key.$after_key_value."\n".$newKey."=".$value."\n";
            }
            return $item;
        }, $file);
        $update_data = implode('', $newdata);
        file_put_contents($this->path, $update_data);
        return ['status' => true, 'message' => "The $newKey key has been added"];
    }
    
    public function add_key($key, $value){
        if($key == null){
            return ["status" => false, "message" => "Set $key Key Data Properly"];
        }elseif($this->env_key_check($key) == true){
            return ["status" => false, "message" => "This $key key is already exists"];
        }
        $file = file($this->path);
        array_push($file, $key."=".$value);
        $str_array = implode("", $file);
        file_put_contents($this->path, $str_array);
        return ['status' => true, 'message' => "The $key key has been added"];
    }
    
    
    public function remove_key($key){
        if($key == null){
            return ['status' => false, 'message' => "Set Key Data Properly"];
        }elseif($this->env_key_check($key) == false){
            return ['status' => false, 'message' => "This $key key is not found"];
        }
        $file = file($this->path);
        $newfile = [];
        foreach($file as $index => $item){
            if(!str_contains($item, $key."=")){
                array_push($newfile, $item);
            }
        }
        $str_array = implode("", $newfile);
        file_put_contents($this->path, $str_array);
        return ['status' => true, 'message' => "The $key key has been removed"];
    }

    public function env_array(){
        $file = file_get_contents($this->path);
        $text = explode(PHP_EOL, $file);
        $env_array = [];
        foreach($text as $key => $value){
            if($value != null){
                $newarray = explode("=", $value, 2);
                $key_str = $newarray[0];
                $key_val = $newarray[1] == null ? null : $newarray[1];
                $str_array = array($key_str => $key_val);
                $env_array = $env_array + $str_array;
            }
        }
        return $env_array;
    }

    public function env_key($key_search){
        $env_array = $this->env_array();
        if(array_key_exists($key_search, $env_array)){
            return $env_array[$key_search];
        }else{
            return null;
        }
    }
    
    public function env_key_check($key_search){
        $env_array = $this->env_array();
        if(array_key_exists($key_search, $env_array)){
            return true;
        }else{
            return false;
        }
    }

    public function env_file(){
        $file = file($this->path);
        return $file;
    }

    public function env_row_file(){
        $file = $this->env_file();
        $text = str_ireplace(PHP_EOL, "<br>", $file);
        return $text;
    }
}