<?php require_once (APPROOT . '/View/base/header.php'); ?>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    
    <?php require_once (APPROOT . "/View/base/nav.php"); ?>

    <main class="px-3">
        <h1>صفحه خود را بپوشانید.</h1>
        <p class="lead">این یک قالب ساده برای ساخت صفحات اصلی زیبا است. می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.</p>
        <p class="lead">
            <a href="<?php echo URLROOT; ?>articles/index" class="btn btn-lg btn-light fw-bold border-white bg-white">
                افزودن مقاله
            </a>
        </p>
    </main>

<?php require_once (APPROOT . '/View/base/footer.php'); ?>