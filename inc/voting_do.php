<?php 
/*					<div id="voting">
                   		<div id="voting_box">
                        	<img alt="Top of Games" src="img/tog_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Top of Games</span> und sichere dir deine Votepoints!</div>
                            <div id="vote_button"><a href="#"></a></div>
                        </div>
                        <div id="voting_box">
                        	<img alt="Top of Games" src="img/gtop100_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Top Games 100</span> und sichere dir deine Votepoints!</div>
                            <div id="vote_button"><a href="#"></a></div>
                        </div>
                        <div id="voting_box">
                        	<img alt="Top of Games" src="img/topg_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Top G</span> und sichere dir deine Votepoints!</div>
                            <div id="no_vote"></div>
                        </div>
        			</div>';*/
	/*
	http://topofgames.com/index.php?do=votes&id=59869
	http://www.gtop100.com/in.php?site=78409
	http://topg.org/Flyff-Online/in-359782
	*/
	if(!empty($_GET['id']))
	{
		include('inc/update_banned.php');
		echo '	<div id="reg_formular">';
					//<div id="message_box"></div>
			if($check_banned == true)
			{
				if($_GET['id'] == "1" && (strtotime('now') - $_SESSION['vote1'])/60/60 > 12)
				{
					$_SESSION['cash2'] += $currency_get;
					$_SESSION['vote'.$_GET['id']] = strtotime('now');
					$sql['setVotePoints'] = "UPDATE users SET u_cash2 = '".$_SESSION['cash2']."' WHERE u_id = '".$_SESSION['id']."'";
					$sql['setVoteTime'] = "UPDATE users SET u_vote".$_GET['id']." = '".date('Y-m-d H:i:s', strtotime('now'))."' WHERE u_id = '".$_SESSION['id']."'";
					$query['setVotePoints'] = mysql_query($sql['setVotePoints']) or die(mysql_error());
					$query['setVoteTime'] = mysql_query($sql['setVoteTime']) or die(mysql_error());
					echo '<div id="message_box">Voten erfolgreich. Du wirst in 3 Sekunden weitergeleitet.</div>';
					echo '<meta http-equiv="refresh" content="3;URL=voting.php"/>';
				}
				elseif($_GET['id'] == "2" && (strtotime('now') - $_SESSION['vote2'])/60/60 > 12)
				{
					$_SESSION['cash2'] += $currency_get;
					$_SESSION['vote'.$_GET['id']] = strtotime('now');
					$sql['setVotePoints'] = "UPDATE users SET u_cash2 = '".$_SESSION['cash2']."' WHERE u_id = '".$_SESSION['id']."'";
					$sql['setVoteTime'] = "UPDATE users SET u_vote".$_GET['id']." = '".date('Y-m-d H:i:s', strtotime('now'))."' WHERE u_id = '".$_SESSION['id']."'";
					$query['setVotePoints'] = mysql_query($sql['setVotePoints']) or die(mysql_error());
					$query['setVoteTime'] = mysql_query($sql['setVoteTime']) or die(mysql_error());
					echo '<div id="message_box">Voten erfolgreich. Du wirst in 3 Sekunden weitergeleitet.</div>';
					echo '<meta http-equiv="refresh" content="3;URL=voting.php"/>';
				}
				elseif($_GET['id'] == "3" && (strtotime('now') - $_SESSION['vote3'])/60/60 > 12)
				{
					$_SESSION['cash2'] += $currency_get;
					$_SESSION['vote'.$_GET['id']] = strtotime('now');
					$sql['setVotePoints'] = "UPDATE users SET u_cash2 = '".$_SESSION['cash2']."' WHERE u_id = '".$_SESSION['id']."'";
					$sql['setVoteTime'] = "UPDATE users SET u_vote".$_GET['id']." = '".date('Y-m-d H:i:s', strtotime('now'))."' WHERE u_id = '".$_SESSION['id']."'";
					$query['setVotePoints'] = mysql_query($sql['setVotePoints']) or die(mysql_error());
					$query['setVoteTime'] = mysql_query($sql['setVoteTime']) or die(mysql_error());
					echo '<div id="message_box">Voten erfolgreich. Du wirst in 3 Sekunden weitergeleitet.</div>';
					echo '<meta http-equiv="refresh" content="3;URL=voting.php"/>';
				}
				else
				{
					echo '<div id="message_box">Falscher ID-Parameter: '.$_GET['id'].'<br/>Timer: '.((strtotime('now') - $_SESSION['vote2'])/60/60).'</div>';
				}
			}
		echo '	</div>';
	}
	else
	{
		echo '<div id="voting">';
		if((strtotime('now') - $_SESSION['vote1'])/60/60 > 12)
		{
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/tog_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Top of Games</span> und sichere Dir Deine Votepoints!</div>
                            <div id="vote_button"><a href="?id=1" onClick="window.open(\'http://topofgames.com/index.php?do=votes&id=59869\')"></a></div>
                        </div>';
		}
		else
		{
			$hours = floor((12*60*60 - (strtotime('now') - $_SESSION['vote1'])) / 3600);;
			$minutes = floor(((12*60*60 - (strtotime('now') - $_SESSION['vote1'])) - ($hours*3600)) / 60);
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/tog_banner.png" />
                            <div id="vote_content">Wartezeit zum Voten für <span class="site">Top of Games</span>: '.$hours.' Stunde(n), '.$minutes.' Minute(n).</div>
                            <div id="no_vote"></div>
                        </div>';		
		}

		if((strtotime('now') - $_SESSION['vote2'])/60/60 > 12)
		{
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/gtop100_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Games Top 100</span> und sichere Dir Deine Votepoints!</div>
                            <div id="vote_button"><a href="?id=2" onClick="window.open(\'http://www.gtop100.com/in.php?site=78409\')"></a></div>
                        </div>';
		}
		else
		{
			$hours = floor((12*60*60 - (strtotime('now') - $_SESSION['vote2'])) / 3600);;
			$minutes = floor(((12*60*60 - (strtotime('now') - $_SESSION['vote2'])) - ($hours*3600)) / 60);
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/gtop100_banner.png" />
                            <div id="vote_content">Wartezeit zum Voten für <span class="site">Games Top 100</span>: '.$hours.' Stunde(n), '.$minutes.' Minute(n).</div>
                            <div id="no_vote"></div>
                        </div>';		
		}

		if((strtotime('now') - $_SESSION['vote3'])/60/60 > 12)
		{
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/topg_banner.png" />
                            <div id="vote_content">Vote jetzt auf <span class="site">Top G</span> und sichere Dir Deine Votepoints!</div>
                             <div id="vote_button"><a href="?id=3" onClick="window.open(\'http://topg.org/Flyff-Online/in-359782\')"></a></div>
                        </div>';
		}
		else
		{
			$hours = floor((12*60*60 - (strtotime('now') - $_SESSION['vote3'])) / 3600);;
			$minutes = floor(((12*60*60 - (strtotime('now') - $_SESSION['vote3'])) - ($hours*3600)) / 60);
			echo '      <div id="voting_box">
                        	<img alt="Top of Games" src="img/topg_banner.png" />
                            <div id="vote_content">Wartezeit zum Voten für <span class="site">Top G</span>: '.$hours.' Stunde(n), '.$minutes.' Minute(n).</div>
                            <div id="no_vote"></div>
                        </div>';		
		}
		echo '</div>';
	}
?>