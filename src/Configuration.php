<?php
namespace Jirkaa\Mailchimp;

use Nette;

class Configuration
{
	use Nette\SmartObject;

	public $apiKey;
	public $options;
	
	public function __construct($apiKey, array $options)
	{
		$this->apiKey = $apiKey;
		$this->options = $options;
	}
}