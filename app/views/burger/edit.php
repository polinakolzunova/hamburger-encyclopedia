<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <section id="edit-burger">

        <h1>Редактирование бургера №<?=$burger['id'];?></h1>

        <div class="wrapper inner">
            <form action="<?=$_SERVER['REQUEST_URI'];?>"
                  enctype="multipart/form-data"
                  method="post"
                  class="pretty-form">

                <div class="form-field">
                    <label>Название</label>
                    <input type="text" name="name" value="<?=$burger['name'];?>">
                </div>

                <div class="form-field">
                    <label>Страна</label>
                    <select id="country" name="country_id">
                        <option value="" <?=(empty($_POST['country'])) ? 'selected' : '';?>>-</option>
						<?php foreach ($countries as $country): ?>
                            <option value="<?=$country['id'];?>"
								<?=($burger['country'] == $country['name']) ? 'selected' : '';?>>
								<?=$country['name'];?>
                            </option>
						<?php endforeach; ?>
                    </select>
                </div>

                <div class="form-field">
                    <label>Ингридиенты</label>
                    <textarea name="ingredients" rows="3"><?=$burger['ingredients'];?></textarea>
                </div>

                <div class="form-field">
                    <label>Описание</label>
                    <textarea name="text" rows="10"><?=$burger['text'];?></textarea>
                </div>

                <div class="form-field">
                    <label>Изображение</label>
                    <input type="file" name="image_file">
                </div>

                <div class="form-field">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </section>


<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>