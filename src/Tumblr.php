<?php

/*
 * "THE BEER-WARE LICENSE" (Revision 42):
 * Jaap Broekhuizen <jaapz.b@gmail.com> wrote this file. As long as you retain 
 * this notice you can do whatever you want with this stuff. If we meet some 
 * day, and you think this stuff is worth it, you can buy me a beer in return.
 */


/**
 * This exception will be thrown when the API returns an error code.
 */
class TumblrException extends \Exception { }


class Tumblr
{
	protected $apiKey;
	protected $oauthToken;
	
	protected $host = 'http://api.tumblr.com/v2';

	protected $methods = array(
        'info' => array(
        	'uri' => '/blog/%s/info',
        	'auth' => 'api_key',
        	'method' => 'get'
        ),
        'followers' => array(
        	'uri' => '/blog/%s/followers',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'posts' => array(
        	'uri' => '/blog/%s/posts',
        	'auth' => 'api_key',
        	'method' => 'get'
        ),
        'queue' => array(
        	'uri' => '/blog/%s/posts/queue',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'drafts' => array(
        	'uri' => '/blog/%s/posts/draft',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'submissions' => array(
        	'uri' => '/blog/%s/posts/submission',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'create_post' => array(
        	'uri' => '/blog/%s/post',
        	'auth' => 'oauth',
        	'method' => 'post'
        ),
        'edit_post' => array(
        	'uri' => '/blog/%s/post/edit',
        	'auth' => 'oauth',
        	'method' => 'post'
        ),
        'reblog_post' => array(
        	'uri' => '/blog/%s/post/reblog',
        	'auth' => 'oauth',
        	'method' => 'post'
        ),
        'delete_post' => array(
        	'uri' => '/blog/%s/post/delete',
        	'auth' => 'oauth',
        	'method' => 'post'
        ),
        'dashboard' => array(
        	'uri' => '/user/dashboard',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'likes' => array(
        	'uri' => '/user/likes',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'following' => array(
        	'uri' => '/user/following',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'follow' => array(
        	'uri' => '/user/follow',
        	'auth' => 'oauth',
        	'method' => 'post'
        ),
        'unfollow' => array(
        	'uri' => '/user/unfollow',
        	'auth' => 'oauth',
        	'method' => 'get'
        ),
        'info_user' => array(
        	'uri' => '/user/info',
        	'auth' => 'oauth',
        	'method' => 'get'
        )
	);

	/**
	 * Get high level info for a particular blog.
	 *
	 * @param string $baseHostname Name of the blog, for example jaapz.tumblr.com
	 */
	public function getBlogInfo($baseHostname)
	{
		// Prepare fetch url.
		$info = $this->getMethodInfo('info');
		$url = $this->prepareApiKeyUrl($info['uri'], $baseHostname);

		// Get data.
		$curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		curl_close($curl);

		$responseData = json_decode($response);

		// Check for errors.
		if (200 !== $responseData->meta->status)
		{
			throw new TumblrException(
				$responseData->meta->msg, 
				$responseData->meta->status
			); 
		}

		return json_decode($response);
	}

	/**
	 * Set the API key for methods that require api_key authentication.
	 * 
	 * @param string $apiKey
	 */
	public function setApiKey($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	/**
	 * Get the API key.
	 *
	 * @return string
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * Set the OAuth token for methods that require authentication through OAuth.
	 *
	 * @param string $oauthToken
	 */
	public function setOauthToken($token)
	{
		$this->oauthToken = $token;
	}

	/**
	 * Get the OAuth token.
	 *
	 * @return string
	 */
	public function getOauthToken()
	{
		return $this->oathToken;
	}

	/**
	 * Get tumblr host.
	 *
	 * @return string
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * Get an array with info for a particular API method.
	 *
	 * @return array
	 */
	protected function getMethodInfo($methodName)
	{
		return $this->methods[$methodName];
	}

	/**
	 * Prepare an API key url.
	 *
	 * @param string $uri
	 * @param string $blog
	 */
	protected function prepareApiKeyUrl($uri, $blog)
	{
		$return = $this->getHost();

		// Add blogname.
		$return .= str_replace('%s', $blog, $uri);

		// Add api key.
		$apiKey = $this->getApiKey();
		if (strlen($apiKey) == 0)
		{
			return new TumblrException('No API key given');
		}

		$return .= '?api_key='.$apiKey;

		return $return;
	}
}
