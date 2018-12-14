# ovh-logs-bundle

[![build status](https://travis-ci.org/chaplean/ovh-logs-bundle.svg?branch=master)](https://travis-ci.org/chaplean/ovh-logs-bundle)
[![coverage status](https://coveralls.io/repos/github/chaplean/ovh-logs-bundle/badge.svg?branch=master)](https://coveralls.io/github/chaplean/ovh-logs-bundle?branch=master)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/chaplean/ovh-logs-bundle/issues)

This bundle adds support for sending your logs to OVH's graylog endpoint.

## Table of content

* [Installation](#Installation)
* [Configuration](#Configuration)
* [Versioning](#Versioning)
* [Contributing](#Contributing)
* [Hacking](#Hacking)
* [License](#License)

## Installation

This bundle requires at least Symfony 3.0.

You can use [composer](https://getcomposer.org) to install ovh-logs-bundle:
```bash
composer require chaplean/ovh-logs-bundle
```

Then add to your AppKernel.php:

```php
new Chaplean\Bundle\OvhLogsBundle\ChapleanOvhLogsBundle(),
```

## Configuration

First you must create some parameters.

parameters.yml:
```yaml
parameters:
    ovh_logs.hostname: hostname                             # required
    ovh_logs.port:     12201                                # optional, defaults to 12201
    ovh_logs.token:    01234567-89ab-cdef-0123-456789abcdef # required
```

The bundle configuration consists of two files:
  * `ovh.yml`: the real declaration of the `ovh` logger. Import this in the environment were you want to send logs to OVH (`config_prod.yml` if only prod, `config.yml` for all environments).
  * `config.yml`: declares a stub `ovh` logger. The logger must be defined in every environment, this is usefull to import in `config.yml` to make sure every environment declares it.

For example if you want to send logs to OVH only in production.

config.yml:
```yaml
imports:
    - { resource: '@ChapleanOvhLogsBundle/Resources/config/config.yml' }
```

config_prod.yml:
```yaml
imports:
    - { resource: '@ChapleanOvhLogsBundle/Resources/config/ovh.yml' }
```

Optionally if you want to override the default log level, redefine the `level` key of the `ovh` handler.

```yaml
monolog:
    handlers:
        ovh:
            level: debug # defaults to info
```

## Versioning

ovh-logs-bundle follows [semantic versioning](https://semver.org/). In short the scheme is MAJOR.MINOR.PATCH where
1. MAJOR is bumped when there is a breaking change,
2. MINOR is bumped when a new feature is added in a backward-compatible way,
3. PATCH is bumped when a bug is fixed in a backward-compatible way.

Versions bellow 1.0.0 are considered experimental and breaking changes may occur at any time.

## Contributing

Contributions are welcomed! There are many ways to contribute, and we appreciate all of them. Here are some of the major ones:

* [Bug Reports](https://github.com/chaplean/ovh-logs-bundle/issues): While we strive for quality software, bugs can happen and we can't fix issues we're not aware of. So please report even if you're not sure about it or just want to ask a question. If anything the issue might indicate that the documentation can still be improved!
* [Feature Request](https://github.com/chaplean/ovh-logs-bundle/issues): You have a use case not covered by the current api? Want to suggest a change or add something? We'd be glad to read about it and start a discussion to try to find the best possible solution.
* [Pull Request](https://github.com/chaplean/ovh-logs-bundle/pulls): Want to contribute code or documentation? We'd love that! If you need help to get started, GitHub as [documentation](https://help.github.com/articles/about-pull-requests/) on pull requests. We use the ["fork and pull model"](https://help.github.com/articles/about-collaborative-development-models/) were contributors push changes to their personnal fork and then create pull requests to the main repository. Please make your pull requests against the `master` branch.

As a reminder, all contributors are expected to follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## Hacking

You might find the following commands usefull when hacking on this project:

```bash
# Install dependencies
composer install

# Run tests
bin/phpunit
```

## License

ovh-logs-bundle is distributed under the terms of the MIT license.

See [LICENSE](LICENSE.md) for details.
