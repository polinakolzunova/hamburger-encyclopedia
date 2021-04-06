</main>

<footer id="page-footer">
	<div class="footer-menu">
		<div class="wrapper">
			<ul>
				<?php foreach ( $menu as $item ): ?>
                    <li><a href="<?= $item[0]; ?>"><?= $item[1]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="footer-about">
		<div class="wrapper">
			<div class="logo">
				<div class="logo-img"><img src="<?=$sitelogo;?>" alt="logo"></div>
				<div class="logo-title"><?=$sitetitle;?></div>
			</div>
			<div class="contacts">
				<?php foreach ( $social as $item ): ?>
					<div class="footer-vk"><a href="<?= $item[0]; ?>"><?= $item[1]; ?></a></div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

</footer>

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>