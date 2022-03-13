[<img src="https://wavey.group/images/%20sweetalert-small.jpg" />](https://wavey.group)
[<img src="https://wavey.group/images/Ukraine.gif" />](https://ukraine.wavey.group)

Sweetalert is a package for Laravel that allows you to directly interact with SweetAlert. Initially created by uxweb, but now maintained and added support for the latest release of SweetAlert.

We will be releasing some custom alerts within this package in the future, and will continue to maintain the package for future releases of SweetAlert2.
## Installation

You can install the package via composer:

```bash
composer require wavey/sweetalert
```

You will then need to run the handy install command

```bash
php artisan sweetalert:install
```

This will publish the `sweetalert.blade.php` file into `resources/views/vendor/wavey/sweetalert.`

You will now need to require the SweetAlert2 package. The simplest way to achieve this is to include the CDN link, simply add the following link into your layouts.

```html
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

Once you have done this, you will need to include the blade file into your layouts, Inside your layout, add:

```html
@include('sweetalert::sweetalert')
```

Now, you are good to go! Check out the uage section to learn how to show alerts from your controllers.
## Usage

We have made Sweetalert very simple to use, firstly, include the library at the top of your controller:

```php
use Wavey\Sweetalert\Sweetalert;
```

Then, simply call the method you want, below is the methods we support currently:

```php
Sweetalert::basic('Description', 'Title');
Sweetalert::info('Description', 'Title');
Sweetalert::success('Description', 'Title');
Sweetalert::error('Description', 'Title');
Sweetalert::warning('Description', 'Title');
Sweetalert::message('Description', 'Title');
Sweetalert::message('Description <h2>Custom HTML</h2>', 'Title')->html();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
