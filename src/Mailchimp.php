<?php
namespace Jirkaa\Mailchimp;

use Nette;

class Mailchimp
{
	use Nette\SmartObject;

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