<h2 class="title"><i class="fa fa-pencil"></i> <?php $Language->p('Edit post') ?></h2>

<form method="post" action="" class="forms">

	<input type="hidden" id="jskey" name="key" value="<?php echo $_Post->key() ?>">

	<label>
		<?php $Language->p('Title') ?>
		<input id="jstitle" name="title" type="text" class="width-80" value="<?php echo $_Post->title() ?>">
	</label>

	<label>
		<?php $Language->p('Content') ?> <span class="forms-desc"><?php $Language->p('HTML and Markdown code supported') ?></span>
		<textarea id="jscontent" name="content" rows="15" class="width-80"><?php echo $_Post->contentRaw(false) ?></textarea>
	</label>

	<button id="jsadvancedButton" class="btn btn-smaller"><?php $Language->p('Advanced options') ?></button>

	<div id="jsadvancedOptions">

    	<label>
	    	<?php $Language->p('Date') ?>
		<input name="date" id="jsdate" type="text" value="<?php echo $_Post->date() ?>">
		<span class="forms-desc"><?php $Language->p('You can schedule the post just select the date and time') ?></span>
	</label>

	<label>
		<?php $Language->p('Friendly Url') ?>
		<div class="input-groups width-50">
		<span class="input-prepend"><?php echo $Site->urlPost() ?><span id="jsparentExample"></span></span>
		<input id="jsslug" type="text" name="slug" value="<?php echo $_Post->slug() ?>">
		</div>
		<span class="forms-desc"><?php $Language->p('you-can-modify-the-url-which-identifies') ?></span>
	</label>

	<label>
		<?php $Language->p('Description') ?>
		<input id="jsdescription" type="text" name="description" class="width-50" value="<?php echo $_Post->description() ?>">
		<span class="forms-desc"><?php $Language->p('this-field-can-help-describe-the-content') ?></span>
	</label>

	<label>
		<?php $Language->p('Tags') ?>
		<input id="jstags" name="tags" type="text" class="width-50" value="<?php echo $_Post->tags() ?>">
		<span class="forms-desc"><?php $Language->p('write-the-tags-separeted-by-comma') ?></span>
	</label>

	</div>

	<button class="btn btn-blue" name="publish"><?php echo ($_Post->published()?$Language->p('Save'):$Language->p('Publish')) ?></button>
	<button class="btn" name="draft"><?php $Language->p('Draft') ?></button>
	<button id="jsdelete" class="btn" name="delete"><?php $Language->p('Delete') ?></button>

</form>

<script>

$(document).ready(function()
{
	var key = $("#jskey").val();

	$("#jsdate").datetimepicker({format:"<?php echo DB_DATE_FORMAT ?>"});

	$("#jstitle").keyup(function() {
		var slug = $(this).val();
		checkSlugPost(slug, key, $("#jsslug"));
	});

	$("#jsslug").keyup(function() {
		var slug = $("#jsslug").val();
		checkSlugPost(slug, key, $("#jsslug"));
	});

	$("#jsdelete").click(function() {
		if(confirm("<?php $Language->p('confirm-delete-this-action-cannot-be-undone') ?>")==false) {
			return false;
		}
	});

	$("#jsadvancedButton").click(function() {
		$("#jsadvancedOptions").slideToggle();
		return false;
	});

});

</script>