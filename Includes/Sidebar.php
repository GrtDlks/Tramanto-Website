<div id="row2">
		<?php
		if(isset($_SESSION['sUserID']))
		{
			include('inc/controlpanel_nav.php');
		}
		else
		{
			echo '
			<a href="'.$navigation_href["register_h"].'"><div id="register"></div></a>
			<form action="?module=SignUp" method="POST">
			<div id="user_login">
					<div class="row2_head">User Login</div>
					<div id="user_login_content">
						<input type="text" name="username" class="account" placeholder="Username" tabindex="1" />
						<input type="password" name="password" class="password" placeholder="Password" tabindex="2" />
						<div id="user_login_content2">
							<input class="user_login_button" name="LoginSup" type="submit" value=""/>
							<div id="user_login_help">
								<ul>
									<li><a href="'.$navigation_href["register_h"].'">Sign Up</a></li>
									<li><a href="'.$navigation_href["password_h"].'">Forgot your Password?</a></li>

								</ul>
							</div>
						</div>
					</div>
					<div class="row2_bottom"></div>
			</div></form>'; 
		}
		?>
        
        <div id="server_status">
        		<div class="row2_head">PvP Ranking</div>
                <div id="server_status_content">

					

					        			<div id="pvpranking">
						<div id="show_pvp">
							<table>
							    <tr>
									<th class="">Nr.</th>
									<th class="">Name</th>
									<th class="">Kill Points</th>
									<th class="">Level</th>
                                </tr>
					<?php
					
					    // CONFIG
    $odbc_host = '.\SQLEXPRESS';
    $odbc_user = 'sa';
    $odbc_pass = 'LmmVUpfgvTg46yrs';
    // CONFIG END
    $odbc_link = odbc_connect ( "Driver={SQL Server};Server=".$odbc_host.";Database=w00_Character;" , $odbc_user , $odbc_pass );
    ini_set('display_errors', 'On');


    $sql[1] = 'SELECT TOP 10 nCharNo, sID, nPKCount , nLevel FROM tCharacter WHERE nAdminLevel = 0 AND bDeleted = 0  ORDER  BY  nPKCount DESC'; //FROM tCharacter WHERE nAdminLevel = 0 AND bDeleted = 0 
	$rs[1] = odbc_exec ( $odbc_link , $sql[1] );
    if ( !$rs[1] )
        {
        exit ( 'Error in SQL' );
        }
    
    $i = 1;
        
    
    while ( odbc_fetch_row ( $rs[1] ) )
        {
        $sID = odbc_result ( $rs[1] , 'sID' );
        $nPKCount = odbc_result ( $rs[1] , 'nPKCount' );
        $nLevel = odbc_result ( $rs[1] , 'nLevel' );
        $nName = 'Keine Gilde';
        $sID = str_replace ( '?', '&dagger;', str_replace ( '?' , '&auml;' , str_replace ( '?' , '&Auml;' , str_replace ( '?' , '&ouml;' , str_replace ( '?' , '&Ouml;' , str_replace ( '?' , '&uuml;' , str_replace ( '?' , '&Uuml;' , str_replace ( '?' , '&szlig;' , $sID ) ) ) ) ) ) ) );
        
        $nCharNo = odbc_result ( $rs[1] , 'nCharNo' );
        
        $sql[2] = 'SELECT TOP 1 nNo FROM tGuildMember WHERE nCharNo = '.$nCharNo;
        $rs[2] = odbc_exec ( $odbc_link , $sql[2] );
        if ( !$rs[2] )
            {
            exit ( 'Error in SQL' );
            }
        while ( odbc_fetch_row ( $rs[2] ) )
            {
            $nNo = odbc_result ( $rs[2] , 'nNo' );
            $sql[3] = 'SELECT TOP 1 sName FROM tGuild WHERE nNo = '.$nNo;
            $rs[3] = odbc_exec ( $odbc_link , $sql[3] );
            while ( odbc_fetch_row ( $rs[3] ) )
                {
                $nName = odbc_result ( $rs[3] , 'sName' );
                }
            }
            
        $sql[4] = 'SELECT TOP 1 nClass FROM tCharacterShape WHERE nCharNo = '.$nCharNo;
        $rs[4] = odbc_exec ( $odbc_link , $sql[4] );
        if ( !$rs[4] )
            {
            exit ( 'Error in SQL' );
            }
        while ( odbc_fetch_row ( $rs[4] ) )
            {
            $nClass = odbc_result ( $rs[4] , 'nClass' );
            }
        
        switch ($nClass)
            {
            //Krieger
            case 1:
                $nClass = 'Fighter';
                break;
            case 2:
                $nClass = 'CleverFighter';
                break;
            case 3:
                $nClass = 'Warrior';
                break;
            case 4:
                $nClass = 'Gladiator';
                break;
            case 5:
                $nClass = 'Knight';
                break;
            
            //Priester    
            case 6:
                $nClass = 'Cleric';
                break;
            case 7:
                $nClass = 'HighCleric';
                break;
            case 8:
                $nClass = 'Paladin';
                break;
            case 9:
                $nClass = 'HolyKnight';
                break;
            case 10:
                $nClass = 'Guardian';
                break;
            
            //Jäger    
            case 11:
                $nClass = 'Archer';
                break;
            case 12:
                $nClass = 'HawkArcher';
                break;
            case 13:
                $nClass = 'Scout';
                break;
            case 14:
                $nClass = 'SharpShooter';
                break;
            case 15:
                $nClass = 'Ranger';
                break;
            
            //Magier    
            case 16:
                $nClass = 'Mage';
                break;
            case 17:
                $nClass = 'WizMage';
                break;
            case 18:
                $nClass = 'Enchanter';
                break;
            case 19:
                $nClass = 'Warlock';
                break;
            case 20:
                $nClass = 'Wizard';
                break;
				
				//Joker    
            case 21:
                $nClass = 'Joker';
                break;
            case 22:
                $nClass = 'Gambit';
                break;
            case 23:
                $nClass = 'Renegade ';
                break;
            case 14:
                $nClass = 'Spectre';
                break;
            case 25:
                $nClass = 'Reaper';
                break;
				
				
            //Standart    
            default:
                $nClass = '???';
                break;
            }
        
        echo '    <tr>';
        echo '        <th class="table_title_head">';
        echo '            '.$i;
        echo '        </th>';
        echo '        <th class="column_head">';
        echo '            '.$sID;
        echo '        </th>'; 
        echo '        <th class="column_head">';
        echo '            '.$nPKCount;  
        echo '        </th>';
        echo '        <th class="column_head">';
        echo '            '.$nLevel;
        echo '        </th>';
        echo '    </tr>';
        
        $i++;
        }
        
    odbc_close ( $odbc_link );
    
    echo '</table>';?>
								</table>
						</div>
        			</div>
					<?php
					
?>
                    
                </div>
                <div class="row2_bottom"></div>
        </div>
		<?php include('inc/serverrates.php');?>      
        
    </div>