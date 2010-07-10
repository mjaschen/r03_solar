r03_solar is a vendor package for the Solar Web Framework.

Solar
=====

Solar is a PHP 5 framework for web application development. It is fully name-spaced and uses enterprise application design patterns, with built-in support for localization and configuration at all levels.

Visit [http://www.solarphp.com/](http://www.solarphp.com/) for more information.

r03_solar
=========

*TODO*

Installation
============

Clone the repository into a folder named `r03` in your `source` directory:

    git clone git@github.com:mjaschen/r03_solar.git r03
    
Enable the vendor by loading its config. Add this to your `config.php`:

    include("$system/source/r03/config/default.php");

Configuration
=============

Set your options in `r03/config/default.php`.

The API documentation gives you detailed information about all configuration options.

Classes
=======

`R03_View_Helper_Gravatar`
--------------------------

Creates an `<img .../>` tag with the Gravatar image for a given email address. Supports the following options: size of image, fallback default image type, image rating.