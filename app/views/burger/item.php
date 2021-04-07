<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="one-burger">
        <div class="image">
            <img src="<?=$burger["image"];?>" alt="<?=$burger["name"];?>">
        </div>
        <h1>
            <?=$burger["name"];?>
            <a class="btn" href="/burger/edit?id=<?=$burger['id'];?>">edit</a>
            <a class="btn" href="/burger/delete?id=<?=$burger['id'];?>">delete</a>
        </h1>
        <div class="description">
            <div class="info">
                <p>Страна: <?=$burger["country"];?></p>
                <p>Рейтинг: <?=($burger["rate_count"] > 0) ? round($burger["rate_amount"] / $burger["rate_count"], 2) : 0;?> / 5</p>
                <p>Ингридиенты: <?=$burger["ingredients"];?></p>
            </div>
            <div class="text">
	            <?=$burger["text"];?>
            </div>
        </div>
        <form class="rate" action="/burger/rate?id=<?=$burger["id"];?>" method="post">
            <div class="rate-container">
                <div class="rate-field">
                    <input type="radio" name="rate" value="5" id="rate5" checked>
                    <label for="rate5">&starf;&starf;&starf;&starf;&starf;</label>
                </div>
                <div class="rate-field">
                    <input type="radio" name="rate" value="4" id="rate4">
                    <label for="rate4">&starf;&starf;&starf;&starf;</label>
                </div>
                <div class="rate-field">
                    <input type="radio" name="rate" value="3" id="rate3">
                    <label for="rate3">&starf;&starf;&starf;</label>
                </div>
                <div class="rate-field">
                    <input type="radio" name="rate" value="2" id="rate2">
                    <label for="rate2">&starf;&starf;</label>
                </div>
                <div class="rate-field">
                    <input type="radio" name="rate" value="1" id="rate1">
                    <label for="rate1">&starf;</label>
                </div>
            </div>
            <button type="submit">Оценить</button>
        </form>
    </section> <!-- /content -->

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>