<?php
namespace Jirkaa\Mailchimp\DI;

use Jirkaa\Mailchimp\Api;
use Jirkaa\Mailchimp\Configuration;
use Jirkaa\Mailchimp\Mailchimp;
use Nette\Configurator;
use Nette\DI\Compiler;
use Nette\DI\CompilerExtension;
use Nette\Utils\Validators;

class MailchimpExtension extends CompilerExtension
{
	public $defaults = [
		'apiKey' => NULL,
		'options' => []
	];
	
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		
		$config = $this->getConfig($this->defaults);
		Validators::assert($config['apiKey'], 'string:36..', 'Mailchimp API key');
		Validators::assert($config['options'], 'array', 'Mailchimp API options');
		
		$builder->addDefinition($this->prefix('config'))
			->setClass(Configuration::class)
			->setArguments([$config['apiKey'], $config['options']])
			->setInject(FALSE);
		
		$builder->addDefinition($this->prefix('api'))
			->setClass(Api::class)
			->setInject(FALSE);
		
		$builder->addDefinition($this->prefix('client'))
			->setClass(Mailchimp::class)
			->setInject(FALSE);
	}
	
	/**
	 * @param Configurator $configurator
	 */
	
	public static function register(Configurator $configurator)
	{
		$configurator->onCompile[] = function ($config, Compiler $compiler) {
			$compiler->addExtension('mailchimp', new MailchimpExtension());
		};
	}
}