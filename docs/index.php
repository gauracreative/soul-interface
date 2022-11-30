<?php declare(strict_types=1);
require dirname(__DIR__, 1) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1) . '/src');
$dotenv->load();
$_ENV['ROOT_PATH'] = dirname(__DIR__, 1);
// var_dump($_ENV);
require dirname(__DIR__) . '/docs/components/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_ENV['TITLE']; ?> - <?php echo title(); ?></title>
        <meta name="description" content="<?php echo $_ENV['DESCRIPTION']; ?>">
        <meta name="keywords" content="<?php echo $_ENV['KEYWORDS']; ?>">
        <meta name="author" content="Jay Gaura">
        <link rel="icon" type="image/png" sizes="196x196" href="/favicon-192.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="/favicon-64.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/favicon-48.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
        <!-- Fonts -->
        <!-- @yield('fonts') -->
        <!-- Styles -->
        <link rel="stylesheet" href="/css/docs.css">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="fixed w-full bg-white border-b border-gray-100 z-50 shadow">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/" title="<?php echo $_ENV['TITLE']; ?>">
                                    Soul Interface (Logo)
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <?php navLink('/', 'Home'); ?>
                                <?php navLink('/bhagavan', 'Bhagavān (God)'); ?>
                                <?php navLink('/jiva', 'Jīva (the soul)'); ?>
                                <?php navLink('/cit', 'Cit (Bhagavān\'s own internal nature)'); ?>
                                <?php navLink('/maya', 'Māyā (the matter)'); ?>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="/" :active="false">
                            Home
                        </x-jet-responsive-nav-link>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="pt-14">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-8 flex flex-col">
                            <?php content(); ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- @yield('js') -->

    </body>
</html>