<?php 
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch($request) {
        case '/sporttime_template/public/anasayfa':
            $page_title = 'Ana Sayfa - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/iletisim':
            $page_title = 'İletişim - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/galeri':
            $page_title = 'Galeri - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/paketler':
            $page_title = 'Paketler - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/on-kayit':
            $page_title = 'Ön Kayıt - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/success':
            $page_title = 'Ödeme Bilgisi - Sporttime Fitness'; 
            break;
        case '/sporttime_template/public/admin':
            $page_title = 'Admin - Linrime'; 
            break;
        case '/sporttime_template/public/forgot-password':
            $page_title = 'Forgot Password - Linrime'; 
            break;
        case '/sporttime_template/public/dashboard':
            $page_title = 'Dashboard - Linrime'; 
            break;
        default:
            http_response_code(404);
            $page_title = '404 - Sporttime Fitness'; 
            break;
    }
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : $title; ?></title>
    <?php 
        $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (str_contains($request, 'admin') 
        || str_contains($request, 'dashboard') 
        || str_contains($request, 'forgot-password')) {
            echo '<link rel="stylesheet" href="/sporttime_template/public/css/admin.css" />';
        }
        else {
            echo '<link rel="stylesheet" href="/sporttime_template/public/css/app.css" />
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
            />';
        }
    ?>
    
    <script
      src="https://kit.fontawesome.com/2227aa2941.js"
      crossorigin="anonymous"
    ></script>
</head>