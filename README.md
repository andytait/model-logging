Laravel Model Logging
=============

### About

This package provides some convenient defaults for logging actions that occur on models.

For example, if you had an admin system where a number of users could mark orders as pending, approved or cancelled, the package would assist in storing what change had been made to the model, and which user made the change.

This package assumes you're using Eloquent as your ORM.

### Example

Add the LoggableTrait to a model you want to log actions on

```php
<?php

use Tait\ModelLogging\LoggableTrait;

class Order extends Eloquent
{
    use LoggableTrait;

    ...
}
```

The following example shows how you can add a log that the order has been marked as dispatched.

```php
$order = Order::find(1);
$order->status = 'dispatched';
$order->save();

$order->saveLog([
    'action' => 'Marked as ' . $order->status
]);
```

The saveLog method has some sensible defaults for saving the content id, content type, and user id. All settings can be overriden by setting the appropriate key. The following example displays what options you can set on the saveLog method.

```php
$order->saveLog([
    'user_id' => 34,
    'content_id' => 19,
    'content_type' => 'AnotherModel',
    'action' => 'Made a change to AnotherModel',
    'description' => 'A more detailed optional description of the change made to the model',
]);
```

The following example displays how you can get all logs, and paginated logs

```php
$order = Order::find(1);

// Get all logs
$all_logs = $order->getAllLogs();

// Get paginated logs
$paginated_logs = $order->getPaginatedLogs();
```
