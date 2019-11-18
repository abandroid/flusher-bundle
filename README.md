# Flusher Bundle

*By [endroid](https://endroid.nl/)*

[![Latest Stable Version](http://img.shields.io/packagist/v/endroid/flusher-bundle.svg)](https://packagist.org/packages/endroid/flusher-bundle)
[![Build Status](https://github.com/endroid/flusher-bundle/workflows/CI/badge.svg)](https://github.com/endroid/flusher-bundle/actions)
[![Total Downloads](http://img.shields.io/packagist/dt/endroid/flusher-bundle.svg)](https://packagist.org/packages/endroid/flusher-bundle)
[![Monthly Downloads](http://img.shields.io/packagist/dm/endroid/flusher-bundle.svg)](https://packagist.org/packages/endroid/flusher-bundle)
[![License](http://img.shields.io/packagist/l/endroid/flusher-bundle.svg)](https://packagist.org/packages/endroid/flusher-bundle)

This bundle integrates the [endroid/flusher library](https://github.com/endroid/Flusher)
in Symfony. It provides the following features.

* Optional replacement your default entity manager with the FlusherEntityManager
* Configuration of the step size used when determining the optimal batch size
* Injection of the Flusher or the FlusherEntityManager anywhere in your application

## Installation

Use [Composer](https://getcomposer.org/) to install the library. Symfony Flex
will set up the configuration and routing for you.

``` bash
$ composer require endroid/flusher-bundle
```

## Configuration

You can configure the bundle to override the default entity manager with the
FlusherEntityManager, disable the flusher inside the entity manager or use
your own step size increment during dynamic batch size detection.

```yaml
endroid_flusher:
    override_default_entity_manager: false
    disable_entity_manager_flusher: false
    step_size: 1.5
```

## Versioning

Version numbers follow the MAJOR.MINOR.PATCH scheme. Backwards compatibility
breaking changes will be kept to a minimum but be aware that these can occur.
Lock your dependencies for production and test your code when upgrading.

## License

This source code is subject to the MIT license bundled in the file LICENSE.