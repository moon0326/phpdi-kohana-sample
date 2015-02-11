## PHP-DI with Kohana Sample Project

This is a day hack (few hours actually) project to see how one can use a 3rd party IoC container in a container-less framework (Kohana).

> This project isn't production ready. This is just for demonstration.

The goals of this project are

1. How easy it is to add a container to a framework.
2. Where to compose all the dependencies (Composition Root).
3. Constructor injection.


#### Preparation

Since PHP-DI uses [Composer](https://getcomposer.org/), you need to use it. If you don't have a Composer yet, please visit this [link](https://getcomposer.org/doc/00-intro.md) for installation guide. You're already late to the party.

Place a **composer.json** file in your root directory and add the following content.

```json
{
    "require": {
        "mnapoli/php-di": "~4.0"
    }
}
```

Open your console and run ```composer install```. 

Open **modules/application/bootstrap.php** file and add ```require_once ROOT . "/vendor/autoload.php";``` right below ```ini_set('unserialize_callback_func', 'spl_autoload_call');```

#### Installing Kohana Module

1. Download/Clone this repository to your modules directory
2. Enable *phpdi* module by adding the following line to your **bootstrap.php**

```php
'phpdi' => MODPATH . 'phpdi'
```

#### Dependency Configuration

You can define your dependencies in **phpdi/config/dependencies.php**. For more about service definiton formats, please refer to this [link](http://php-di.org/doc/definition.html) and PHP-DI documentation.

#### Sample Controller and Classes

Please refer to [this](http://) project for a sample controller and dependency.

#### Changes

This module is fairly simple. It overrides two Kohana system classes -- **Kohana_Request_Client_Internal** and **Koahana_Controller**

Kohana creates an instance of a controller in **Kohana_Request_Client_Internal** and then execute an action method on the controller. This is a good Composition Root candidate since this is an entry point of our application. See the changes for ```execute_request(Request $request, Responser $response)``` method in the file.

Constructor from the **Kohana_Controller** has been removed since it's meaningless. **Request** and **Response** are being required to construct the class, but they're just public properties.