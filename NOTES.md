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

## Assigning to Models

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

## (Dis)allowing fields for mass assignment

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

# Authentication (episode 26)

## Helpers

```php
auth()->id;
auth()->user();
auth()->check();
auth()->guest();
```

## Adding authentication

```php
public function __construct()
{
    // To the entire controller:
    $this->middleware('auth');

    // To specific actions:
    $this->middleware('auth')->only(['foo', 'bar']);
    $this->middleware('auth')->except(['baz']);
}
```

# Authorisation (episode 27)

## Methods of authorising requests

```php
// Method 1a/b
abort_if($project->author_id !== auth()->id(), 403);
abort_unless($project->author_id === auth()->id(), 403);

// Method 2 (create a method on the User model):
abort_unless(auth()->user()->ownsProject($project));
```

## Method 3

1. Move the logic to a policy class (php artisan make:policy ProjectPolicy).
2. Setup the policy mapping in app/Providers/AuthServiceProvider.
3. Use the policy (many entrypoints):

```php
$this->authorize('update', $project);                           // OR
abort_if/unless(\Gate::allows/denies('update', $project), 403); // OR
Route::post('/projects')->middleware('can:update,project');     // OR
auth()->user()->can/cannot('update', $project);
```

## Overriding authorisation (e.g. for an administrator)

```php
// app/Providers/AuthServiceProvider@boot

$gate->before(function($user) {
    if (logicCheckingIfUserIsAdministrator)
    {
        return true;
    }
});
```

# Model Hooks (episode 31)

The following events are available on Eloquent models:

```
retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
```
