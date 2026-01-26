# ⚡ Maharlika Framework

<div align="center">

**Modern PHP Framework for Elegant Web Development**

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/badge/Build-Passing-success?style=flat-square)](https://github.com)
[![Code Quality](https://img.shields.io/badge/Code%20Quality-A+-blue?style=flat-square)](https://github.com)

[Features](#-features) • [Installation](#-installation) • [Documentation](#-documentation) • [Examples](#-quick-examples) • [Contributing](#-contributing)

</div>

---

## 🎯 Why Maharlika?

Maharlika is a modern PHP framework built for developers who value **elegant syntax**, **performance**, and **developer experience**. Born from the need for a lightweight yet powerful framework that doesn't compromise on features.

```php
// This is all you need for a complete API endpoint
class UserController
{
    #[HttpGet('/api/users/{id}')]
    public function show(int $id): JsonResponse
    {
        return response()->json(
            User::find($id)
        );
    }
}
```

## ✨ Features

### 🚀 Modern Architecture
- **Attribute-Based Routing** - Clean, declarative route definitions using PHP 8 attributes
- **Blade Templating** - Powerful, intuitive templating with component support
- **Query Builder** - Eloquent-style database interactions with full type safety
- **Dependency Injection** - Automatic dependency resolution and service container
- **Middleware System** - Flexible request/response filtering

### 🎨 Developer Experience
- **Hot Reloading** - Instant feedback during development
- **Beautiful Error Pages** - Whoops integration for readable stack traces
- **CLI Tools** - Artisan-like commands for migrations, scaffolding, and more
- **Component System** - Reusable Blade components with full data binding

### 🛡️ Security First
- CSRF Protection out of the box
- SQL Injection prevention
- XSS filtering
- Secure session handling
- Password hashing with modern algorithms

### ⚡ Performance
- Optimized routing with zero overhead
- Intelligent query caching
- Minimal memory footprint
- Production-ready from day one

## 📦 Installation

### Requirements
- PHP 8.2 or higher
- Composer
- MySQL/PostgreSQL/SQLite

### Quick Start

```bash
# Create a new project
composer create-project maharlika/maharlika my-app

# Navigate to project
cd my-app

# Run development server
php maharlika serve
```

Your application is now running at `http://localhost:8000` 🎉

## 🏗️ Project Structure

```
my-app/
├── app/
│   ├── Controllers/     # HTTP controllers
│   ├── Models/          # Database models
│   ├── Middleware/      # Request middleware
│   └── View/
│       └── Components/  # Blade components
├── config/              # Configuration files
├── database/
│   └── migrations/      # Database migrations
├── public/              # Public assets
├── resources/
│   └── views/           # Blade templates
├── routes/              # Route definitions
└── storage/             # Logs, cache, sessions
```

## 🚦 Quick Examples

### Creating Routes

```php
use Maharlika\Routing\Attributes\HttpGet;
use Maharlika\Routing\Attributes\HttpPost;

class PostController
{
    #[HttpGet('/posts')]
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    #[HttpPost('/posts')]
    public function store(Request $request)
    {
        $post = Post::create($request->validated());
        
        return redirect("/posts/{$post->id}")
            ->with('success', 'Post created!');
    }

    #[HttpGet('/api/posts')]
    public function apiIndex()
    {
        return response()->json([
            'data' => Post::with('author')->get()
        ]);
    }
}
```

### Building Blade Components

```php
// app/View/Components/Alert.php
namespace App\View\Components;

use Maharlika\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type = 'info',
        public string $message = ''
    ) {}

    public function render()
    {
        return view('components.alert');
    }

    public function getColorClass(): string
    {
        return match($this->type) {
            'success' => 'bg-green-100 text-green-800',
            'error' => 'bg-red-100 text-red-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-blue-100 text-blue-800',
        };
    }
}
```

```blade
<!-- resources/views/components/alert.blade.php -->
<div class="alert {{ $component->getColorClass() }}">
    {{ $message }}
</div>
```

```blade
<!-- Usage in any view -->
<x-alert type="success" message="Your profile has been updated!" />
```

### Working with Database

```php
// Create a migration
php maharlika make:migration create_posts_table

// Run migrations
php maharlika migrate

// Query builder usage
$posts = DB::table('posts')
    ->where('published', true)
    ->orderBy('created_at', 'desc')
    ->limit(10)
    ->get();

// Eloquent-style models
class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

// Use relationships
$posts = Post::with('author')
    ->where('published', true)
    ->get();
```

### Middleware

```php
namespace App\Middleware;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}

// Apply to routes
#[HttpGet('/dashboard')]
#[Middleware(Authenticate::class)]
public function dashboard()
{
    return view('dashboard');
}
```

## 🎨 Blade Templating

Maharlika uses Blade for templating with full component support:

```blade
{{-- resources/views/layout.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <x-navigation />
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <x-footer />
    </footer>
</body>
</html>
```

```blade
{{-- resources/views/posts/show.blade.php --}}
@extends('layout')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        
        <x-author-card :author="$post->author" />
        
        <div class="content">
            {!! $post->content !!}
        </div>

        @if($post->comments->isNotEmpty())
            <x-comments :comments="$post->comments" />
        @endif
    </article>
@endsection
```

## 🛠️ CLI Commands

```bash
# Generate files
php maharlika make:controller UserController
php maharlika make:model Post
php maharlika make:migration create_users_table
php maharlika make:component Alert

# Database operations
php maharlika migrate              # Run migrations
php maharlika migrate:rollback     # Rollback last batch
php maharlika migrate:reset        # Rollback all migrations
php maharlika migrate:refresh      # Reset and re-run all migrations

# Development
php maharlika serve               # Start development server
php maharlika routes              # List all routes

# Cache management
php maharlika cache:clear         # Clear application cache
```

## 📚 Documentation

Full documentation is available at [maharlika-framework.dev](https://maharlika-framework.dev)

- [Getting Started](https://maharlika-framework.dev/docs/getting-started)
- [Routing Guide](https://maharlika-framework.dev/docs/routing)
- [Blade Templates](https://maharlika-framework.dev/docs/blade)
- [Database & Models](https://maharlika-framework.dev/docs/database)
- [Component System](https://maharlika-framework.dev/docs/components)
- [API Reference](https://maharlika-framework.dev/api)

## 🎯 Roadmap

- [x] Attribute-based routing
- [x] Blade templating engine
- [x] Component system
- [x] Query builder
- [x] Migration system
- [x] Authentication scaffolding
- [x] Email system
- [x] Queue system
- [x] WebSocket support
- [ ] GraphQL integration
- [x] Testing utilities

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

```bash
# Fork the repository
# Clone your fork
git clone https://github.com/joshdevkit/maharlika-framework

# Create a feature branch
git checkout -b feature/amazing-feature

# Make your changes and commit
git commit -m 'Add amazing feature'

# Push to your fork
git push origin feature/amazing-feature

# Open a Pull Request
```

### Development Setup

```bash
# Install dependencies
composer install

# Run tests
./vendor/bin/phpunit

# Code style check
./vendor/bin/phpcs

# Fix code style
./vendor/bin/phpcbf
```

## 📄 License

Maharlika Framework is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

- Inspired by Laravel's elegant syntax
- Built with modern PHP best practices
- Developed and maintained by: Joshua Mendoza Pacho
---

<div align="center">

**Built with ❤️ by developers, for developers**

[⭐ Star us on GitHub](https://github.com/joshdevkit/maharlika-framework)

</div>
