<?php 
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch($request) {
        case '/sporttime_template/public/anasayfa':
            $page_title = 'Ana Sayfa - Sporttime Fitness'; 
            require __DIR__ . '/views/home.php';
            break;
        case '/sporttime_template/public/iletisim':
            require __DIR__ . '/views/contact.php';
            break;
        case '/sporttime_template/public/galeri':
            require __DIR__ . '/views/gallery.php';
            break;
        case '/sporttime_template/public/paketler':
            require __DIR__ . '/views/price.php';
            break;
        case '/sporttime_template/public/on-kayit':
            require __DIR__ . '/views/sign.php';
            break;
        case '/sporttime_template/public/admin':
            require __DIR__ . '/views/admin/login.php';
            break;
        case '/sporttime_template/public/dashboard':
            require __DIR__ . '/views/admin/dashboard.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
    }

    ?>