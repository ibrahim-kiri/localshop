<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | <?=APP_NAME?></title>
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/admin/dashboard/assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/admin/dashboard/assets/css/styles.css">
</head>
<body>

    <?php
        $section = URL(1) ?? 'dashboard';
    ?>
	
	<div class="class_1" >
		<div class="class_2" >
			<div class="class_3" >
                <?php $ses = new \Core\Session; ?>
				<img src="<?=get_image($ses->user('image'),'user')?>" class="class_4" >
				<h1 class="class_5"  >
                    <?php if($ses->is_logged_in()):?>
                        Hi, <?=$ses->user('username')?>
                    <?php endif;?>
				</h1>
			</div>
			<a href="<?=ROOT?>/admin" class="class_6"  >
				<div class="class_7" >
					<div class="class_8" >
						Dashboard
					</div>
					<div class="class_9" >
						<i  class="bi bi-list class_10">
						</i>
					</div>
				</div>
			</a>

			<?php if($ses->user('role') == 'admin'):?>
				<a href="<?=ROOT?>/admin/users" class="class_6"  >
					<div class="class_7" >
						<div class="class_11" >
							Users
						</div>
						<div class="class_9" >
							<i  class="bi bi-people class_10">
							</i>
						</div>
					</div>
				</a>
				<a href="<?=ROOT?>/admin/products" class="class_6"  >
					<div class="class_7" >
						<div class="class_11" >
							Products
						</div>
						<div class="class_9" >
							<i  class="bi bi-bag-heart class_10">
							</i>
						</div>
					</div>
				</a>
			<?php endif;?>
			<a href="<?=ROOT?>/admin/orders" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Orders
					</div>
					<div class="class_9" >
						<i  class="bi bi-cart class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="<?=ROOT?>" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Home
					</div>
					<div class="class_9" >
						<i  class="bi bi-house class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="<?=ROOT?>/logout" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Logout
					</div>
					<div class="class_9" >
						<i  class="bi bi-box-arrow-right class_10">
						</i>
					</div>
				</div>
			</a>
		</div>

        <div class="class_12" >

            <?php if(!empty(message())):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					<?=message('',true)?>
				</div>
			<?php endif;?>

            <h2 class="class_13"  >
                <?=ucfirst($section)?>
            </h2>