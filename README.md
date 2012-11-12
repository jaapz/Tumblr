Tumblr
======

A simple to use Tumblr API wrapper for PHP. This uses the Tumblr API v2.

Usage
=====

Just instantiate a new API instance, set oauth token and/or api key, and then
call the method on the API instance.

For example you'll get the information on a certain blog like this:

```php
// Instantiate a new Tumblr API instance.
$api = new Tumblr();

// Set API key.
$api->setApiKey(*** YOUR API KEY ***);

// Get blog information.
$info = $api->blogInfo('jaapz.tumblr.com');
var_dump($info);
```

Available methods
=================

TODO

License
=======

```
"THE BEER-WARE LICENSE" (Revision 42):
Jaap Broekhuizen <jaapz.b@gmail.com> wrote this file. As long as you retain this 
notice you can do whatever you want with this stuff. If we meet some day, and 
you think this stuff is worth it, you can buy me a beer in return.
```
