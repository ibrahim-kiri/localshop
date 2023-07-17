<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | <?=APP_NAME?> | <?=APP_DESC?></title>
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/login/assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/login/assets/css/styles.css">
</head>
<body>

	
	<section class="class_1" >
		<form method="post" enctype="multipart/form-data" class="class_2" >
			<img src="<?=ROOT?>/assets/login/assets/images/vendor-1.jpg" class="class_3" >
			<h1 class="class_4"  >
				Login
			</h1>

			<?php if(!empty(message())):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					<?=message('',true)?>
				</div>
			<?php endif;?>

			<?php if(!empty($errors)):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					<?=implode("<br>", $errors)?>
				</div>
			<?php endif;?>

			<div class="class_5" >
				<label class="class_6"  >
					Email:
				</label>
				<input value="<?=old_value('email')?>" placeholder="" type="email" name="email" class="class_7" >
			</div>
			<div class="class_5" >
				<label class="class_6"  >
					Password:
				</label>
				<input value="<?=old_value('password')?>" placeholder="" type="password" name="password" class="class_7" >
			</div>
			<div style="padding: 10px;">
				Don't have an account? <a href="<?=ROOT?>/signup">Signup Here</a>
			</div>
			<button class="class_8"  >
				Login
			</button>
		</form>
	</section>
	
</body>
</html>