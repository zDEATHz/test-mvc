<?php

class View {


	public function render($tpl, $pageData) {
		include ROOT. "/views/header.tpl.php";
		include ROOT. $tpl;
		include ROOT. "/views/footer.tpl.php";
	}

}