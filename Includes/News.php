<?php If ($Website_Token == "CopyrightByRefleXx"){?>
					<?php
						if(isset($_GET['module']) && !empty($_GET['module'])) {
							if(file_exists(realpath('./module/')."/".$_GET['module'].".php")) {
								include(realpath('./module/')."/".$_GET['module'].".php");
							}else{
								include(realpath('./module/').'/news.php');
							}
						}else{
							include(realpath('./module/').'/news.php');
						}
					?>	
<?php }else{
	echo "DONT LEACH HERE!!!";
}?>