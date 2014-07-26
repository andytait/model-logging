Laravel Model Logging
=============

### About

This package provides some convenient defaults for logging actions that occur on models.

For example, if you had an admin system where a number of users could mark orders as pending, approved or cancelled, the package would assist in storing the action that

### Example

Add the LoggableTrait to a model you want to log actions on

```php
<?php

use Tait\ModelLogging\LoggableTrait;

class Order extends Eloquent  {

    use LoggableTrait;

}
```
