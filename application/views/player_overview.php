<?php

<h2>Hello, <?php echo($character['name']); ?>! (Level  <?php echo($character['level'].' '.$character['race'].' '.$character['class']); ?>)</h2>
<p>This is a quick overview of your most used information. When playing you should rarely have to use this page. If this page is missing any important information please let me know!</p>

<h2>Quick Edits</h2>
<h3><b>Hit Points:</b> <?php echo($character['hitpoints']); ?></h3>
<h3><b>Expereince:</b> <?php echo($character['experience']); ?></h3>
<h3><b>Gold:</b> <?php echo($character['gold']); ?></h3>
</div> 
<div id="subcontent"> 
<div class="small box"> 


<h2>Stat Overview:</h2>
<h3>Strength: <?php echo($character['str']); ?></h3>
<h3>Dexterity: <?php echo($character['dex']); ?></h3>
<h3>Constitution: <?php echo($character['con']); ?></h3>
<h3>Intellect: <?php echo($character['int']); ?></h3>
<h3>Wisdom: <?php echo($character['wis']); ?></h3>
<h3>Charisma: <?php echo($character['cha']); ?></h3>
</div>

