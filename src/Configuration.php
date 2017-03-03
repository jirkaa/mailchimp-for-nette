<?php
namespace Jirkaa\Mailchimp;

use Nette\Object;

class Configuration extends Object
{
	public $apiKey;
	public $options;
	
	public function __construct($apiKey, array $options)
	{
		$this->apiKey = $apiKey;
		$this->options = $options;
	}
}