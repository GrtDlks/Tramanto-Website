<?php
header("Content-Type: text/html; charset=utf-8");
if($__TOKEN = "CopyrightByRefleXx"){
	$conn = sqlsrv_connect($__CONFIG['SQLHost'], array("Database"=>$__CONFIG['SQLDB'], "UID"=>$__CONFIG['SQLUID'], "PWD"=>$__CONFIG['SQLPWD']));
				if(!$conn){
				echo print_r(sqlsrv_errors(), true);
				exit();
				}else{	
				?>
				<div align='center' class='normal_text'>
				<table width="450" border="0" cellspacing="2" cellpadding="0" align="center">
				<?php
		$getContent = sqlsrv_query($conn, "SELECT TOP 50 title, text, author, date FROM Account..tPatchlog ORDER BY date DESC;", array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
		if(sqlsrv_has_rows($getContent) == 1){
		while($fetchContent = sqlsrv_fetch_array($getContent)){
			
?>

<div id="headline">
<div id="title"><?php echo $fetchContent['title']; ?></div>
<div id="author">Written by: <?php echo $fetchContent['author']; ?> at <?php echo date_format($fetchContent['date'], 'd-m-Y :: g:i a'); ?>
</div></div></div>

<div id="text"><?php echo $fetchContent['text']; ?></div>



<?php
			}
		}else{
			?>
			

			<?php
		}
		
?>
</table><br></div>
<?php
}}
?>

