# aBillander Web Installer Package

_Note: If you are looking for an installable version of aBillander, [check the releases here](https://github.com/aBillander/aBillander/releases)._

## Creating an installable version

In the root folder of the [main project](https://github.com/aBillander/aBillander) run composer install to generate vendor files (installer package is already in composer.json):

```bash
composer install
```

The package will automatically register itself and the installation wizard will appear on the first visit.

## License

The aBillander software is open-sourced software licensed under the [MIT license](LICENSE.md).
