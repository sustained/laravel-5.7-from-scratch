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
# Eloquent, Namespacing and MVC (ep. 7)

## Creating, fetching etc.

```php
// Create
$project = new App\Project;
$project->title = 'foo';
$project->description = 'bar';
$project->save();

// Fetch all
App\Project::all();

// Access like an array
App\Project::all()[1];

// Fetch by primary key
App\Project::find(1);

// Map over results (this is cool)
App\Project::all()->map->title;
```
