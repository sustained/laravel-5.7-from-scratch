# Sending Data to Your Views (ep. 5)

## Method 1 
```php
view('home', ['foo' => $foo, 'bar' => $bar]);
```

## Method 2
```php
view('home')->withFoo($foo)->withBar($bar);
```

## Method 3 
```php
view('home')->with(['foo' => $foo, 'bar' => $bar]);
```

## Method 4
```php
view('home', compact($foo, $bar));
```
