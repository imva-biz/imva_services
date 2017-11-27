imva_services
=============
Global service provider for imva.biz modules for the OXID eShop.

# Features
* `imva_isCheckout()` decorator for ViewConfig
* File access service
* Database helper
* Logger
* Article extension to get the respective items from the basket
* Language extension: have all translations in subdirectories of `translations/`.

# Install
* Copy the contents of modules/ to your shop's module directory.
* In the shop admin, go to Extensions => Modules and select "imva.biz Core module".
* In the section below click "activate".

You are free to use this module with your own modules. See the source for details.

# Update
* Disable the module in the shop admin.
* Remove the directory named `imva_services`.
* Procceed with the installation instructions.

# System Requirements
* Created for OXID eShop 4.9 and higher. (CE, PE, EE)
* PHP 5.6 and higher.