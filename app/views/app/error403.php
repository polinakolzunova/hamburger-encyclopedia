<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="errorPage">

        <h1>403</h1>
        <p>Permission denied</p>
        <p>У вас нет прав на просмотр страницы [<?=$_SESSION['error-url'];?>]</p>

    </section> <!-- /content -->

    <script src="/js/timer.js"></script>

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>