<h2 class="title"><?php $Language->p('Dashboard') ?> </h2>

<div class="units-row">

	<div class="unit-40">

		<div class="dashboardBox">
			<div class="content contentBlue">
				<div class="bigContent"><?php echo $dbPosts->count() ?></div>
				<div class="littleContent"><?php $Language->p('Posts') ?></div>
				<i class="iconContent fa fa-pie-chart"></i>
			</div>
		</div>

		<div class="dashboardBox">
			<div class="content contentGreen">
				<div class="bigContent"><?php echo $dbUsers->count() ?></div>
				<div class="littleContent"><?php $Language->p('Users') ?></div>
				<i class="iconContent fa fa-user"></i>
			</div>
		</div>

	</div>

	<div class="unit-60">
		<?php if($_newPosts || $_newPages) { ?>
		<div class="dashboardBox">
			<div class="content contentGreen">
				<div class="bigContent"><?php $Language->p('database-regenerated') ?></div>
				<div class="littleContent"><?php $Language->p('new-posts-and-pages-synchronized') ?></div>
				<i class="iconContent fa fa-pie-chart"></i>
			</div>
		</div>
		<?php } ?>
		<div class="dashboardBox">
			<h2><?php $Language->p('notifications') ?></h2>
			<div class="content">
				<nav class="nav">
				<ul>
				<li>New comment</li>
				<li>Admin session started at 07:00pm</li>
				<li>Failed login with username diego</li>
				<li>Database regenerated</li>
				<li>New session started at 01:00pm</li>
				<li>New post added</li>
				<li>New page added</li>
				</ul>
				</nav>
			</div>
		</div>

	</div>

</div>