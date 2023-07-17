<?php $this->view('header') ?>

<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/checkout/assets/css/styles.css">
<div class="class_10">
    <h1 class="class_11">
        Checkout
    </h1>
    <div class="class_12">
    </div>
    <div class="class_13">
        <div class="class_14">
            <h2 class="class_15">
                Enter your details:
                <br>
            </h2>
            <?php if(!empty($errors)):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					Please fix the errors below!
				</div>
			<?php endif;?>
            <form method="post">
                <div class="class_16">
                    <label class="class_17">
                        Your Name:
                    </label>
                    <input value="<?=old_value('name')?>" placeholder="" type="text" name="name" class="class_18">
                </div>
                <?php if(!empty($errors['name'])):?>
                    <div style="color: red;"><?=$errors['name']?></div>
                <?php endif;?>
                <div class="class_16">
                    <label class="class_17">
                        Your Email:
                    </label>
                    <input value="<?=old_value('email')?>" placeholder="" type="text" name="email" class="class_18">
                </div>
                <?php if(!empty($errors['email'])):?>
                    <div style="color: red;"><?=$errors['email']?></div>
                <?php endif;?>
                <div class="class_16">
                    <label class="class_17">
                        Phone Number:
                    </label>
                    <input value="<?=old_value('phone')?>" placeholder="" type="text" name="phone" class="class_18">
                </div>
                <?php if(!empty($errors['phone'])):?>
                    <div style="color: red;"><?=$errors['phone']?></div>
                <?php endif;?>
                <div class="class_16">
                    <label class="class_17">
                        Delivery address:
                    </label>
                    <input value="<?=old_value('delivery_address')?>" placeholder="" type="text" name="delivery_address" class="class_18">
                </div>
                <?php if(!empty($errors['delivery_address'])):?>
                    <div style="color: red;"><?=$errors['delivery_address']?></div>
                <?php endif;?>
                <h3 class="class_15">
                    Payment method:
                    <br>
                </h3>
                <label class="class_19">
                    <input <?=old_checked('payment_method','stripe')?> value="stripe" type="radio" name="payment_method" class="class_20" checked>
                    Card
                    <i class="bi bi-credit-card-2-back-fill class_21">
                    </i>
                </label>
                <label class="class_22">
                    <input <?=old_checked('payment_method','paypal')?> value="paypal" type="radio" name="payment_method" class="class_20">
                    Paypal
                    <i class="bi bi-paypal class_21">
                    </i>
                </label>
                <button class="class_23">
                    PAY &gt;
                </button>
            </form>
        </div>
        <div class="class_24" style="color: #222;">
            <a href="<?=ROOT?>/cart">
                <button class="class_25">
                    &lt; Back to cart
                </button>
            </a>
            <br>
           <h3> YOUR CART:</h3> <br>
            <div class="class_12">
                <table class="item_class_4 class_26">

                    <thead style="">

                        <tr>

                            <th scope="col">
                                #
                            </th>

                            <th scope="col">
                                Product
                            </th>

                            <th scope="col">
                                Qty
                            </th>

                            <th scope="col">
                                Amount
                            </th>

                            <th scope="col">
                                Total
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($CART as $item):?>
                            <tr >
                                <th >
                                    <?=$item['id']?>
                                </th>
                                
                                <td >
                                    <?=esc($item['row']->name)?>
                                </td>
                                
                                <td >
                                    <?=$item['qty']?>
                                </td>
                                
                                <td >
                                    <?=$item['row']->price?>
                                </td>
                                
                                <td >
                                    <?=number_format($item['qty'] * $item['row']->price,2)?>
                                </td>

                            </tr>
                            
                        <?php endforeach;?>

                        <tr>
                            <th colspan="3">
                            </th>
                            <td>
                                Total:
                            </td>
                            <td class="class_27">
                                <?=$total?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->view('footer') ?>