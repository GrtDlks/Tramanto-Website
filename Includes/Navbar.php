<?php 
	if(!isset($_SESSION['sUserNo'])){	
?>
<div id="navigation">
	<ul>
    	<li><a class="home_h" href="<?php echo $navigation_href["home_h"]?>"></a></li>
        <li><a class="forums_h" href="<?php echo $navigation_href["forums_h"]?>"></a></li>
        <li><a class="register_h" href="<?php echo $navigation_href["register_h"]?>"></a></li>
        <li><a class="download_h" href="<?php echo $navigation_href["download_h"]?>"></a></li>
        <li><a class="shop_h" href="<?php echo $navigation_href["shop_h"]?>"></a></li>
        <li><a class="ranking_h" href="<?php echo $navigation_href["ranking_h"]?>"></a></li>
    </ul>
</div>

<div id="header">
<img src="img/headerBlue.png" alt="Pathos Online" />
</div>

<?php 
	}else{
?>

<div id="navigation">
	<ul>
    	<li><a class="home_h" href="<?php echo $navigation_href["home_h"]?>"></a></li>
        <li><a class="forums_h" href="<?php echo $navigation_href["forums_h"]?>"></a></li>
        <li><a class="register_h" href="<?php echo $navigation_href["register_h"]?>"></a></li>
        <li><a class="download_h" href="<?php echo $navigation_href["download_h"]?>"></a></li>
        <li><a class="shop_h" href="http://mall.vesta-online.net/"></a></li>
        <li><a class="ranking_h" href="<?php echo $navigation_href["ranking_h"]?>"></a></li>
    </ul>
</div>

<div id="header">
<img src="img/headerBlue.png" alt="Pathos Online" />
</div>
<?php	
}
?>
