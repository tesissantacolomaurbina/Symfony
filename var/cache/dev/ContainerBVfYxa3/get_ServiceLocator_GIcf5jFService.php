<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.gIcf5jF' shared service.

return $this->privates['.service_locator.gIcf5jF'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'bookRepository' => ['privates', 'App\\Repository\\BookRepository', 'getBookRepositoryService.php', true],
], [
    'bookRepository' => 'App\\Repository\\BookRepository',
]);
