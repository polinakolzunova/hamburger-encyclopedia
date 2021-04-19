<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="popular" class="content">

        <h1>Каталог</h1>

        <div class="burgers-filter">
            <div class="wrapper inner">
                <form class="pretty-form" action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
                    <div class="form-field">
                        <label>Название</label>
                        <input type="text" name="name"
                               value="<?=(isset($_POST['name'])) ? $_POST['name'] : "";?>">
                    </div>
                    <div class="form-field">
                        <label>Страна</label>
                        <select id="country" name="country">
                            <option value="" <?=(empty($_POST['country'])) ? 'selected' : '';?>>-</option>
							<?php foreach ($countries as $country): ?>
                                <option value="<?=$country['id'];?>"
									<?=(!empty($_POST['country']) and $_POST['country'] == $country['id']) ? 'selected' : '';?>>
									<?=$country['name'];?>
                                </option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Описание</label>
                        <input type="text" name="text"
                               value="<?=(isset($_POST['text'])) ? $_POST['text'] : "";?>">
                    </div>
                    <div class="form-field">
                        <button type="reset" onClick="clearSearchForm()">Сбросить</button>
                        <button type="submit">Найти</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="burgers-sort">
            <div class="wrapper inner">
                <p>Сортировка по:</p>
                <a href="?sort_by=name&sort_dir=asc"
                   class=<?=($_GET['sort_by']=="name" and $_GET['sort_dir']=="asc") ? "active" : "";?>>
                    имени (по возрастанию)</a>
                <a href="?sort_by=name&sort_dir=desc"
                   class=<?=($_GET['sort_by']=="name" and $_GET['sort_dir']=="desc") ? "active" : "";?>>
                    имени (по убыванию)</a>
                <a href="?sort_by=rate_count&sort_dir=asc"
                   class=<?=($_GET['sort_by']=="rate_count" and $_GET['sort_dir']=="asc") ? "active" : "";?>>
                    популярности (сначала с меньшим кол-вом оценок)</a>
                <a href="?sort_by=rate_count&sort_dir=desc"
                   class=<?=($_GET['sort_by']=="rate_count" and $_GET['sort_dir']=="desc") ? "active" : "";?>>
                    популярности (сначала с большим кол-вом оценок)</a>
                <a href="?sort_by=id&sort_dir=asc"
                   class=<?=($_GET['sort_by']=="id" and $_GET['sort_dir']=="asc") ? "active" : "";?>>
                    новизне (сначала старые)</a>
                <a href="?sort_by=id&sort_dir=desc"
                   class=<?=($_GET['sort_by']=="id" and $_GET['sort_dir']=="desc") ? "active" : "";?>>
                    новизне (сначала новые)</a>
            </div>
        </div>

        <div class="burgers-list">
			<?php foreach ($burgers as $burger): ?>
                <a href="/burger?id=<?=$burger["id"];?>" class="burger-item">
                    <div class="image"><img src="<?=$burger["image"];?>" alt="burger"></div>
                    <div class="description">
                        <div class="title"><?=$burger["name"];?></div>
                        <div class="country"><?=$burger["country"];?></div>
                        <div class="rate">
							<?=($burger["rate_count"] > 0) ? round($burger["rate_amount"] / $burger["rate_count"], 2) : 0;?>
                            / 5
                        </div>
                        <div class="text"><?=substr($burger["text"], 0, 170);?> ...</div>
                    </div>
                </a>
			<?php endforeach; ?>
        </div>

    </section> <!-- /content -->

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>