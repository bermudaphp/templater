# Install
```bash
composer require bermudaphp/templater
````
# Usage
```php
$renderer = new Renderer(['app' => ['/dir/to/app']);
echo $renderer->render('app::posts', compact($posts));
````
 
