<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=APP_NAME?> | <?=APP_DESC?></title>
</head>

<body>


<header class="class_1">
    <div class="class_2">
        <img src="<?=ROOT?>/assets/home-page/assets/images/vendor-1.jpg" class="class_3">
    </div>
    <div class="item_class_0 class_4">
        <div class="item_class_1 class_5">
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m22 16.75c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z" fill-rule="nonzero">
                </path>
            </svg>
        </div>
        <div class="item_class_2 class_6">
            <a href="<?=ROOT?>" class="class_7">
                Home
            </a>
            <a href="<?=ROOT?>/shop" class="class_7">
                Shop
            </a>
            <a href="<?=ROOT?>/cart" class="class_7">
                Cart
            </a>
            <a href="<?=ROOT?>aboutus" class="class_7">
                About us
            </a>
            <a href="<?=ROOT?>/contactus" class="class_7">
                Contact us
            </a>
        </div>
    </div>
    <?php $ses = new \Core\Session; ?>
    <div class="class_8">
        <?php if($ses->is_logged_in()):?>
            <img src="<?=get_image($ses->user('image'),'user')?>" class="class_9">
            Hi, <?=$ses->user('username')?>
        <?php else:?>
            <a href="<?=ROOT?>/login">Login</a>
        <?php endif;?>
    </div>
</header>