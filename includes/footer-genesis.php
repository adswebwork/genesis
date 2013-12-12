</div> <!--content -->
<div class="borders"><img src="images/_bottom.png" style="margin-bottom:10px;"/></div>
<div id="author">
<?php $t = date("m/j/y -@- g:i:a",filemtime('index.php')); echo '<p>Last modified: '.$t.' - ';?>
<a class="noline" href="#" onclick="popUpwindow('release.php','Credits','width=500,height=700')">Credits</a></p>
<?php if(isset($MenuT)) {echo $MenuT;} # adds the necessary closing script for the drowdown menu ?></div>

</body>
</html>
