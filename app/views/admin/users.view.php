<?php $this->view('admin/admin.header')?>

	<table class="item_class_0"  >
		
		<thead >
			
			<tr >
				
				<th scope="col" >
					#
				</th>
				
				<th scope="col" >
					First
				</th>
				
				<th scope="col" >
					Last
				</th>
				
				<th scope="col" >
					Age
				</th>
				
				<th scope="col" >
					Email
				</th>
				
				<th  class="class_19">
					Image
				</th>
				<th >
					Action
				</th>
			</tr>
			
		</thead>
		
		<tbody >
			
			<tr >
				
				<th >
					1
				</th>
				
				<td >
					Mary
				</td>
				
				<td >
					Jane
				</td>
				
				<td >
					21
				</td>
				
				<td >
					mary@email.com
				</td>
				
				<td >
					<img src="<?=ROOT?>/assets/admin/dashboard/assets/images/pexels-photo-1066137.jpeg" class="class_20" >
				</td>
				<td >
					<button class="class_21"  >
						Edit
					</button>
					<button class="class_22"  >
						Delete
					</button>
				</td>
			</tr>
			
			<tr >
				
				<th >
					2
				</th>
				
				<td >
					Jacob
				</td>
				
				<td >
					Grant
				</td>
				
				<td >
					30
				</td>
				
				<td >
					jacob@email.com
				</td>
				
				<td >
					<img src="<?=ROOT?>/assets/admin/dashboard/assets/images/user.jpg" class="class_20" >
				</td>
				<td >
					<button class="class_21"  >
						Edit
					</button>
					<button class="class_22"  >
						Delete
					</button>
				</td>
			</tr>
			
		</tbody>
	</table>

<?php $this->view('admin/admin.footer')?>