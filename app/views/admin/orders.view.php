<?php $this->view('admin/admin.header')?>

	<table class="item_class_0"  >
		
		<thead >
			
			<tr >
				
				<th scope="col" >
					Order#
				</th>
				
				<th scope="col" >
					Customer Name
				</th>
				
				<th scope="col" >
					Email
				</th>
				
				<th scope="col" >
					Phone
				</th>
				
				<th scope="col"  class="class_27">
					Amount
				</th>
				
				<th  style="">
					Paid
				</th>
				<th >
					Status
				</th>
				<th >
					Delivery Address
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
					<?=esc($row->name)?>
				</td>
				
				<td >
					<?=$row->email?>
				</td>
				
				<td >
					<?=$row->phone?>
				</td>

				<td >
					<?=$row->amount?>
				</td>

				<td >
					<?=$row->paid ? 'Yes':'No'?>
				</td>

				<td >
					<?=$row->status?>
				</td>

				<td >
					<?=$row->delivery_address?>
				</td>

				<td >
					<a href="<?=ROOT?>/admin/orders/detail/<?=$row->id?>">
						<button>View</button>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
			
		</tbody>
	</table>
<?php $this->view('admin/admin.footer')?>