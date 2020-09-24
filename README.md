<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![APACHE License][license-shield]][license-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h3 align="center">Open Gallery</h3>
  <p align="center">
    Open source gallery software written in PHP
    <br />
    <!--<a href="https://github.com/reashetyrr/open-gallery"><strong>Explore the docs »</strong></a>-->
    <br />
    <br />
    <!--<a href="https://github.com/reashetyrr/open-gallery">View Demo</a>
    ·-->
    <a href="https://github.com/reashetyrr/open-gallery/issues">Report Bug</a>
    ·
    <a href="https://github.com/reashetyrr/open-gallery/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://github.com/reashetyrr/open-gallery)



### Built With
* [PHP](https://php.net)
* [Symfony](https://symfony.com)


<!-- GETTING STARTED -->
## Getting Started

To get the gallery up and running follow these simple steps.

### Prerequisites

* PHP 7.4+
* Webserver/host

To check your php version:
```sh
php -v
```

### Installation

1. Download a [Release](https://github.com/reashetyrr/open-gallery/releases)
2. Go to [this symfony secret generator page](http://nux.net/secret) and copy the generated secret
3. Paste the generated secret into the `.env` file on the line `APP_SECRET=`
4. Change the `APP_ENV` to prod: `APP_ENV=prod`
5. Check your database information with your webhost (create a database if you dont have one yet)
6. Update the `DATABASE_URL` in the `.env` file
7. Upload the source to your webhost using (s)ftp


<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/reashetyrr/open-gallery/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the Apache License 2.0 License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Project Link: [https://github.com/reashetyrr/open-gallery](https://github.com/reashetyrr/open-gallery)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* []()
* []()
* []()





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/reashetyrr/open-gallery.svg?style=flat-square
[contributors-url]: https://github.com/reashetyrr/open-gallery/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/reashetyrr/open-gallery.svg?style=flat-square
[forks-url]: https://github.com/reashetyrr/open-gallery/network/members
[stars-shield]: https://img.shields.io/github/stars/reashetyrr/open-gallery.svg?style=flat-square
[stars-url]: https://github.com/reashetyrr/open-gallery/stargazers
[issues-shield]: https://img.shields.io/github/issues/reashetyrr/open-gallery.svg?style=flat-square
[issues-url]: https://github.com/reashetyrr/repo/issues
[license-shield]: https://img.shields.io/badge/License-Apache%202.0-blue.svg?style=flat-square
[license-url]: https://github.com/reashetyrr/open-gallery/blob/master/LICENSE
[product-screenshot]: images/screenshot.png