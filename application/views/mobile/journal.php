<ul class="pageitem">
	<li class="textbox">
    <center>
		Hello, <?php echo($character['name']); ?>!<br />Level  <?php echo($character['level'].' '.$character['race'].' '.$character['class']); ?>
	</center>
    </li>
</ul>
<ul class="pageitem">
	<li class="textbox">
    <center><b>Current Backpack</b></center>
		<table align="center">
        <?php echo form_open('player/backpack') ?>
        <?php echo form_hidden('type', 'modify'); ?>
<?php if (isset($backpack)): foreach ($backpack as $item): ?>
			<tr>
                <input type="hidden" name="item_id[]" id="item_id[]" value="<?php echo $item['id']; ?>" />
                <td align="right"><input type="text" name="item_name[]" id="item_name[]" value="<?php echo $item['item_name']; ?>" maxlength="50" /></td>
                <td align="left"><input type="text" name="item_count[]" id="item_count[]" value="<?php echo $item['item_count']; ?>" maxlength="50" style="width: 3em;"/></td>
			</tr>
<?php endforeach; else: ?>
            <center>No Items</center>
<?php endif; ?>
     </table>
     <center><?php echo form_submit('submit', 'Update'); ?></center>
     <?php echo form_close(); ?>
	</li>
</ul>

<ul class="pageitem">
	<li class="textbox">
    <center><b>Add Item</b></center>
		<table align="center">
        <?php echo form_open('player/backpack') ?>
        <?php echo form_hidden('type', 'add'); ?>
			<tr>
				<td align="right"><input type="text" name="item_name" id="item_name" maxlength="50" /></td>
				<td align="left"><input type="text" name="item_count" id="item_count" maxlength="50" style="width: 3em;"/></td>
			</tr>        
     </table>
     <center><?php echo form_submit('submit', 'Add'); ?></center>
     <?php echo form_close(); ?>
	</li>
</ul>


<ul class="pageitem">
	<li class="menu"><a href="/player">
			<span class="name">Overview</span><span class="arrow"></span></a>
	</li>	
	<li class="menu"><a href="stats">
			<span class="name">Stats</span><span class="arrow"></span></a>
	</li>
	<li class="menu"><a href="">
			<span class="name">Weapon / Skills / Proficiencies</span><span class="arrow"></span></a>
	</li>			
	<li class="menu"><a href="journal">
			<span class="name">Journal</span><span class="arrow"></span></a>
	</li>	
</ul>