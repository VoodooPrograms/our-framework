 
## Fast, efficient, Yours
___
<div style="text-align: center">
<img src="./docs/banner.png" style="width: 300px; padding-top: 20px; padding-bottom: 20px">
</div>

___

### Meet Quetzal-framework: PHP framework to get your work done

#### Why Quetzal-framework?
+ **speed** - Quetzal is lightweight and every component of it get own job fast and get in done
+ **no dependencies** (*except Symphony/yaml)
+ **easy and fast configuration** 

___
___

## Table of contents:
+ <h3><a href="#ion">installation</a></h3>
+ <h3><a href="#hello_world">hello world</a></h3>
+ <h3><a href="#directory_structure">directories structure</a></h3>
+ <h3><a href="#configuration">configuration</a></h3>
+ <h3><a href="#http">HTTP</a></h3>
+ <h3><a href="#controllers">controllers</a></h3>
+ <h3><a href="#routing">routing</a></h3> 
+ <h3><a href="#ion">templates</a></h3>
+ <h3><a href="#ion">databases</a></h3>
+ <h3><a href="#ion">services</a></h3>
---
<h2 id="ion">Installation</h2>

### Requirements:
+ PHP ≥ 7.3
+ Composer 

### Download & run

```git clone https://github.com/VoodooPrograms/our-framework.git```

```composer create-project quetzal/quetzal-mvc```

___
<h2 id="hello_world">hello world</h2>
TBD

___
<h2 id="directory_structure">directory structure</h2>

```bash
.
├── Config
│   ├── env.yaml
│   ├── routing.yaml
│   └── settings.yaml
├── Core
├── index.php
├── User
│   ├── Controllers
│   ├── Models
│   └── Services
│   └── Templates
└── vendor

```
**description**:
+ `Config` - place where all configuration files are stored
+ `env.yaml` - environment variables
+ `routing.yaml` - routing table with all available paths
+ `settings.yaml` - main configuration fi e 
+ `Core` - heart of quetzal framework with all logic. Framework users don't have to bother what is there
+ `index.php` - runner of quetzal-mvc
+ `User` - place where all user dependend files are stored
+ `vendor` - composer related binaries
___
<h2 id="configuration">configuration</h2>
TBD

___
<h2 id="http">HTTP</h2>
TBD

___

<h2 id="controllers">controllers</h2>
TBD

___
<h2 id="routing">routing</h2>
The main porpuse of routing module is to run proper controller of given URL.

|Use case  	|expression  	|URL  	|
|-	|-	|-	|
|Explicit  	|```/blog/art```  	|```/blog/art```  	|
|Key-word  	|```/blog/art/{Number}``` <br> ```/blog/art/{String}``` 	| ```/blog/art/69``` <br> ```/blog/art/JohhnyBravo``` 	|
|Asterisk  	|```/blog/*``` <br> ```/blog/user/*```  	|```/blog/main``` <br> ```/blog/user/*```  	|
|Mixed  	|```/blog/page/{Number}/*```	|```/blog/page/69/since_ive_been_loving_u```  	|

## Example
What does it mean?

In the routing.yaml file we have routing section where we define our routes. Route name must be unique and should be descriptive. Every route has a path and action parameter. Path is responsible for matching correct url, when action job is to trigger correct action within a controller.


`routing.yaml`:
```
routing:
    homepage:
        path: /
        action: Ourframework\User\Controllers\SimpleController
    blog:
        path: /blog
        action: Ourframework\User\Controllers\BlogController
    blog_article:
        path: /blog/art
        action: Ourframework\User\Controllers\ArticleController
    blog_page:
        path: /blog/page/{Number}
        action: Ourframework\User\Controllers\ArticleController
    blog_page_string:
        path: /blog/page/{String}
        action: Ourframework\User\Controllers\ArticleController
    blog_mixed:
        path: /blog/art/*/{String}
        action: Ourframework\User\Controllers\ArticleController
```


___
External template engines

Currently supported **external** template engines in our framework:
- Twig
- Bladeone
- Smarty

## 1. Installation
| Engine Name 	|`settings.yaml`	| File Extension 	| Link 	|
|-	|-	|-	|- 	|
| Twig 	    |engine: ['twig']	|```.html.twig```	| https://twig.symfony.com/doc/2.x/intro.html 	|
| Bladone 	|engine: ['blade']	|```.blade.php```  	| https://github.com/EFTEC/BladeOne#install-pick-one-of-the-next-one 	|
| Smarty 	|engine: ['smarty']	|```.tpl```     	| https://www.smarty.net/quick_install 	|

<div style="border: 2px solid yellow; padding: 5px; display: inline-block; border-radius: 15px;">
<h3> Warning! </h3>
Correct file extensions are necessary to make templates working correctly
</div>

Composer is required to install all engines https://getcomposer.org/download/

*Twig installation
```
composer require "twig/twig:^2.0"
```


*Bladeone installation
```
composer require eftec/bladeone
```


*Smarty installation
```
composer require smarty/smarty
```



## 2. Configuration

To change template enging you should edit Config/settings.yaml file

`settings.yaml`:

```
template:
    engine: ['smarty'] # or twig, blade, smarty etc.
```

## 3.Examples

3.1 Twig
Controller Code

```
class TwigController extends Controller
{
    public function index(Request $request)
    {
        $name='Bob';
        $this->render('example_template.html.twig', ["name" => $name]);
    }
}
```
`example_template.html.twig`:

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <p>Hello {{name}}, welcome to Twig!</p>
</body>
</html>
```

3.2 Bladeone
Controller Code

```
class BladeoneController extends Controller
{
    public function index(Request $request)
    {
        $name='Bob';
        $this->run('example_template.blade.php', ["name" => $name]);
    }
}
```
`example_template.blade.php`:
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
   <p>Hello {{$name}}, welcome to Bladeone!</p>
</body>
</html>
```

4.3 Smarty
Controller Code

```
class SmartyController extends Controller
{
    public function index(Request $request)
    {
        $name='Bob';
        $this->display('example_template.tpl', ["name" => $name]);
    }
}
```
`example_template.tpl`:
```
Hello {$name}, welcome to Smarty!
```
___
___

## Developers section
+ ### Contributors
+ ### How to configure Quetzal?
+ ### How Quetzal works in depth
+ ### Testing 
+ ### License (MIT)
+ ### Future of features

## Contributors
https://github.com/aleksanderKuzmicz
https://github.com/bartq98
https://github.com/filip6464
https://github.com/dd0h
https://github.com/Flower35
https://github.com/r0jsik
