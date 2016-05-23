# Final "Calidad de Software"

[![Build Status](https://travis-ci.org/KacosPro/buses-mayab.svg?branch=master)](https://travis-ci.org/KacosPro/buses-mayab)
[![Documentation Status](https://readthedocs.org/projects/buses-mayab/badge/?version=latest)](http://buses-mayab.readthedocs.io/en/latest/?badge=latest)

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar install`.

If Composer is installed globally, run
```bash
composer install
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

Set up the database skeleton, run
```bash
/path/to/project/bin/cake migrations migrate
```

Seed the database, run
```bash
/path/to/project/bin/cake migrations seed
```
