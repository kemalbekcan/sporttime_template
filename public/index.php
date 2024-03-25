<!DOCTYPE html>
<html lang="tr">
<?php include 'partials/head.php'; ?>
<?php
$navigation = '';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
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
    case '/sporttime_template/public/success':
        $class_name = 'success-page';
        break;
    case '/sporttime_template/public/404':
        $class_name = '404-page';
        break;
    case '/sporttime_template/public/gizlilik-politikasi':
        $class_name = 'privacy-policy-page';
        break;
    case '/sporttime_template/public/mesafeli-satis-sozlesmesi':
        $class_name = 'contract-page';
        break;
    case '/sporttime_template/public/sozlesmenin-feshi-ve-iade':
        $class_name = 'agreement-page';
        break;
    case '/sporttime_template/public/hakkimizda':
        $class_name = 'about-us-page';
        break;
}
?>

<body class="<?php echo $class_name ?>">
    <?php
    $navigation = '';

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($request) {
        case '/sporttime_template/public/anasayfa':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/iletisim':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/galeri':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/paketler':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/on-kayit':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/gizlilik-politikasi':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/mesafeli-satis-sozlesmesi':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/sozlesmenin-feshi-ve-iade':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/hakkimizda':
            $navigation = 'navigation.php';
            break;
        case '/sporttime_template/public/admin':
            break;
        case '/sporttime_template/public/forgot-password':
            break;
        case '/sporttime_template/public/dashboard':
            break;
        case '/sporttime_template/public/404':
            $navigation = 'navigation.php';
            break;
    }
    ?>

    <?php if ($navigation !== '') : ?>
        <?php include 'partials/' . $navigation; ?>
    <?php endif; ?>

    <?php
    if (!str_contains($request, 'admin') && !str_contains($request, 'dashboard') && !str_contains($request, 'forgot-password')) {
        include './partials/mobile-navigation.php';
    }
    ?>

    <main>
        <?php include 'router.php'; ?>
    </main>

    <?php
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (!str_contains($request, 'admin') && !str_contains($request, 'dashboard') && !str_contains($request, 'forgot-password')) {
        include 'partials/footer.php';
    }
    ?>

    <script src="js/script.js"></script>
    <script type="module">
        import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

        var swiper1 = new Swiper(".banner", {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",

            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper2 = new Swiper(".teams", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1090: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1450: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1800: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
            },

        })

        var swiper3 = new Swiper(".line-gallery", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            breakpoints: {
                430: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                650: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                830: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1030: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
                1240: {
                    slidesPerView: 6,
                    spaceBetween: 10,
                },
                1450: {
                    slidesPerView: 7,
                    spaceBetween: 10,
                },
                1630: {
                    slidesPerView: 8,
                    spaceBetween: 10,
                },
            },
        });
    </script>
</body>

</html>