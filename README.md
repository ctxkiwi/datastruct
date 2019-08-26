
# DataStruct

DataStruct is a package to validate and/or autocorrect the data given.

## Install
```
composer require ctxkiwi/datastruct
```

## Basic usage

```
$orderStruct = Ds::object([
    'id' => Ds::integer()->min(1),
    'user' => Ds::object([
        'id' => Ds::integer()->min(1),
        'email' => Ds::string()->format('email'),
    ]),
    'price' => Ds::float()->min(0),
    'comment' => Ds::string()->nullable(),
    'paid' => Ds::boolean(),
    'created_at' => Ds::string()->dateFormat('Y-m-d H:i:s'),
]);

$order = [
    'id' => 1,
    'user' => [
        'id' => 123,
        'email' => 'example@datastruct.tld',
    ],
    'price' => 1.23,
    'comment' => null,
    'paid' => true,
    'created_at' => date('Y-m-d') . ' 12:00:00',
];

$errors = [];
if ($orderStruct->validate($order, $errors)) {
    echo 'Success :)';
} else {
    echo 'Failed :(';
    var_dump($errors);
}

```


## Shortcut class

To make coding easier, you can create this class to type just Ds instead of DataStrcut\Ds everytime

```php
<?php

class Ds extends \DataStruct\Ds {}
```

## Formats

Todo

## API

Todo


