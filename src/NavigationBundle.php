<?php

namespace ICS\NavigationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
// use Symfony\Contracts\Service\ServiceSubscriberInterface;

/**
 * @package TestBundle
 */
class NavigationBundle extends Bundle
{
    public function build(ContainerBuilder $builder)
    {

    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}