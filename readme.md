MVC File Structure for PHP
Below is a standard directory structure for a PHP application following the MVC pattern, with descriptions of each component.
```
/project-root
├── /app                    # Core application files
│   ├── /Controllers       # Controller classes handling requests and responses
│   │   ├── HomeController.php
│   │   ├── UserController.php
│   │   └── ...
│   ├── /Models            # Model classes for data and business logic
│   │   ├── User.php
│   │   ├── Product.php
│   │   └── ...
│   ├── /Views             # View templates for rendering UI
│   │   ├── /home
│   │   │   ├── index.php
│   │   │   └── ...
│   │   ├── /user
│   │   │   ├── profile.php
│   │   │   ├── edit.php
│   │   │   └── ...
│   │   └── /layouts
│   │       ├── main.php   # Main layout template
│   │       └── ...
│   └── /Config            # Configuration files
│       ├── database.php   # Database connection settings
│       ├── routes.php     # Route definitions
│       └── config.php     # General app settings
├── /public                # Publicly accessible directory
│   ├── index.php          # Entry point for the application
│   ├── /css               # CSS files
│   │   ├── style.css
│   │   └── ...
│   ├── /js                # JavaScript files
│   │   ├── app.js
│   │   └── ...
│   └── /images            # Image assets
│       ├── logo.png
│       └── ...
├── /vendor                # Composer dependencies
│   ├── autoload.php
│   └── ...
├── /core                  # Core framework files
│   ├── Router.php         # Routing logic
│   ├── Database.php       # Database connection and query handling
│   ├── Controller.php     # Base controller class
│   ├── Model.php          # Base model class
│   └── View.php           # View rendering logic
├── /storage               # Storage for logs, cache, etc.
│   ├── /logs
│   │   ├── app.log
│   │   └── ...
│   └── /cache
│       ├── cache_file.php
│       └── ...
├── .htaccess              # Apache configuration for routing
├── composer.json          # Composer configuration
└── README.md              # Project documentation
```
Directory and File Descriptions

/app: Contains the core application logic, split into MVC components.

/Controllers: PHP classes that handle HTTP requests, interact with models, and render views.
/Models: Classes that represent data and business logic, typically interacting with the database.
/Views: PHP templates for rendering the UI, often organized by controller or feature.
/Config: Configuration files for database, routes, and other settings.


/public: The web server's document root. All HTTP requests are routed through index.php.

Contains static assets like CSS, JavaScript, and images.
.htaccess ensures all requests are funneled to index.php for routing.


/vendor: Stores third-party libraries managed by Composer, including the autoloader.

/core: Contains framework-level code, such as routing, base classes, and database handling.

/storage: Used for logs, cached files, or other temporary data.

Root Files:

.htaccess: Configures Apache to route requests.
composer.json: Defines PHP dependencies.
README.md: Provides project setup and usage instructions.



Example File Content
/public/index.php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Router.php';

$router = new Router();
require_once __DIR__ . '/../app/Config/routes.php';
$router->dispatch();

/core/Router.php
<?php
class Router {
    protected $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes[$method] as $route => $callback) {
            if ($uri === $route) {
                call_user_func($callback);
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}

/app/Controllers/HomeController.php
<?php
class HomeController extends Controller {
    public function index() {
        $data = ['title' => 'Welcome'];
        $this->view('home/index', $data);
    }
}

/app/Models/User.php
<?php
class User extends Model {
    protected $table = 'users';

    public function getAll() {
        return $this->db->query("SELECT * FROM $this->table")->fetchAll();
    }
}

/app/Views/home/index.php
<?php include __DIR__ . '/../layouts/main.php'; ?>
<h1><?php echo htmlspecialchars($data['title']); ?></h1>
<p>Welcome to the Home Page!</p>

/app/Views/layouts/main.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($data['title'] ?? 'My App'); ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/user">Users</a>
        </nav>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
</body>
</html>

Notes

Autoloading: Use Composer for autoloading classes (vendor/autoload.php).
Routing: The Router class maps URLs to controllers and methods.
Security: Use htmlspecialchars in views to prevent XSS.
Database: The Database class in /core should handle connections and queries.
Extensibility: Add middleware, helpers, or libraries in /core as needed.
Environment: Use a .env file (with a library like vlucas/phpdotenv) for sensitive configs.

This structure is suitable for small to medium-sized PHP applications and can be extended for larger projects by adding middleware, service layers, or additional configurations.