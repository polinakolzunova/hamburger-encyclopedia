<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="content">
        <h1>Написать нам</h1>

        <div class="wrapper inner">
            <form action="" method="post" class="pretty-form">

                <div class="form-field">
                    <label>Ваше имя</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-field">
                    <label>Ваше e-mail</label>
                    <input type="text" name="email" required>
                </div>

                <div class="form-field">
                    <label>Текст сообщения</label>
                    <textarea name="text" rows="10" required></textarea>
                </div>

                <div class="form-field">
                    <button type="submit">Отправить</button>
                </div>

            </form>
        </div>

    </section> <!-- /content -->

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>