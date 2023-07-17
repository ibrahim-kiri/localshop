<?php $this->view('header')?>

	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/cart/assets/css/styles.css">

	<div class="class_10" >
		<h1 class="class_11"  >
			Cart
		</h1>
 
		<div class="class_12" style="color:#444" >
			<?php if(!empty($CART)):?>
			<table class="item_class_3"  >
				
				<thead >
					<tr >
						<th scope="col" >
							#
						</th>
						
						<th scope="col"  class="class_13">
							Image
						</th>
						
						<th scope="col" >
							Product
						</th>
						
						<th scope="col" >
							Qty
						</th>
						
						<th scope="col" >
							Price
							<br>
						</th>
						
						<th >
							Total
						</th>
						<th >
							Action
						</th>
					</tr>
					
				</thead>
				
				<tbody >
					
					
					<?php foreach($CART as $item):?>
						<tr >
							<th >
								<?=$item['id']?>
							</th>
							
							<td >
								<img src="<?=get_image($item['row']->image ?? '')?>" class="class_14" >
							</td>
							
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
							<td >
								<button onclick="cart.remove('<?=$item['id']?>')" class="class_15"  >
									Remove
								</button>
							</td>
						</tr>
						
	 				<?php endforeach;?>

 					<?php if(!empty($total)):?>
					<tr >
						<th  colspan="4">
							<br>
						</th>
						<td >
							Total:
						</td>
						<td  class="class_16">
							<h1>$<?=$total?></h1>
						</td>
						<td >
							<a href="<?=ROOT?>/checkout">
								<button style="padding:20px;background-color:#107dde;color: white;border: none;font-size: 20px;cursor: pointer;">CHECKOUT</button>
							</a>
						</td>
					</tr>

					<?php endif;?>
				</tbody>
			</table>
	 		<?php else:?>
				<div style="text-align: center;font-weight: bold;">No items were found in the cart!</div>
			<?php endif;?>
		</div>
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
			for(key in obj)
			{
				myForm.append(key, obj[key]);
			}

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4 && ajax.status == 200)
				{
					alert(ajax.responseText);
					window.location.reload();
				}
			});

			ajax.open('post','<?=ROOT?>/ajax/cart',true);
			ajax.send(myForm);
		},


	};

</script>

<?php $this->view('footer')?>