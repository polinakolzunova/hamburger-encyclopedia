<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <!-- флеш-сообшение об ошибке -->
<?php if (isset($_SESSION['flesh-error'])): ?>
    <div class="alert alert-danger" role="alert">
		<?=$_SESSION['flesh-error'];?>
    </div>
	<?php unset($_SESSION['flesh-error']); ?>
<?php endif; ?>

    <!-- флеш-сообшение об успехе -->
<?php if (isset($_SESSION['flesh-success'])): ?>
    <div class="alert alert-success" role="alert">
		<?=$_SESSION['flesh-success'];?>
    </div>
	<?php unset($_SESSION['flesh-success']); ?>
<?php endif; ?>

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

			<?php foreach ($burgers as $burger): ?>
                <a href="/burger?id=<?=$burger["id"];?>" class="burger-item">
                    <div class="image"><img src="<?=$burger["image"];?>" alt="burger"></div>
                    <div class="description">
                        <div class="title"><?=$burger["name"];?></div>
                        <div class="country"><?=$burger["country"];?></div>
                        <div class="rate"><?=($burger["rate_count"] > 0) ? $burger["rate_amount"] / $burger["rate_count"] : 0.0;?>
                            / 5
                        </div>
                        <div class="text"><?=substr($burger["text"], 0, 170);?> ...</div>
                    </div>
                </a>
			<?php endforeach; ?>

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
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci animi
                    aperiam
                    at consequatur, consequuntur cupiditate delectus eaque eius error inventore itaque iure iusto
                    laudantium
                    modi molestiae mollitia nesciunt quae quia quisquam, quod sequi voluptate voluptatibus! Asperiores
                    eum
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