<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Описание события</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Такое замечательное событие и совсем скоро, приходи!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate facere nesciunt odit
                        perferendis quae quis quisquam ratione sit ullam voluptatem. Adipisci alias aliquam asperiores
                        cumque dolor doloribus hic nemo odit, officia quasi quos reprehenderit. Commodi culpa cumque
                        dolorem enim, eveniet facilis ipsa, nemo nesciunt non officiis perspiciatis quisquam repellat
                        voluptates? Architecto atque corporis culpa deserunt eius eligendi esse expedita fuga hic iure
                        magni non omnis porro sapiente sint totam, ullam?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eius libero molestiae odio,
                        quae quas reprehenderit. Dolore doloribus ullam unde.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <section id="event">
        <h1 class="countdown-title">Мое супер-событие</h1>

        <div class="wrapper inner">

            <div class="row justify-content-center">
                <div id="countdown" class="countdown">
                    <div class="countdown-number">
                        <span class="days countdown-time"></span>
                        <span class="countdown-text">Дни</span>
                    </div>
                    <div class="countdown-number">
                        <span class="hours countdown-time"></span>
                        <span class="countdown-text">Часы</span>
                    </div>
                    <div class="countdown-number">
                        <span class="minutes countdown-time"></span>
                        <span class="countdown-text">Минуты</span>
                    </div>
                    <div class="countdown-number">
                        <span class="seconds countdown-time"></span>
                        <span class="countdown-text">Секунды</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                    Посмотреть описание
                </button>
            </div>

        </div>

    </section> <!-- /content -->

    <script src="/js/timer.js"></script>

<?php require PROJECT_PATH . '/app/views/templates/footer.php'; ?>