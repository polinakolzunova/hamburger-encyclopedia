<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="errorPage">

        <h1>404</h1>
        <p>Page not found</p>
        <p>Страница [<?=$_SESSION['error-url'];?>] не найдена</p>

    </section> <!-- /content -->

    <script src="/js/timer.js"></script>

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>