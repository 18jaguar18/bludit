<h1 class="title"><?php echo $Site->title() ?></h1>
<h2 class="slogan"><?php echo $Site->slogan() ?></h2>

<!-- Plugins -->
<?php
	Theme::plugins('onSiteSidebar');
?>