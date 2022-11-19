<p align="center">
  <a href="https://wavey.group/packages/sweetalert">
    <img alt="Sweetalerts" src="https://i.imgur.com/UVnxkCl.png">
  </a>
  <br>
  <a href="https://img.shields.io/packagist/v/wavey/sweetalert">
    <img src="https://img.shields.io/packagist/v/wavey/sweetalert">
  </a>
  <a href="https://img.shields.io/github/checks-status/waveygroup/sweetalert/master">
    <img src="https://img.shields.io/github/checks-status/waveygroup/sweetalert/master">
  </a>
<a href="https://img.shields.io/packagist/stars/wavey/sweetalert">
    <img src="https://img.shields.io/packagist/stars/wavey/sweetalert">
  </a>
  <a href="https://img.shields.io/github/issues/waveygroup/sweetalert">
    <img src="https://img.shields.io/github/issues/waveygroup/sweetalert">
  </a>
    <a href="https://img.shields.io/packagist/dependency-v/wavey/sweetalert/php">
    <img src="https://img.shields.io/packagist/dependency-v/wavey/sweetalert/php">
  </a>
      <a href="https://img.shields.io/github/license/waveygroup/sweetalert">
    <img src="https://img.shields.io/github/license/waveygroup/sweetalert">
  </a>
</p>
<p align="center">
  <b>Sweetalerts</b> is an Laravel implementation of the much loved <a href="https://sweetalert2.github.io/">Sweetalerts 2</a> package. Show your users some beautiful alerts when actions are performed in your Laravel application with some handy helpers.
</p>

## ⚡️ Quickstart

Install Sweetalert through composer and run our installer.
```shell
composer require wavey/sweetalert && php artisan sweetalert:install
```

Include the Sweetalert2 javascript and then include our sweetalert 2 components.
```php
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::sweetalert')
```


## 📖 Usage

Before using Sweetalerts, you will need to include the sweetalert facade at the top of your controllers:
```php
use Wavey\Sweetalert\Sweetalert;
```

Now you should have access to the `Sweetalert` facade inside your controllers. Their is many varients of the alerts you can use:
```php
Sweetalert::basic('Description', 'Title');
Sweetalert::info('Description', 'Title');
Sweetalert::success('Description', 'Title');
Sweetalert::error('Description', 'Title');
Sweetalert::warning('Description', 'Title');
Sweetalert::message('Description', 'Title');
Sweetalert::message('Description <h2>Custom HTML</h2>', 'Title')->html();
```

## ⚠️ Limitations
* Currently this package doesn't work as expected from inside Livewire components, we are working on a fix for this and will be inside a later release.                                                                                                      |
  

## 👍 Contribute

If you want to say **thank you** and/or support the active development of `Sweetalerts`:

1. Add a [GitHub Star](https://github.com/waveygroup/sweetalert/stargazers) to the project.
2. Tweet about the project on your twitter.
3. Write a review or tutorial on [Medium](https://medium.com/), [Dev.to](https://dev.to/) or personal blog.
4. Support the project by pleding through [GitHub](https://github.com/sponsors/waveygroup).
   
## 🛡️ Security Vulnerabilities

Please review our [security policy](https://github.com/waveygroup/sweetalert/security/policy) on how to report security vulnerabilities.

## ⚠️ License

Copyright (c) 2022-present [Wavey Group](https://github.com/waveygroup) and [Contributors](https://github.com/waveygroup/sweetalert/graphs/contributors). `Sweetalert` is free and open-source software licensed under the [MIT License](https://github.com/waveygroup/sweetalert/blob/master/LICENSE.md).