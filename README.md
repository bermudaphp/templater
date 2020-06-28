# Install
```bash
composer require bermuda/templater
````
# Usage
```php
$renderer = new Renderer(['app' => ['/dir/to/app']);
echo $renderer->render('app::posts', $posts);
````
 
