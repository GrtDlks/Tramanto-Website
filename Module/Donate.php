<?php If ($Website_Token == "CopyrightByRefleXx"){?>
<div id="headline">
        				<div id="title">Edit profil</div>
            			<div id="author"><div class="author">Erstelle Dir jetzt Deinen Account und betrete die Welt der Illusion!</div></div>
        			</div>
					<div id="reg_formular">
					<?php
if(isset($_SESSION['sUserID'])){ ?>
<?php echo '<center><iframe src="https://wall.superrewards.com/super/offers?h=imvggxhflpr.38303559611&uid='.$_SESSION['sUserNo'].'" frameborder="0" width="700" height="2400" scrolling="no"></iframe></center>'; ?>
<?php }else{
	echo "Du bist nicht eingeloggt";
}?>
<?php					
}else{
	echo "DONT LEACH HERE!!!";
}?></div>