# navigation-bundle
Navigation management for symfony

# Imperium Clan - Navigation Bundle
[![Build Status](https://api.travis-ci.com/imperiumclan/navigationbundle.svg?branch=master)](https://travis-ci.org/imperiumclan/navigationbundle)

This bundle provide Bootstrap Navigation bar configure in config files

## Installation

Navigation Bundle requires PHP 7.2 or higher and Symfony 4.4 or higher. Run the following command to install it in your application:

```
$ composer require imperiumclan/navigation-bundle
```

## Documentation

### Configuration

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


## License

This software is published under the MIT License