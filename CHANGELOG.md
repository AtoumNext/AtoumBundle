5.0.0 - Unreleased
=====

## Breaking Changes

* Package renamed from `atoum/atoum-bundle` to `atoum-next/atoum-bundle`
* Now depends on `atoum-next/atoum` (`^5.0`) instead of the archived `atoum/atoum`
* Minimum requirements raised: **PHP 8.2+**, **Symfony 7.4 or 8.0+**
  (`symfony/*` constraints are now `^7.4 || ^8.0` instead of the unbounded `>=7`)
* Symfony Flex recipes moved to `recipes/atoum-next/atoum-bundle/` (new `5.0` recipe)

The PHP namespace of the bundle is unchanged (`atoum\AtoumBundle\`), mirroring
`atoum-next/atoum` which keeps the `atoum\atoum\` namespace and only `replace`s
the former `atoum/atoum` / `mageekguy/atoum` packages.

## Symfony 8 compatibility

* `DependencyInjection\AtoumExtension` now loads services from
  `Resources/config/services/configuration.php` via `PhpFileLoader`; the XML
  loader (`configuration.xml` / `XmlFileLoader`) was removed as it no longer
  exists in `symfony/dependency-injection` 8.
* `Test\Units\CommandTestCase` uses `Application::addCommand()` instead of the
  removed `Application::add()`.

## atoum-next 5 compatibility

* Return types added to method overrides to match the now fully typed atoum API:
  `Test\Units\Test::setAssertionManager()`, `Test\Asserters\Crawler::setWith()`,
  `Test\Asserters\Response::setWith()`, `Test\Asserters\Element::isEmpty()`.
* `phpstan/AtoumDynamicReturnTypeExtension` now targets `atoum\atoum\test`
  (the `mageekguy\atoum` alias is gone in atoum-next 5).
* `Scripts\Runner::loop()` null-guards the now-nullable `$cli` / `$argumentsParser`.

## Tooling

* GitHub Actions CI (`.github/workflows/ci.yml`) replaces the obsolete
  `.travis.yml`: atoum suite on PHP 8.2–8.5 × Symfony 7.4/8.0 (highest & lowest),
  plus PHPStan and PHP-CS-Fixer jobs.
* PHPStan bumped to `^2.1` + `phpstan/phpstan-symfony ^2.0` (Symfony 8 aware);
  analysis is clean at level 8. Rector config updated for `rector/rector` 2.x.

3.0.0 - 2025-10-14
=====

## Breaking Changes

* Symfony 7+ compatibility - Minimum PHP version: 8.1
* Migrated from PSR-0 to PSR-4 autoloading
* `ContainerAwareCommand` replaced with `Command` using dependency injection
* `Client` replaced with `KernelBrowser` in WebTestCase
* Commands now use constructor injection instead of container access
* `getRootDir()` replaced with `getProjectDir()`
* Return type declarations added to all methods
* Modern PHP 8+ syntax (typed properties, union types, etc.)

## Improvements

* **New:** `--directory` option for modern Symfony 7+ testing approach
  - Test any directory directly without bundle configuration
  - `bin/console atoum --directory=src/Tests`
  - `bin/console atoum --directory=tests`
  - Multiple directories supported: `--directory=tests/Unit --directory=tests/Integration`
  - Full backward compatibility with bundle-based testing
* Better type safety with full return type declarations
* Service autowiring support
* Console command attributes (`#[AsCommand]`) support
* Modernized code following Symfony 7 best practices
* PHPStan level 6 compliance (0 errors)
* PHP-CS-Fixer and Rector integration for code quality

2.0.0 - 2017-07-19
=====

## Bugfix

* [#110](https://github.com/atoum/AtoumBundle/pull/110) Rename reserved "object" to "phpObject" ([@NiniGeek])

1.6.0
=====

* [#107](https://github.com/atoum/AtoumBundle/pull/107) Add debug option ([@jdecool])

1.5.0
===========

* [#106](https://github.com/atoum/AtoumBundle/pull/106) Add debug option ([@Djuuu])
* [#105](https://github.com/atoum/AtoumBundle/pull/105) Add phpDoc on Test and WebTest classes ([@maxailloud])
* [#104](https://github.com/atoum/AtoumBundle/pull/104) Add loop mode support ([@Djuuu])
* [#103](https://github.com/atoum/AtoumBundle/pull/103) Improve compatibility with Symfony 3 ([@lolautruche])
* [#100](https://github.com/atoum/AtoumBundle/pull/100) Add option to display a light report ([@gpaton])

1.4.1
=====

## Bugfix

* [#98](https://github.com/atoum/AtoumBundle/pull/98) Fix atoum command exit codes ([@jubianchi])

1.4.0
=====

* Symfony3 compatibility
* Minimum version of Symfony : 2.3
* Minimum version of atoum : 2.1

1.3.0
=====

* Add xunit and clover report file options

1.2.1
=====

* 1.2.X depends on atoum < 2.4

1.2.0
=====

* Adds the ability to test Symfony commands (see `atoum\AtoumBundle\Test\Units\CommandTestCase`)

1.1.0
=====

  * Add command to launch tests on bundles.
  * Add fluent interface for controllers testing
  * Add support for Faker (https://github.com/fzaninotto/Faker)
  * Compatibility break
      * static $kernel variable become a class variable
      * AtoumBundle\Test\Units\Test::getRandomString() and AtoumBundle\Test\Generator\String were removed
  * Add two annotations to enable/disable kernel reset in tests : @resetKernel and @noResetKernel
  * Compatibility improvement with symfony/dom-crawler 2.3 and 2.4

1.0.0 (2012)
============

  * Move the bundle to atoum vendor namespace
  * Add ControllerTest class

[@jubianchi]: https://github.com/jubianchi
[@Djuuu]: https://github.com/Djuuu
[@lolautruche]: https://github.com/lolautruche
[@gpaton]: https://github.com/gpaton
[@maxailloud]: https://github.com/maxailloud
[@jdecool]: https://github.com/jdecool
[@NiniGeek]: https://github.com/NiniGeek
