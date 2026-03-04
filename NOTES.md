
https://laravel.com/learn/php-fundamentals

## Installer Laravel

### Pré-requis:

- Php https://www.php.net/
- Composer https://getcomposer.org/
- Laravel installer : https://github.com/laravel/installer
- Node et Npm pour build le front : https://nodejs.org/fr

Installer tout d'un coup : /bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"

## extensions vscode:

- Database Client
- Laravel

## Variables & Types

```php

/* Types */
$status = 404; // int 
$status = 404.3; // float
$status = true; // bool
$text = ' Not Found'; // string

/* Concatenations */
$status = "404 $text"; // string -> "404 Not Found"
$status = "404 " . $text; // string -> "404 Not Found"
$status = '404 $text'; // string -> "404 $text"

/* Casts */
$status = (int)"404"; // int -> 404
$status = (string)404; // string -> "404"
$status = (string)true; // string -> "1"
$status = (string)false; // string -> ""
$status = (int)true; // int -> 1
$status = "404" + 4; // number -> 408
$status = "404" . "4"; // string -> "4044"

/* debug */
var_dump();

/* Arrays 2 types */
/* tableaux numériques */
$colors = ['red', 'green', 'blue'];
array(3) {
	// clé [0] sont des nombres 
	[0] => string(3) "red"
	[1] => string(5) "green"
	[2] => string(4) "blue"
}
echo $colors[0]; // "red"

/* tableau associatifs */
$user = [
	'name' => 'Christophe',
	'age' => 40
];
echo $user['name']; // "Christophe"

/* nested arrays */
$blogPost = [
	'title' => 'nom',
	'authors' => [
		'jose',
		'marie'
	]
];
echo $blogPost['authors'][0]; // "jose"

// ajouter
$colors = ['red', 'green', 'blue'];
$colors[] = 'yellow';
echo $colors; // ['red', 'green', 'blue', 'yellow']

// compter
count($colors); // 4

// vérifier si défini
isset($colors); // true
isset($user); // false

// retirer
unset($colors[0]); // ['green', 'blue', 'yellow'];

```

## fonctions

```php

// déclaration fonction
function greet() {
	echo 'hello';
}
greet(); // hello

// paramètre
function greet($name) {
	echo "hello $name";
}
greet('Christophe'); // hello Christophe

// retour
function add($number1, $number2) {
	return $number1 + $number2;
}
echo add(2, 3) // 5
echo add(3) // 5 -> error "Php Fatal error: Too few arguments"

// paramètre par defaut non obligatoire
function sayHello($name = 'you') {
	return "hello $name";
}
echo sayHello(); // hello you

// typage 
function sub(int $number1, int $number2): int {
	return $number1 - $number2
}
echo sub(2, 1); // 1

function sub(int $number1, int $number2): int {
	return "any string";
}
echo sub(2, 2); // "Php Fatal error: Return value must be of type int" 

// fonction dans une variable, fonction anonyme
$sayHello = function($name = 'you') {
	return "hello $name";
};
echo $sayHello(); // "hello you"

```

## Boucles

```php

$colors = ['red', 'blue', 'green'];

// foreach item
foreach($colors as $color) {
	var_dump($color); // red, blue, green
}

// foreach key => item
foreach($colors as $key => $color) {
	var_dump($colors[$key]); // red, blue, green
	var_dump($key); // 0, 1, 2
	var_dump($color); // red, blue, green
}

$invoiceItems = [
    ['item' => 'Laptop', 'price' => 1200],
    ['item' => 'Mouse', 'price' => 75],
    ['item' => 'Keyboard', 'price' => 100]
];

$totals = 0;
foreach($invoiceItems as $invoiceItem) {
	$totals += $invoiceItem['price'];
}
echo $totals; // 1375

// for
for($i = 0; $i < 5; $i++) {
	var_dump($i);
}

// while
$count = 0;
while($count < 5) {
	var_dump($count);
	$count++;
}

// do while
$count = 1000;
do {
	var_dump($count);
	$count++
} while ($count < 5);

$users = [
    ['name' => 'John', 'newsletter' => true],
    ['name' => 'Jane', 'newsletter' => false],
    ['name' => 'Bob', 'newsletter' => true]
];

// controller l'execution de la boucle
foreach($users => $user) {
	if (! $user['newsletter']) {
		continue; // passe à l'itération suivante
		break; // arrete la boucle
	}
	var_dump($user['name']);
}



```

## Classes

```php

class Product {

	// déclaration des propriétés ici ou dans le constructeur (version moderne)
	// niveau d'accès, type, nom de la propriété
	public string $name;
	public int $price;
	public // accessible partout
	private // accessible seulement dans sa propre classe
	protected // accessible dans sa classe et dans les classes étendues
	
	// magic method
	public function __construct(
		public string $name,
		public int $price
	) {
		$this->name = $name;
		$this->price = $price;
	}

	// methodes, fonction de classe
	public function isExpensive(int $amount = 1000): bool {
		return $this->price > $amount;
	}
	
}

$product = new Product('laptop', 100);
var_dump($product);
echo $product->name; // laptop;
echo $product->price; // 100;
echo $product->isExpensive(); // false

// les objects instanciés de DigitalProduct hériterons des propriétés de Product
class DigitalProduct extends Product {
	public function getLink (): string {
		return 'app-link';
	}
}

$product = new DigitalProduct('application', 1000);
echo $product->price; // 1000
echo $product->getLink(); // app-link

```

## Modern PHP
- readonly (8.1 en 2021)
- déclaration des propriétés dans le constructeur
- match (8.0 en 2020)
- null safe operator ?-> (8.0 en 2020)
- paramètre nommé (price: 1000) (8.0 en 2020)
- typage (7.4) (2019)

```php

class User {
	
	public function __construct(
		public readonly string $name,
		public string $email
	)
	
	public getAdress(): null {
		return null;
	}

}

$user = new User('patrick', 'patrick@email.com');
$user->name = 'jose'; // Fatal Error : readonly


switch ($status) {
	case 200:
		$resul = 'Success';
		break;
	case 500:
		$result = 'Server error';
		break;
	default:
		$result = 'Unknown status'; 
}
echo $result;

$result = match($status) {
	200 => 'Success',
	500 => 'Server error',
	default => 'Unknown status'
}
echo $result;

// null safe operator: n'execute pas le reste si getAdresse 
// est à null et renvoie null
$user->getAdresse()?->getCountry();

class Product {
	
	public function __constructor(
		public string $name,
		public ?float $price = null,
		public ?float $beforePrice = null,
		public ?float $afterPrice = null,
	) {
		
	}

}

// ancien
$product = new Product(
	'laptop',
	null,
	null,
	1000
);

// nouveau
$product = new Product(
	name: 'laptop',
	afterPrice: 1000
);

```

## Composer 

php main package manager, versions

```bash

composer init

```

- autoload
- namesplace

composer.json (ensemble des librairie, script, config)
vendor/ (les fichiers des libs)


## Petit projet

WeatherService.php

```php

<?php

namespace WeatherApp;

use GuzzleHttp\Client;

class WeatherService
{
    private string $apiKey = '7246de415ccc5d4ff9c4fbb2852575d6';
    private string $apiEndpoint = 'https://api.openweathermap.org/data/2.5/weather';
    private Client $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get($this->apiEndpoint, [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return [
            'city' => $data['name'],
            'temperature' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'humidity' => $data['main']['humidity']
        ];
    }
}

```

```php

#!/usr/bin/env php
<?php

use WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';

if ($argc < 2) {
    echo "Usage: php weather.php <city>\n";
    echo "Example: php weather.php London\n";
    exit(1);
}

$weatherService = new WeatherService();
$city = $argv[1];

echo "Getting weather for $city...\n";
$weather = $weatherService->getWeather($city);

echo "\n";
echo "City: " . $weather['city'] . "\n";
echo "Temperature: " . $weather['temperature'] . "°C\n";
echo "Description: " . $weather['description'] . "\n";
echo "Humidity: " . $weather['humidity'] . "%\n";

```


# Laravel

```bash
# installer
laravel new <nom du projet>

# laravel propose un starter avec
# - None
# - React
# - Svelte
# - Vue
# - Livewire
```

Lancer le serveur de dev

```bash

composer run dev

```

vite
http://localhost:5173/

server
http://localhost:8000

IA: Laravel Boost 


### Routes

Les routes sont ici : /routes/web.php

Appel le template home.blade

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('home');
});
```

Le template est ici

ressources/views/home.blade.php

```php
<x-layout>
    <x-slot:title>Welcome</x-slot:title>
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
                    <p class="mt-4 text-base-content/60">This is your brand new Laravel application. Time to make it
                        sing (or chirp)!</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
```

qui utilise le template layout.blade.php

```php
<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100">
        <div class="navbar-start">  
            <a href="/" class="btn btn-ghost text-xl">🐦 Chirper</a>
        </div>
        <div class="navbar-end gap-2">
            <a href="#" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2025 Chirper - Built with Laravel and ❤️</p>
        </div>
    </footer>
</body>

</html>
```

$title est envoyé via <x-slot:title></x-slot:title>

Deploiement Laravel Cloud via github

# Utiliser MVC
## Commandes

```bash
php artisan make:controller
 1) renseigner le nom
 2) renseigner l option -> ressource permet de créer un controller avec plusieurs méthodes crud
```

app/Http/Controllers/ChripController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = [
            [
                'author' => 'Jane Doe',
                'message' => 'Just deployed my first Laravel app! 🚀',
                'time' => '5 minutes ago'
            ],
            [
                'author' => 'John Smith',
                'message' => 'Laravel makes web development fun again!',
                'time' => '1 hour ago'
            ],
            [
                'author' => 'Alice Johnson',
                'message' => 'Working on something cool with Chirper...',
                'time' => '3 hours ago'
            ]
        ];
        return view('home', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

```

web.php
```php
<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

// chemin du controller : ChirpController::class appel sa methode index lorsqu'on se rend sur /
Route::get('/', [ChirpController::class, 'index']);
```


### Base de données : 

Créer les tables directement avec php artisan make:migration

```bash

php artisan make:migration create_chirps_table

```

appliquer les migrations:

```bash
php artisan migrate
```

intéragir avec la base de données avec eloquent (ORM laravel) depuis le terminale

```bash
php artisan tinker

\DB::select('SELECT * FROM chirps');

```

retour en arriere dans les migrations

```bash
php artisan migrate:rollback
```



# MODEL

```bash
php artisan make:model Chirp
```

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

```

Ajouter une relation (une chirp peux avoir qu'un seul user) -> BelongsTo

```php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function chirps(): HasMany {
        return $this->hasMany(Chirp::class);
    }
}

```

Ajouter une relation (un user peux avoir plusieurs chirps) -> hasMany


quelques commandes eloquent

```php

// Get all chirps
Chirp::all();

// Get chirp by ID
Chirp::find(1);

// Get first chirp matching criteria
Chirp::where('message', 'like', '%Laravel%')->first();

// Count chirps
Chirp::count();

// Get a user's chirps
$user->chirps;

// Create a chirp
$user->chirps()->create(['message' => 'Hello!']);

// Update a chirp
$chirp->update(['message' => 'Updated message']);

// Delete a chirp
$chirp->delete();

```

ajouter des données grace à tinker :

```php

// Create a new user
$user = \App\Models\User::create([
    'name' => 'Eloquent Expert',
    'email' => 'eloquent@expert.com',
    'password' => bcrypt('password')
]);

// Create a chirp for this user
$chirp = $user->chirps()->create([
    'message' => 'Eloquent makes database work a breeze!'
]);

// Access the relationship
echo $chirp->user->name; // "Eloquent Expert"

// Get all chirps
\App\Models\Chirp::all();

// Get recent chirps
\App\Models\Chirp::latest()->get();
```


## Seeders

Les seeders permettent d'ajouter des données via eloquent, cette fois si pas en ligne de commande mais dans un fichier

```bash
	php artisan make:seeder ChripSeeder
```

database/seeders

```php

<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Chirp;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        // Create a few sample users if they don't exist
        $users = User::count() < 3
                    ? collect([
                        User::create([
                            'name' => 'Alice Developer',
                            'email' => 'alice@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'Bob Builder',
                            'email' => 'bob@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'Charlie Coder',
                            'email' => 'charlie@example.com',
                            'password' => bcrypt('password'),
                        ]),
                    ])
                    : User::take(3)->get();

        // Sample chirps
        $chirps = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
        ];

        // Create chirps for random users
        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}

```


```php
	php artisan db:seeder --class="ChripSeeder"
```

## Ajouter des données (store)

/home.blade.php

```php

<form method="POST" action="/chrips">

</form>

```

/web.php

```php
	Route::post('/chrips', [Chrips::class, 'store']);
```

/ChirpController.php

```php
    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'string|required|max:255|min:5'
        ]);

        Chirp::create([
            'message' => $validated['message']
        ]);

        return redirect('/')->with('success', 'Chirp created!');
    }

```

```php

<!-- Chirp Form -->
        <div class="mt-8 shadow card bg-base-100">
            <div class="card-body">
                <form method="POST" action="/chirps">
                    @csrf
                    <div class="w-full form-control">
                        <textarea
                            name="message"
                            placeholder="What's on your mind?"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="255"
                            required
                        >{{ old('message') }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>

	
```


layout.blade.php

```php 
	
    <!-- Success Toast -->
    @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success animate-fade-out">
                <svg xmlns="<http://www.w3.org/2000/svg>" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

```


envoyer des props à un composant blade

```html

<x-chirp :chirp="$chirp" />

```

```php
	
	@props('chirp');
	
	<p>{{ $chirp->message }}</p>

```



## Update and delete


les routes: web.php

```php
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
```

edit page 
resources/views/chirps/edit.blade.php

```php

<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="mt-8 text-3xl font-bold">Edit Chirp</h1>

        <div class="mt-8 shadow card bg-base-100">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="w-full form-control">
                        <textarea
                            name="message"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="255"
                            required
                        >{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="justify-between mt-4 card-actions">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
```


update dans app/Http/Controllers/ChirpController.php

```php
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        // Validate
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Update
        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

```

template:

```php
<div class="flex gap-1">
	<a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
		Edit
	</a>
	<form method="POST" action="/chirps/{{ $chirp->id }}">
		@csrf
		@method('DELETE')
		<button type="submit"
			onclick="return confirm('Are you sure you want to delete this chirp?')"
			class="btn btn-ghost btn-xs text-error">
			Delete
		</button>
	</form>
</div>
```

controller destroy:

```php

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }

```

