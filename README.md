# Paper Cello

Paper Cello is a library of miscellaneous PHP functions.
There are functions for datetimes, bcrypt hashing, clamping,
pagination, routing and SHA1 token generation.
The first release is still in development.
This readme is unfinished.

## Documentation

All functions have a DocBlock. So you can read the source code or
generate documentation with [phpDocumentor](http://phpdoc.org/).

## Requirements

**PHP 5.3** or greater

## Source Code

The [project](https://github.com/al-codepone/paper-cello) is on GitHub.
All the source code is in [this file](https://github.com/al-codepone/paper-cello/blob/master/src/paper-cello.php).

## Tests

All tests are in the [test directory](https://github.com/al-codepone/paper-cello/tree/master/test).
There is a test for each function; the name of the test script is the function name.

## Installation

Install using composer:

```javascript
{
    "require": {
        "paper-cello/paper-cello": "dev-master",
    }
}
```

or you can install manually:

```php
require 'paper-cello.php';
```

## datetime_now() and datetime_to()

Use `datetime_now()` and `datetime_to()` to handle datetimes.
These functions handle time zones and daylight saving time correctly
without having to use any other time settings.

Get the current UTC datetime with `datetime_now()`:

```php
$utc_now = pc\datetime_now(); //2014-07-24 04:33:12
```

Use `datetime_to()` to convert a UTC datetime to a time zone and format:

```php
echo pc\datetime_to($utc_now, 'America/Los_Angeles', 'M j, Y g:ia');

//Jul 23, 2014 9:33pm
```

## bcrypt_hash()

Use `bcrypt_hash()` to hash passwords.
Use either a cost value from 4-31:

```php
$hash = pc\bcrypt_hash('password', 12);

//$2a$12$DMWzyZ.iU444JC/.270Bqe84eIwqHOD7ct4jkHY/0gaNv98fHNGx.
```

Or use a previously obtained hash:

```php
echo pc\bcrypt_hash('password', $hash);

//$2a$12$DMWzyZ.iU444JC/.270Bqe84eIwqHOD7ct4jkHY/0gaNv98fHNGx.
```

## clamp()

Clamp a value to a range:

```php
echo implode(', ', array(
    pc\clamp(5, 1, 10),
    pc\clamp(0, 1, 10),
    pc\clamp(11, 1, 10),
    pc\clamp(11, 1, 10.4),
    pc\clamp('d', 'c', 'f'),
    pc\clamp('a', 'c', 'f'),
    pc\clamp('i', 'c', 'f')));

//5, 1, 10, 10.4, d, c, f
```

## paginate()

Compute total number of pages and current page number
given number of items, items per page and raw current page number:

```php
$num_items = 24;
$items_per_page = 5;
$raw_current_page_num = 2;

var_dump(pc\paginate(
    $num_items,
    $items_per_page,
    $raw_current_page_num));

/*
array
  0 => int 5
  1 => int 2
*/
```

## sha1_token()

Get a random token:

```php
echo pc\sha1_token(); //003046aec403e654eaadad31658bcad04ad7f95c
```

## LICENSE

MIT <http://ryf.mit-license.org/>
