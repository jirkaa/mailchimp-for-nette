<?php
namespace Jirkaa\Mailchimp;


class Api extends \Mailchimp
{
	public function __construct(Configuration $config)
	{
		parent::__construct($config->apiKey, $config->options);
	}
	
}