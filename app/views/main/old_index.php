<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div id="app" class="container-md">
    <header class="text-center">
        <h1 class="display-3">Задание 3</h1>
        <h3>Просмотр и добавление городов в таблицу</h3>
    </header>

    <!-- флеш-сообшение об ошибке -->
    <?php if(isset($_SESSION['flesh-error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['flesh-error'];?>
        </div>
        <?php unset($_SESSION['flesh-error']); ?>
    <?php endif; ?>

    <!-- флеш-сообшение об успехе -->
    <?php if(isset($_SESSION['flesh-success'])): ?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION['flesh-success'];?>
        </div>
        <?php unset($_SESSION['flesh-success']); ?>
    <?php endif; ?>

    <form method="post" action="create">
        <div class="form-row align-items-stretch">
            <div class="col-10">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" name="city-title" class="form-control mb-2" id="inlineFormInput"
                       placeholder="Введите название города" pattern="^[А-Яа-яЁёa-zA-Z\-\s]{3,255}$" required>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary mb-2">Добавить</button>
            </div>
        </div>
    </form>
    <div class="row">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Код</th>
                <th scope="col">Название города</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($model) == 0): ?>
                <tr>
                    <td class="text-center" colspan="2">Не найдено ни одной записи</td>
                </tr>
            <?php elseif (isset($model['id'])): ?>
                <tr>
                    <th scope="row"><?= $model['id']; ?></th>
                    <td><?= $model['title']; ?></td>
                </tr>
            <?php else: ?>
                <?php foreach ($model as $city): ?>
                    <tr>
                        <th scope="row"><?= $city['id']; ?></th>
                        <td><?= $city['title']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>