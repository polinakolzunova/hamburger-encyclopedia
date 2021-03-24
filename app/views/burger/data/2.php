<?php require PROJECT_PATH . '/app/views/templates/header.php'; ?>

	<section id="one-burger">
		<div class="image">
			<img src="img/burger2.jpg" alt="burger">
		</div>
		<h1>Название бургера 2</h1>
		<div class="description">
			<div class="info">
				<p>Страна: США</p>
				<p>Рейтинг: 4.4 / 5</p>
				<p>Ингридиенты: зерновая булочка, огурец, помидор, говяжья котлета, соус классический, листовой
					салат</p>
			</div>
			<div class="text">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi asperiores beatae blanditiis consequuntur cupiditate dolorem ea id impedit iure magnam natus necessitatibus nisi nostrum nulla possimus praesentium quaerat quas quasi quia quidem quos, repellat saepe similique soluta sunt tempore unde velit? Debitis eaque earum esse fuga id itaque, iure, laudantium nesciunt nostrum quaerat quidem ratione saepe sit sunt tempora ullam voluptatibus! Architecto eligendi harum, incidunt labore sequi sint tempore. Vel?</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquam enim esse et magnam
					nulla provident quasi totam voluptatum!</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam consequatur culpa debitis
					dicta dolor dolorem, dolorum expedita fugit harum necessitatibus omnis possimus, quia rem soluta ut
					velit, voluptate? Asperiores atque blanditiis deserunt, dicta, distinctio, dolorem dolores impedit
					magnam molestiae praesentium tempore ullam. Assumenda distinctio esse illum impedit labore non
					officia omnis perferendis quae, qui quisquam quo quod, reiciendis. A culpa, quasi. Aperiam
					exercitationem quam sed vitae voluptatem! Ducimus, possimus!
				</p>
			</div>
		</div>
		<form class="rate">
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