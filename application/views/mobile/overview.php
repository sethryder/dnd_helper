<?php
$quick_hp = array(
                'name' => 'quick_hp',
                'id'   => 'quick_hp',
                //'value'=> $character['hitpoints'],
                'maxlength' => '4',
                'size' => '4',
                'style' => 'width: 2em;'
                );
                
$quick_exp = array(
                'name' => 'quick_exp',
                'id'   => 'quick_exp',
                'maxlength' => '10',
                'size' => '10',
                'style' => 'width: 2em;'
                );
                
$quick_gold = array(
                'name' => 'quick_gold',
                'id'   => 'quick_gold',
                'maxlength' => '9',
                'size' => '9',
                'style' => 'width: 2em;'
                );
?>
<ul class="pageitem">
	<li class="textbox">
    <center>
		Hello, <?php echo($character['name']); ?>!<br />Level  <?php echo($character['level'].' '.$character['race'].' '.$character['class']); ?>
	</center>
    </li>
</ul>
<ul class="pageitem">
	<li class="textbox">
    <center><b>Quick View</b></center>
		<table align="center">
        <?php echo form_open('player') ?>
			<tr>
				<td align="right">Hitpoints :</td>
				<td align="center"><b><?php echo($character['hitpoints']); ?> (<?php echo($character['max_hitpoints']); ?>)</b> </td>
                <td align="left"> <?php echo form_input($quick_hp) ?></td>
			</tr>			
            <tr>
				<td align="right">Experience :</td>
                <td align="center"><b><?php echo($character['experience']); ?></b> </td>
				<td align="left"> <?php echo form_input($quick_exp) ?></td>
			</tr>
			<tr>
				<td align="right">Gold :</td>
                <td align="center"><b><?php echo($character['gold']); ?></b> </td>
				<td align="left"> <?php echo form_input($quick_gold) ?></td>
			</tr>
		</table>
        <center>
        <?php echo form_submit('submit', 'Update'); ?>
        <?php echo form_close(); ?>
        </center>
	</li>
</ul>
<ul class="pageitem">
	<li class="textbox">
    <center><b>Quick Stats</b></center>
		<table align="center">
            <tr>
				<td align="right">Armor Class :</td>
				<td align="left"><?php echo($character['ac']); ?></td>
			</tr>	
			<tr>
				<td align="right">Perception :</td>
				<td align="left"><?php echo($character['perception']); ?></td>
			</tr>			
			<tr>
				<td align="right">Apperance :</td>
				<td align="left"><?php echo($character['apperance']); ?></td>
			</tr>            
            <tr>
				<td align="right">Strength :</td>
				<td align="left"><?php echo($character['str']); ?></td>
			</tr>
			<tr>
				<td align="right">Dexterity :</td>
				<td align="left"><?php echo($character['dex']); ?></td>
			</tr>
			<tr>
				<td align="right">Constitution :</td>
				<td align="left"><?php echo($character['con']); ?></td>
			</tr>
			<tr>
				<td align="right">Intellect :</td>
				<td align="left"><?php echo($character['int']); ?></td>
			</tr>
			<tr>
				<td align="right">Wisdom :</td>
				<td align="left"><?php echo($character['wis']); ?></td>
			</tr>
			<tr>
				<td align="right">Charisma :</td>
				<td align="left"><?php echo($character['cha']); ?></td>
			</tr>            
			<tr>
		</table>
	</li>
</ul>
<ul class="pageitem">
	<li class="menu"><a href="/player/stats">
			<span class="name">Stats</span><span class="arrow"></span></a>
	</li>
	<li class="menu"><a href="/player/weapons">
			<span class="name">Weapon / Skills / Proficiencies</span><span class="arrow"></span></a>
	</li>
	<li class="menu"><a href="/player/backpack">
			<span class="name">Backpack</span><span class="arrow"></span></a>
	</li>				
	<li class="menu"><a href="/player/journal">
			<span class="name">Journal</span><span class="arrow"></span></a>
	</li>	
</ul>