<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.zdjKxip' shared service.

return $this->privates['.service_locator.zdjKxip'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'bookRepository' => ['privates', 'App\\Repository\\AuthorRepository', 'getAuthorRepositoryService.php', true],
], [
    'bookRepository' => 'App\\Repository\\AuthorRepository',
]);
