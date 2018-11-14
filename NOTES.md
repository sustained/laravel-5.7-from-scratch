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
# Routing Conventions Worth Following (ep. 11)

## Resourceful routing

```php
// This one line of code is short for...
Route::resource('projects', 'ProjectsController');

// These 7 lines...
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');

Route::post('/projects', 'ProjectsController@store');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');
```
# Cleaner Controllers and Mass Assignment Concerns (ep. 14)

# Assigning to Models

```php
// Method 1
$model = new Model;
$model->foo = request('foo');
$model->bar = request('bar');
$model->save();

// Method 2
$model = new Model;
$model->create([
    'foo' => request('foo'),
    'bar' => request('bar')
]);

// Method 3 - Can trigger mass assignment protection
$model = new Model;
$model->create(request()->all());

// Method 4 - Can trigger mass assignment protection
$model = new Model;
$model->create(request(['foo', 'bar']));
```

# (Dis)allowing fields for mass assignment

```php
class FooModel extends Model
{
    // Only fill these fields:
    protected $fillable = ['bar', 'baz'];

    // OR: Fill any fields except these:
    protected $guarded = ['bar', 'baz'];
}
```

# When in Doubt - REST (episode 20)

Instead of having a `ProjectTasksController` which handles everything to do with project tasks, it's entirely possible to create much more specific controllers. 

For example, one could have a REST endpoint *just for completed tasks*.

So you'd end up with something like this:

```php
// Controller
class CompletedTasksController
{
    public function store(ProjectTask $task)
    {
        $task->setCompleted(true);

        return back();
    }

    public function destroy(ProjectTask $task)
    {
        $task->setCompleted(false);
        
        return back();
    }
}

// Routes
Route::post('completed-tasks/{task}', 'CompletedTasksController@store')
Route::delete('completed-tasks/{task}', 'CompletedTasksController@destroy')

// View / Form
@if ($task->completed)
    @method('DELETE')
@endif
```

This does end up moving some logic to the view layer which I dislike personally but it's an interesting concept nonetheless.
