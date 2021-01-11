<a href="https://github.com/MunnaAhmed/DotEnvEditor/issues"><img src="https://img.shields.io/github/issues/MunnaAhmed/DotEnvEditor"><a/>
<a href="https://github.com/MunnaAhmed/DotEnvEditor/network/members"><img src="https://img.shields.io/github/forks/MunnaAhmed/DotEnvEditor"><a/>
<a href="https://github.com/MunnaAhmed/DotEnvEditor/stargazers"><img src="https://img.shields.io/github/stars/MunnaAhmed/DotEnvEditor"><a/>
<a href="https://packagist.org/packages/munna/dot-env-editor"><img src="https://img.shields.io/github/license/MunnaAhmed/DotEnvEditor"><a/>


# Dot Env Editor
Laravel .env File Moderator

## Installing DotEnvEditor

Next, run the Composer command to install the latest stable version:

```bash
composer require munna/dot-env-editor
```


##After installing, you should follow these two step:

Add this provider link at your config/app.php file into the providers array.
```php
Munna\DotEnvEditor\DotEnvEditorServiceProvider::class,
```

And  

Add this facades link at your config/app.php file into the aliases array.
```php
'DotEnvEditor' => Munna\DotEnvEditor\Facades\DotEnvEditor::class,
```

## Create A Class Instance

to create a class instance 
```php
use Munna\DotEnvEditor\DotEnvEditor;
$env = new DotEnvEditor();
$env->env_array();
// Use this class as your demand.
```

## You can use direct
When you are already set the facade class into your aliases array at the config/app.php file.
```php
use DotEnvEditor;
$env_array = DotEnvEditor::env_array();
// Example
```

## Get The All Variable As Array
```php
use DotEnvEditor;
$env_array = DotEnvEditor::env_array();
```

## Get The Key Value
```php
use DotEnvEditor;
$key = "APP_NAME";
$key_val = DotEnvEditor::env_key($key);
```

## Check The Key Is Exists or Not
```php
use DotEnvEditor;
$key = "APP_NAME";
$key_check = DotEnvEditor::env_key_check($key);
```

## Add a new key
```php
use DotEnvEditor;
$key = "NEW_KEY";
$value = "NEW_VALUE"; // or 1254 or https://www.domain.com
$add_key = DotEnvEditor::add_key($key, $value);
```

## Add a new key after any one of existing key
```php
use DotEnvEditor;
$key = "NEW_KEY";
$value = "NEW_VALUE";
$existing_key = "EXISTING_KEY";
$add_key_after = DotEnvEditor::add_key_after($key, $value, $existing_key);
```

## Add a new key before any one of existing key
```php
use DotEnvEditor;
$key = "NEW_KEY";
$value = "NEW_VALUE";
$existing_key = "EXISTING_KEY";
$add_key_before = DotEnvEditor::add_key_before($key, $value, $existing_key);
```

## Update the existing key
```php
use DotEnvEditor;
$key = "EXISTING_KEY";
$value = "NEW_VALUE";
$update_key = DotEnvEditor::update_key($key, $value);
```

## Update multiple existing key
```php
$array = [
    "APP_NAME" => "TEST_LARAVEL_APP",
    "MAIL_USERNAME" => "TEST_MAIL_USERNAME",
    "MAIL_PASSWORD" => "TEST_MAIL_PASSWORD",
];
$env = DotEnvEditor::update_multiple_key($array);
return $env;
```

## Remove the existing key
```php
use DotEnvEditor;
$key = "EXISTING_KEY";
$remove_key = DotEnvEditor::remove_key($key);
```


## Full Env File As An Indexing Array
```php
use DotEnvEditor;
$env_array = DotEnvEditor::env_file();
```

## Env Row File As String
```php
use DotEnvEditor;
$env_row_file = DotEnvEditor::env_row_file();
```

## License
This package is open-sources and licensed under the [MIT license](https://opensource.org/licenses/MIT).

Thank you very much. Please give a star.

