<?php $this->view('header')?>

	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/shop/assets/css/styles.css">

	<div class="class_10" style="color:#222" >
		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
			<div class="class_11" >
				<img src="<?=get_image($row->image)?>" class="class_12" >
				<div class="class_13" >
					<h2 class="class_14"  >
						<?=esc($row->name)?>
						<br>
					</h2>
					<h1 class="class_14"  >
						<?=esc($row->price)?>
					</h1>
					<button onclick="cart.add('<?=$row->id?>')" class="class_15"  >
						Add to Cart
					</button>
				</div>
			</div>
	 		<?php endforeach;?>
 		<?php else:?>
 			<h2 style="padding:10px;text-align:center;">No content found</h2>
 		<?php endif;?>
	</div>
	<script>

	var cart = {

		add: function(id){
			
			let obj = {};
			obj.data_type = "add";
			obj.id = id;

			cart.send_data(obj);
		},

		remove: function(id){

			let obj = {};
			obj.data_type = "remove";
			obj.id = id;

			cart.send_data(obj);
		},

		send_data: function(obj){

			var ajax = new XMLHttpRequest();

			let myForm = new FormData();
			for (key in obj) 
			{
				myForm.append(key, obj[key]);
			}

			ajax.addEventListener('readystatechange', function(){

				if (ajax.readyState == 4 && ajax.status == 200) 
				{
					alert(ajax.responseText);
				}
			});

			ajax.open('post','<?=ROOT?>/ajax/cart',true);
			ajax.send(myForm);

		},

	};

	</script>
	
<?php $this->view('footer')?>