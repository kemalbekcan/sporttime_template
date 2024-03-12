<!DOCTYPE html>
<html lang="tr">
<?php include 'partials/head.php'; ?>
<?php
    $navigation = '';
    
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch($request) {
        case '/sporttime_template/public/anasayfa':
            $class_name = 'home-page';
            break;
        case '/sporttime_template/public/iletisim':
            $class_name = 'contact-page';
            break;
        case '/sporttime_template/public/galeri':
            $class_name = 'gallery-page';
            break;
        case '/sporttime_template/public/paketler':
            $class_name = 'price-page';
            break;
        case '/sporttime_template/public/on-kayit':
            $class_name = 'sign-page';
            break;
        case '/sporttime_template/public/404':
            $class_name = '404-page';
            break;
    }
    ?>

<body class="<?php echo $class_name ?>">
<?php
    $navigation = '';
    
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch($request) {
        case '/sporttime_template/public/anasayfa':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/iletisim':
            $navigation = 'fixed-navigation.php';
            break;
        case '/sporttime_template/public/galeri':
            $navigation = 'fixed-navigation.php';
            break;
        case '/sporttime_template/public/paketler':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/on-kayit':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/admin':
            break;
        case '/sporttime_template/public/dashboard':
            break;
        case '/sporttime_template/public/404':
            break;
    }
    ?>

    <?php if ($navigation !== ''): ?>
        <?php include 'partials/' . $navigation; ?>
    <?php endif; ?>

    <?php
    if (!str_contains($request, 'admin') && !str_contains($request, 'dashboard')) {
        include './partials/mobile-navigation.php';
    }
    ?>

    <main>
        <?php include 'router.php'; ?> 
    </main>

    <?php 
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if(!str_contains($request, 'admin') && !str_contains($request, 'dashboard')) {
        include 'partials/footer.php';
    }
    ?>

    <script src="js/script.js"></script>
    <script type="module">
      import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

      const swiper = new Swiper(".swiper", {
        direction: "horizontal",
        slidesPerView: "auto",

        pagination: {
          el: ".swiper-pagination",
        },

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
</body>
</html>