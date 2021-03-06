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
<!--* [Usage](#usage)-->
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
<!--* [Acknowledgements](#acknowledgements)-->



<!-- ABOUT THE PROJECT -->
## About The Project
Open Gallery is an open-source gallery website source, the aim is to be able to have a good looking yet simple to use gallery.

Upon searching for gallery software we were not able to find good looking, responsive or good working gallery software.
<!--[![Product Name Screen Shot][product-screenshot]](https://github.com/reashetyrr/open-gallery)-->



### Built With
* [PHP 7.4.1](https://php.net)
* [Symfony 5](https://symfony.com)


<!-- GETTING STARTED -->
## Getting Started

Getting started with Open Gallery is pretty simple, make sure you have the prerequisites and follow the installation, afterwards you just login and start creating albums and uploading images or videos!

### Prerequisites

* PHP 7.4+
* Webserver/host

To check your php version:
```sh
php -v
```

### Installation
1. Download a [Release](https://github.com/reashetyrr/open-gallery/releases)
2. Upload the source to your webhost using (s)ftp
3. Setup the webhost according to symfony [information](https://symfony.com/doc/current/deployment.html)  
4. Go to the setup page: `/s/setup` example: `https://example.com/s/setup`
5. Follow the steps to set up the gallery and main administrator account
6. The setup will create the database tables before guiding you to the main administrator account information

<!-- USAGE EXAMPLES -->
<!--## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_
-->


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

NOTE: Do NOT push the `.env` file, changes into the `.env` should be handled by modifying the `templates/setup/config_templates/template.env` file

<!-- LICENSE -->
## License

Distributed under the Apache 2.0 License. See [LICENSE](https://github.com/reashetyrr/open-gallery/blob/master/LICENSE) for more information.



<!-- CONTACT -->
## Contact

Project Link: [https://github.com/reashetyrr/open-gallery](https://github.com/reashetyrr/open-gallery)



<!-- ACKNOWLEDGEMENTS -->
<!--## Acknowledgements

* []()
* []()
* []()

-->



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