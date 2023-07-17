<?php $this->view('admin/admin.header')?>

	<?php if($action == 'add'):?>

		<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/add-product/assets/css/styles.css">
		<form onsubmit="validate(event, this)" method="post" enctype="multipart/form-data" class="add_product_1" >
			<h1 class="add_product_2"  >
				Add Product <br>
				<i class="bi bi-bag-heart-fill add_product_3"></i>
			</h1>

			<?php if(!empty($errors)):?>
				<div style="padding: 10px;text-align:center;background-color:#ec9494;color:#5d0000;">
					Please fix the errors below!
				</div>
			<?php endif;?>

			<div class="add_product_4" >
				<label>
					<img src="<?=get_image('')?>" class="add_product_5" style="cursor: pointer;" >
					<input style="display: none;" onchange="display_image(this, this.files[0])" type="file" name="image"  class="add_product_6">
					<script>

						function display_image(element, file)
						{
							let allowed = ['jpeg','jpg','png','webp','gif'];
							let ext = file.name.split(".").pop();

							if (allowed.includes(ext.toLowerCase())) 
							{
								let img = element.parentNode.querySelector("img");
								img.src = URL.createObjectURL(file);
	
								image_added = true;
							}else{
								alert("Only image of this type allowed: "+ allowed.toString());
								image_added = false;
							}
						}
					</script>
				</label>
				<?php if(!empty($errors['image'])):?>
					<div style="color: red;"><?=$errors['image']?></div>
				<?php endif;?>
			</div>
			<div class="add_product_7" >
				<label class="add_product_8"  >
					Product Name:
				</label>
				<input value="<?=old_value('name')?>" placeholder="" type="text" name="name" class="add_product_9" >
			</div>
			<?php if(!empty($errors['name'])):?>
				<div style="color: red;"><?=$errors['name']?></div>
			<?php endif;?>
			<div class="add_product_7" >
				<label class="add_product_8"  >
					Description:
				</label>
				<input value="<?=old_value('description')?>" placeholder="" type="text" name="description" class="add_product_9" >
			</div>
			<?php if(!empty($errors['description'])):?>
				<div style="color: red;"><?=$errors['description']?></div>
			<?php endif;?>
			<div class="add_product_7" >
				<label class="add_product_8"  >
					Price:
				</label>
				<input value="<?=old_value('price','0')?>" placeholder="" type="number" name="price" class="add_product_9"  value="0.00">
			</div>
			<?php if(!empty($errors['price'])):?>
				<div style="color: red;"><?=$errors['price']?></div>
			<?php endif;?>
			<div class="add_product_7" >
				<label class="add_product_8"  >
					Quantity:
				</label>
				<input value="<?=old_value('qty','1')?>" placeholder="" type="number" name="qty" class="add_product_9"  value="1">
			</div>
			<?php if(!empty($errors['qty'])):?>
				<div style="color: red;"><?=$errors['qty']?></div>
			<?php endif;?>
			
			<a href="<?=ROOT?>/admin/products">
				<button type="button" class="add_product_10"  >
					Cancel
				</button>
			</a>
			<button class="add_product_11"  >
				Create
			</button>
		</form>

		<script>

			var image_added = false;

			function validate(e,form)
			{
				e.preventDefault();

				if (!image_added) {
					alert("Please add a valid image");
					return;
				}

				form.submit();
			}

		</script>

		<?php elseif($action == 'edit'):?>

		<?php elseif($action == 'delete'):?>

		<?php else:?>

		<a href="<?=ROOT?>/admin/products/add">
			<button>Add New</button>
		</a>
		<table class="item_class_0"  >
			
			<thead >			
				<tr >				
					<th scope="col" >
						Id#
					</th>
					
					<th scope="col" >
						Image
					</th>
					
					<th scope="col" >
						Product Name
					</th>
					
					<th scope="col" >
						Qty
					</th>
					
					<th scope="col"  class="class_27">
						Price
					</th>

					<th scope="col"  class="class_27">
						Action
					</th>
				</tr>
				
			</thead>
			
			<tbody >
				
				<?php if(!empty($rows)):?>
					<?php foreach($rows as $row):?>
					<tr >
						
						<th >
							<?=$row->id?>
						</th>

						<td >
							<img src="<?=get_image($row->image)?>" style="width:100px;height:100px;object-fit:cover">
						</td>
						
						<td >
							<?=esc($row->name)?>
						</td>
						
						<td >
							<?=$row->qty?>
						</td>
						
						<td >
							<?=$row->price?>
						</td>

						<td >
							<a href="<?=ROOT?>/admin/products/edit/<?=$row->id?>">
								<button>Edit</button>
							</a>
							<a href="<?=ROOT?>/admin/products/delete/<?=$row->id?>">
								<button>Delete</button>
							</a>
						</td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
				
			</tbody>
		</table>
	<?php endif;?>
<?php $this->view('admin/admin.footer')?>