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

<table>
  <tr>
    <th>Name</th>
    <th>Url</th>
    <th>Auth method</th>
    <th>Method</th>
  </tr>
  <tr>
    <td>blogInfo</td>
    <td>/blog/%s/info</td>
    <td>API Key</td>
    <td>get</td>
  </tr>
  <tr>
    <td>followers</td>
    <td>/blog/%s/followers</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>posts</td>
    <td>/blog/%s/posts</td>
    <td>API Key</td>
    <td>get</td>
  </tr>
  <tr>
    <td>queue</td>
    <td>/blog/%s/posts/queue</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>drafts</td>
    <td>/blog/%s/posts/draft</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>submissions</td>
    <td>/blog/%s/posts/submissions</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>createPost</td>
    <td>/blog/%s/post</td>
    <td>OAuth</td>
    <td>post</td>
  </tr>
  <tr>
    <td>editPost</td>
    <td>/blog/%s/post/edit</td>
    <td>OAuth</td>
    <td>post</td>
  </tr>
  <tr>
    <td>reblogPost</td>
    <td>/blog/%s/post/reblog</td>
    <td>OAuth</td>
    <td>post</td>
  </tr>
  <tr>
    <td>deletePost</td>
    <td>/blog/%s/post/delete</td>
    <td>OAuth</td>
    <td>post</td>
  </tr>
  <tr>
    <td>dashboard</td>
    <td>/user/dashboard</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>likes</td>
    <td>/user/likes</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>following</td>
    <td>/user/following</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>follow</td>
    <td>/user/follow</td>
    <td>OAuth</td>
    <td>post</td>
  </tr>
  <tr>
    <td>unfollow</td>
    <td>/user/unfollow</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
  <tr>
    <td>userInfo</td>
    <td>/user/info</td>
    <td>OAuth</td>
    <td>get</td>
  </tr>
</table>

License
=======

```
"THE BEER-WARE LICENSE" (Revision 42):
Jaap Broekhuizen <jaapz.b@gmail.com> wrote this file. As long as you retain this 
notice you can do whatever you want with this stuff. If we meet some day, and 
you think this stuff is worth it, you can buy me a beer in return.
```
