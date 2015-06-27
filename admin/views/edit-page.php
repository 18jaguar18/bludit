<h2 class="title"><i class="fa fa-pencil"></i> Edit page</h2>

<form method="post" action="" class="forms">

    <input type="hidden" id="jsKey" name="key" value="<?php echo $_Page->key() ?>">

    <label>
        Title
        <input id="jsTitle" name="title" type="text" class="width-70" value="<?php echo $_Page->title() ?>">
    </label>

    <label>
        Content <span class="forms-desc">HTML and Markdown code supported.</span>
        <textarea name="content" rows="10" class="width-70"><?php echo $_Page->contentRaw() ?></textarea>
    </label>

<?php
    if($Site->advancedOptions()) {
        echo '<div id="jsAdvancedOptions">';
    }
    else
    {
        echo '<p class="advOptions">Enable more features at <a href="'.HTML_PATH_ADMIN_ROOT.'settings#advanced">Settings->Advanced->Writting Settings</a></p>';
        echo '<div id="jsAdvancedOptions" style="display:none">';
    }
?>

    <h4>Advanced options</h4>

    <?php
        // Remove pages parents if the page is a parent.
        if(count($_Page->children())===0)
        {
    ?>

    <label for="jsParent">
        Page parent
        <select id="jsParent" name="parent" class="width-50">
        <?php
            $htmlOptions[NO_PARENT_CHAR] = '(No parent)';
            $htmlOptions += $dbPages->parentKeyList();
            unset($htmlOptions[$_Page->key()]);
            foreach($htmlOptions as $value=>$text) {
                echo '<option value="'.$value.'"'.( ($_Page->parentKey()===$value)?' selected="selected"':'').'>'.$text.'</option>';
            }
        ?>
        </select>
        <div class="forms-desc">Tip/Help ???</div>
    </label>

    <?php } ?>

    <label>
        Friendly url
        <div class="input-groups width-50">
            <span class="input-prepend"><?php echo $Site->url() ?><span id="jsParentExample"><?php echo $_Page->parentKey()?$_Page->parentKey().'/':''; ?></span></span>
            <input id="jsSlug" type="text" name="slug" value="<?php echo $_Page->slug() ?>">
        </div>
        <span class="forms-desc">Short text no more than 150 characters. Special characters not allowed.</span>
    </label>

    <label>
        Description
        <input id="jsDescription" type="text" name="description" class="width-50" value="<?php echo $_Page->description() ?>">
        <span class="forms-desc">This field is for Twitter/Facebook/Google+ descriptions. No more than 150 characters.</span>
    </label>

    <label>
        Tags
        <input id="jsTags" name="tags" type="text" class="width-50" value="<?php echo $_Page->tags() ?>">
        <span class="forms-desc">Write the tags separeted by comma. eg: tag1, tag2, tag3</span>
    </label>

    <label>
        Position
        <input id="jsPosition" name="position" type="text" class="width-20" value="<?php echo $_Page->position() ?>">
    </label>

    </div>

    <button class="btn btn-blue" name="publish"><i class="fa fa-sun-o fa-right"></i>Save</button>

    <?php if(count($_Page->children())===0) { ?>
    <button class="btn" name="draft"><i class="fa fa-circle-o fa-right"></i>Draft</button>
    <button class="btn" name="delete"><i class="fa fa-remove fa-right"></i>Delete</button>
    <?php } ?>

</form>

<script>

$(document).ready(function()
{
    var key = $("#jsKey").val();

    $("#jsSlug").keyup(function() {
        var text = $(this).val();
        var parent = $("#jsParent").val();

        checkSlugPage(text, parent, key, $("#jsSlug"));
    });

    $("#jsTitle").keyup(function() {
        var text = $(this).val();
        var parent = $("#jsParent").val();

        checkSlugPage(text, parent, key, $("#jsSlug"));
    });

    $("#jsParent").change(function() {
        var parent = $(this).val();
        var text = $("#jsSlug").val();

        if(parent==NO_PARENT_CHAR) {
            $("#jsParentExample").text("");
        }
        else {
            $("#jsParentExample").text(parent+"/");
        }

        checkSlugPage(text, parent, key, $("#jsSlug"));
    });

});

</script>
