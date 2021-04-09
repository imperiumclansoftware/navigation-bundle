# Imperium Clan Software - Navigation Bundle

Navigation management for symfony


[![Build Status](https://api.travis-ci.com/imperiumclan/navigationbundle.svg?branch=master)](https://travis-ci.org/imperiumclan/navigationbundle)

This bundle provide Bootstrap Navigation bar configure in config files

## Installation


Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
composer require ics/navigation-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require ics/navigation-bundle
```

#### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    ICS\NavigationBundle\NavigationBundle::class => ['all' => true],
];
```

## Configuration

### Simple configuraton

```yaml

# config/packages/navigation.yaml

navigation:
  navbars:
    mainnav:
      brand: BrandText
      brandIcon: fa fa-check
      color: dark
      fixed: sticky
      searchenabled: true
      searchroute: homepage
      items:
        homepage:
          lib: homepage
          icon: fa fa-home
          route: homepage

  usermenu:
    activate: true
    connexionroute: homepage
    autolib: false
    childs:
      logout:
        lib: Sign-out
        icon: fa fa-sign-out
        route: homepage
```
And Add renderer in your base.html.twig

```twig
{# templates/base.html.twig #}

<body>
        {{ renderNavBar('mainnav') }}
```

## Full configuration

this is the full configuration with default value

```yaml

  navigation:
    usermenu:
      activate: false
      autolib: true
      lib: User Menu
      connexionlib: Sign In
      connexionicon : fa fa-sign-in-alt
      connexionroute: app-login
      childs:
        item1:
          lib: ''
          icon: ''
          route: ''
          roles: []
      navbars:
        navbar1: ''
          brand: ''
          brandRoute: homepage
          brandIcon: ''
          brandImage: ''
          type: navbar # navbar or sidebar
          searchenabled: false
          searchroute: search
          color: light # primary, secondary, success, danger, warning, info, light, dark, white, transparent
          fixed: none # none, top, bottom, sticky
          items:
            items1:
              lib: ''
              icon: ''
              route: ''
              roles: []
              childs:
                child1:
                  lib: ''
                  icon: ''
                  route: ''
                  roles: []

```

## License

This software is published under the MIT License