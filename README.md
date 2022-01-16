<div id="top"></div>
<br />
<div align="center">
  <a href="https://wavey.group">
    <img src="https://i.imgur.com/R4ewQAM.png" alt="Sweetalert Logo" height="80">
  </a>

<h3 align="center">🟣 SweetAlert2 Support for Laravel</h3>

  <p align="center">
    Add beautiful alerts by <a href="https://sweetalert2.github.io/">SweetAlert</a> directly into your Laravel 
application, with a simple setup, and handly helpers.
    <br />
    <a href="https://sweetalert.wavey.group">View Demo</a>
    ·
    <a href="https://github.com/waveygroup/sweetalert/issues">Report Bug</a>
    ·
    <a href="https://github.com/waveygroup/sweetalert/issues">Request Feature</a>
  </p>
</div>

<div align="center">

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
[![Twitter][twitter-shield]][twitter-url]
</div>


<!-- ABOUT THE PROJECT -->

## About Sweetalert

Sweetalert is a package for Laravel that allows you to directly interact with <a href='https://sweetalert2.github. io/'>
SweetAlert</a>. Initially created by <a href='https://github.com/uxweb'>uxweb</a>, but now maintained and added support
for the latest release of SweetAlert.

We will be releasing some custom alerts within this package in the future, and will continue to maintain the package for
future releases of SweetAlert2.

<p align="right">(<a href="#top">back to top</a>)</p>


<!-- GETTING STARTED -->

## Getting Started

``wavey/sweetalert`` is really simple to set up, If you are familiar with Composer & Laravel, you will most likely know
what to do already, however, follow the guide below to get the alerts working and help you make your application look
stunning.

### Installation

Firstly, require the package into your application through composer using the following command:

```bash
composer require wavey/sweetalert
```

Once you have completed this, run the installer:

```bash
php artisan sweetalert:install
```

This will publish the `sweetalert.blade.php` file into `resources/views/vendor/wavey/sweetalert`.

You will now need to require the SweetAlert2 package. The simplest way to achieve this is to include the CDN link,
simply add the following link into your layouts.

```html

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

Once you have done this, you will need to include the blade file into your layouts, Inside your layout, add:

```php
@include('sweetalert::sweetalert')
```

Now, you are good to go! Check out the uage section to learn how to show alerts from your controllers.

### Through NPM

if you don't want to use the CDN link, you can also include the SweetAlert2 library through NPM.

##### Install from command line:

If you want to install from your command line, run the following command:

```bash
npm install sweetalert2
```

Then you need to include the library into your javascript, do the following:

```javascript
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

// CommonJS
const Swal = require('sweetalert2')
```

Now compile your assets and include your main javascript file into your views, and you are good to go!

##### Install from install command (WIP):

You can also install the NPM package through our install command. When installing the package, run the following command
instead:

```bash
php artisan sweetalert:install --npm
```

This command will install the NPM package and include inside `resources/js/app.js` and then run `npm run dev` to compile
your assets.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->

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

We will be releasing support for Toast notifications too, along with some custom alert helpers in the coming releases.

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any
contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also
simply open an issue with the tag "enhancement". Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->

## Contact

Your Name - [@waveygroup](https://twitter.com/waveygroup) - hello@wavey.group

Project Link: [https://github.com/waveygroup/sweetalert](https://github.com/waveygroup/sweetalert)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->

## Acknowledgments

* [UXWEB](https://github.com/uxweb)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/waveygroup/sweetalert.svg?style=for-the-badge

[contributors-url]: https://github.com/waveygroup/sweetalert/graphs/contributors

[forks-shield]: https://img.shields.io/github/forks/waveygroup/sweetalert.svg?style=for-the-badge

[forks-url]: https://github.com/waveygroup/sweetalert/network/members

[stars-shield]: https://img.shields.io/github/stars/waveygroup/sweetalert.svg?style=for-the-badge

[stars-url]: https://github.com/waveygroup/sweetalert/stargazers

[issues-shield]: https://img.shields.io/github/issues/waveygroup/sweetalert.svg?style=for-the-badge

[issues-url]: https://github.com/waveygroup/sweetalert/issues

[license-shield]: https://img.shields.io/github/license/waveygroup/sweetalert.svg?style=for-the-badge

[license-url]: https://github.com/waveygroup/sweetalert/blob/master/LICENSE.md

[linkedin-shield]: https://img.shields.io/badge/-@waveygroup-black.svg?style=for-the-badge&logo=linkedin&colorB=555

[linkedin-url]: https://www.linkedin.com/company/waveygroup

[twitter-shield]: https://img.shields.io/badge/-@waveygroup-black.svg?style=for-the-badge&logo=twitter&colorB=555

[twitter-url]: https://www.twitter.com/waveygroup

[product-screenshot]: images/screenshot.png
