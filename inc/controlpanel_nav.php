<?php	

		if(isset($_SESSION['sUserID']))
		{
			$conn = sqlsrv_connect($__CONFIG['SQLHost'], array("Database"=>$__CONFIG['SQLDB'], "UID"=>$__CONFIG['SQLUID'], "PWD"=>$__CONFIG['SQLPWD']));
			if(!$conn){
				echo print_r(sqlsrv_errors(), true);
			}else{
				$checkAccount = sqlsrv_query($conn, "SELECT * FROM Account.dbo.tUser WHERE nUserNo = ?", array($_SESSION['sUserNo']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
				if(sqlsrv_num_rows($checkAccount) == 1){
					$fetchAccount = sqlsrv_fetch_array($checkAccount);
					$_SESSION['nCoins'] = (isset($fetchAccount['sCSCoins']) ? $fetchAccount['sCSCOins'] : '0' ) ;
					$_SESSION['nBonusCoins'] = (isset($fetchAccount['sVoteCoins']) ? $fetchAccount['sVoteCoins'] : '0' ) ;
				}
			}
		}
			
		
		
		echo '
			<div id="user_login">
					<div class="row2_head">User Control Panel</div>
						<div id="user_loggedin_content">
					
						<div id="welcome">Welcome <span class="user_color">'.$_SESSION['sUserID'].'</span>!</div>
						<div id="d_points_show"><img class="coins" src="img/coins.png" />You have <span class="ammount_color">'.$_SESSION['nCoins'].'</span> '.$currency_name.'
						</div>
						<div id="v_points_show"><img class="points" src="img/points.png" />You have <span class="ammount_color">'.$_SESSION['nBonusCoins'].'</span> '.$currency_name2.'
						</div>
							<div id="loggedin_navi">
							<ul>
								<li><a href="'.$navigation_loggedin_href["editprofile_h"].'"><img class="arrow" src="img/arrow.png" />Change Password</a></li>
								<li><a href="'.$navigation_loggedin_href["gameaccounts_h"].'"><img class="arrow" src="img/arrow.png" />User Panel</a></li>
								<li><a href="'.$navigation_loggedin_href["item_shop"].'"><img class="arrow" src="img/arrow.png" />Item Mall</a></li>
								<li><a href="'.$navigation_loggedin_href["donation_h"].'"><img class="arrow" src="img/arrow.png" />Charge '.$currency_name.'</a></li>
								<li><a href="'.$navigation_loggedin_href["logout_h"].'"><img class="arrow" src="img/arrow.png" />Logout</a></li>
							</ul>
						</div>
					</div>
					<div class="row2_bottom"></div>
			</div>';
?>