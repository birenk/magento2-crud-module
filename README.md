# About
This is a Magento 2 - Hello World module created as a composer submodule.

# Requirements

- Magento Composer Installer: To copy the module contents under app/code/ folder.
In order to install it run the below command on the root directory:

        composer require magento/magento-composer-installer

Add GIT Repository to composer
<pre>
composer config repositories.biren-magento2-crud-module vcs https://github.com/birenk/magento2-crud-module/
</pre>


- Add the VCS repository: So that composer can find the module. Add the following lines in your composer.json

        "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/birenk/magento2-crud-module"
        }],


# Installation

- Add the module to composer:

        composer require biren/magento2-crud-module

- Add the new entry in `app/etc/config.php`, under the 'modules' section:

        'Biren_Crudimage' => 1,

- Clear cache
