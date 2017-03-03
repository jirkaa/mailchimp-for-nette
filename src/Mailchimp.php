<?php
namespace Jirkaa\Mailchimp;

use Nette\Object;

class Mailchimp extends Object
{
	/** @var Api */
	private $api;
	
	public function __construct(Api $api)
	{
		$this->api = $api;
	}
	
	/**
	 * @return Api
	 */
	public function getApi()
	{
		return $this->api;
	}
}