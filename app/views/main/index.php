<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="promo">
        <div class="text">
            самая<br> полная<br> энциклопедия<br> бургеров *
            <p class="subtext">* - никаких "но", _самая_ полная</p>
        </div>
    </section> <!-- /promo -->

    <section id="question">
        <p>думаете,<br> что знаете о бургерах все?</p>
    </section> <!-- /question -->

    <section id="popular">
        <div class="burgers-list">

            <a href="/burger?id=1" class="burger-item">
                <div class="image"><img src="img/burder0.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>

            <a href="/burger?id=2" class="burger-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>
            <a href="/burger?id=3" class="burger-item">
                <div class="image"><img src="img/burder0.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>
            <a href="/burger?id=4" class="burger-item">
                <div class="image"><img src="img/burger3.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>
            <a href="/burger?id=5" class="burger-item">
                <div class="image"><img src="img/burger4.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>
            <a href="/burger?id=6" class="burger-item">
                <div class="image"><img src="img/burger5.jpg" alt="burger"></div>
                <div class="description">
                    <div class="title">Супербургер</div>
                    <div class="country">США</div>
                    <div class="rate">4.4 / 5</div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa maxime quos tenetur voluptatem voluptates? Distinctio ipsam iste iusto laborum neque nihil, nobis saepe vel!</div>
                </div>
            </a>
        </div>
        <p class="big-btn"><a href="catalog.html">Узнать больше</a></p>
    </section> <!-- /popular -->

    <section id="articles">
        <h2>Статьи</h2>
        <p class="sub-title">- Все самое интересное -</p>
        <div class="articles-list">
            <div class="articles-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <p class="title">
                    Наша новая статья <a href="one-article.html">Читать</a>
                </p>
            </div>
            <div class="articles-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <div class="title">
                    Наша новая статья
                    <a href="one-article.html">Читать</a>
                </div>
            </div>
            <div class="articles-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <div class="title">
                    Наша новая статья
                    <a href="one-article.html">Читать</a>
                </div>
            </div>
            <div class="articles-item">
                <div class="image"><img src="img/burger2.jpg" alt="burger"></div>
                <div class="title">
                    Наша новая статья
                    <a href="one-article.html">Читать</a>
                </div>
            </div>
        </div>
        <p class="big-btn"><a href="articles.html">Читать все</a></p>
    </section> <!-- /articles -->

    <section id="topburger">
        <div class="wrapper">
            <div class="about">
                <h2>Бургер №1</h2>
                <p class="sub-title">- Голосуй за свой любимый бургер -</p>
                <h3>Название супербургера</h3>
                <div class="country">США</div>
                <div class="rate">4.8 / 5</div>
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci animi aperiam
                    at consequatur, consequuntur cupiditate delectus eaque eius error inventore itaque iure iusto laudantium
                    modi molestiae mollitia nesciunt quae quia quisquam, quod sequi voluptate voluptatibus! Asperiores eum
                    nobis nostrum sint! Alias delectus earum nostrum quam quo recusandae tempore vel!
                </div>
                <p class="big-btn"><a href="/burger?id=1">Подробнее...</a></p>
            </div>
            <div class="image">
                <img src="img/burger5.jpg" alt="burger">
            </div>
        </div>
    </section> <!-- /topburger -->

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>