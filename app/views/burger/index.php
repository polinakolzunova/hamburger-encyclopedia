<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="popular" class="content">
        <h1>Каталог</h1>
        <div class="burgers-filter">
            <div class="wrapper inner">
                <form action="">
                    <div class="form-field">
                        <label>Название</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-field">
                        <label>Страна</label>
                        <select id="country" name="country">
                            <option value="none" selected>-</option>
                            <option value="usa">USA</option>
                            <option value="germany">Germany</option>
                            <option value="poland">Poland</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Описание</label>
                        <input type="text" name="text">
                    </div>
                    <div class="form-field">
                        <button type="reset">Сбросить</button>
                        <button type="submit">Найти</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="burgers-sort">
            <div class="wrapper inner">
                <p>Сортировка по:</p>
                <a href="?sort=by_name_asc" class="active">имени (по возрастанию)</a>
                <a href="?sort=by_name_desc">имени (по убыванию)</a>
                <a href="?sort=by_rate_asc">рейтингу (сначала меньше)</a>
                <a href="?sort=by_rate_desc">рейтингу (сначала больше)</a>
                <a href="?sort=by_new_asc">новизне (сначала новые)</a>
                <a href="?sort=by_new_desc">новизне (сначала старые)</a>
            </div>
        </div>
        <div class="burgers-list">

            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burder0.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>

            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>
            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burder0.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>
            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burger3.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>
            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burger4.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>
            <a href="one-burger.html" class="burger-item">
                <div class="image"><img src="img/burger5.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime
                        quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe
                        vel!
                    </div>
                </div>
            </a>
        </div>
    </section> <!-- /content -->

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>