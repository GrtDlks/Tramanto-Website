<?php 
include('./inc/config.php');
$worldsString = "";
$check['world'] = @fsockopen($server_ip, $server_world_port);
if ($check['world']){
	$worldsString = '<div class="server_status_on"></div>';
	$mssqlcon = odbc_connect('Driver={SQL Server};Server='.$mssql_host.';Database=w00_Character', $mssql_user, $mssql_pass) or die(odbc_error());
	$OnlineUsersSQL = "SELECT * FROM LoggedInChars WHERE NOT nExp = 0";
	$OnlineUsersQuery =  odbc_exec($mssqlcon, $OnlineUsersSQL) or die(odbc_error());
	$OnlineUsers = 0;
	while ($line = odbc_fetch_array($OnlineUsersQuery))
	{
		$OnlineUsers++;
	}
}
else
{
	$worldsString = '<div class="server_status_on"></div>';
	$OnlineUsers = 0;
}

?>
	<div id="server_status_box">
        <div id="label"><?php echo $server_name ?> - Server</div>
		<?php echo $worldsString ?>
        <div id="player_online">Players online:</div><div class="user_count"><?php echo $OnlineUsers ?></div>
    </div>
