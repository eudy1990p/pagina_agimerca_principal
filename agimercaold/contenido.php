<?php
	require_once("header.php");
	print_r($_SESSION);
?>
<script >
	$("html").ready(function () { ActivarEnlaceMenu("idMenuFactura","active",""); });
</script>


<?php
	require_once("footer.php");
?>