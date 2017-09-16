<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Igolek.app::<?php echo $title?></title>
	<?php $this->load->view('template/header')?>
</head>
<body>
	<?php $this->load->view('template/navbar')?>
	<?php $this->load->view($content)?>
	<?php $this->load->view('template/footer')?>
</body>
<script type="text/javascript">
	$('#nav-toggle').click(function(){
		$(this).toggleClass('is-active');
		$('#navMenu').toggleClass('is-active');
	});

	function login_form() {
		$('#login-modal').toggleClass('is-active');
	}

	function register_form() {
		$('#register-modal').toggleClass('is-active');
	}	
</script>
</html>
