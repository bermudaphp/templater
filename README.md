# Install
```bash
composer require lobster-php/templater
````
# Usage
```php
$renderer = new Renderer(['app' => ['/dir/to/app']);
echo $renderer->render('app::posts', $posts);
````
 
