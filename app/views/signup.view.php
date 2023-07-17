<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup | <?=APP_NAME?> | <?=APP_DESC?></title>
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/signup/assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/signup/assets/css/styles.css">
</head>
<body>

	
	<section class="class_1" >
		<form method="post" enctype="multipart/form-data" class="class_2" >
			<img src="<?=ROOT?>/assets/signup/assets/images/pexels-photo-1066137.jpeg" class="class_3" >
			<h1 class="class_4"  >
				Signup
			</h1>

			<?php if(!empty($errors)):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					Please fix the errors below!
				</div>
			<?php endif;?>
			<div class="class_5" >
				<label class="class_6"  >
					Username:
				</label>
				<input value="<?=old_value('username')?>" placeholder="" type="text" name="username" class="class_7" autofocus>
			</div>
			<?php if(!empty($errors['username'])):?>
				<div style="color: red;"><?=$errors['username']?></div>
			<?php endif;?>
			<div class="class_5" >
				<label class="class_6"  >
					Email:
				</label>
				<input value="<?=old_value('email')?>" placeholder="" type="email" name="email" class="class_7" >
			</div>
			<?php if(!empty($errors['email'])):?>
				<div style="color: red;"><?=$errors['email']?></div>
			<?php endif;?>
			<div class="class_5" >
				<label class="class_6"  >
					Password:
				</label>
				<input value="<?=old_value('password')?>" placeholder="" type="password" name="password" class="class_7" >
			</div>
			<?php if(!empty($errors['password'])):?>
				<div style="color: red;"><?=$errors['password']?></div>
			<?php endif;?>
			<div style="padding: 10px;">
				Already have an account? <a href="<?=ROOT?>/login">Login Here</a>
			</div>
			<button class="class_8"  >
				Create Account
			</button>
		</form>
	</section>
	
</body>
</html>