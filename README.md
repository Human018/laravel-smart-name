# laravel-smart-name
A Model Trait that quickly &amp; intuitively change names from a full name into separate first, last and other name parts.

### Prerequisites

This Trait uses the Laravel framework and requires Laravel 5 and above.

It also requires that your model table has columns named 'first_name', 'last_name' and 'title' in order to process the name.

### Installing

Add the package to your composer file.
```
composer require Human018/laravel-smart-name
```

Add the trait to any Model you wish to apply it to.

```php
use Human018\SmartName\Traits\SmartNameTrait;

class User {
    use SmartNameTrait;
}
```

This introduces a new attribute method to your model called name.
```php
$user->name = "Mr John Doe";

// Will perform the following:

$user->title = "Mr";
$user->first_name = "John";
$user->last_name = "Doe";

$user->name; // returns "Mr John Doe";
```

This trait also processes email addresses if it detects the value to be an email address.
```php
$user->name = "john@mail.com"

// Will perform the following:

$user->first_name = "john";
```

## Authors

* **Simon Woodard** - *Initial work* - [Website](https://simonwoodard.com.au/)

## License

This project is licensed under the GNU License - see the [LICENSE.md](LICENSE.md) file for details
