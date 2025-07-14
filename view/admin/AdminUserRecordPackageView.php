<?php
class AdminUserRecordPackageView extends View{
	private $userpackage;
	private $count;
	public function __construct($userpackage=null){
		$this->userpackage=$userpackage;
	}
	public function displayBody(){
		?>



<div class="container">
<?php include 'view/inc/user_menu_admin.php'; ?>


	<p class="pagehead">
	<?php echo $_SESSION["adminViewUserName"];?>
		's Package history
	</p>
<?php if(!empty($this->userpackage)){?>

	<table class="table  table-bordered table-hover"
		style="text-align: center;">
		<tr>
			<th>No.</th>
			<th>Package Name</th>
			<th>Start Date</th>
			<th>Finish Date</th>
			<th>Result</th>
		</tr>
		<?php
		foreach ($this->userpackage as $key=>$value){?>
		<tr>
			<td><?php echo ++$this->count;?></td>
			<td>
			<a href="index.php?usecase=<?php echo UC_A_DAILY_FOOD_USER?>&adminViewUserChoosedPackageId=<?php echo $value["choose_id"]?>"><?php echo $value["package_name"];?></a></td>
			<td><?php echo $value["start_date"];?></td>
			<td><?php echo $value["finish_date"];?></td>
			<td><?php echo $value["package_result"];?></td>
		</tr>
		<?php }
		?>
	</table>
	<form method="post">
		<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
	</form>
	<?php }else{?>
	
	<div class="col page_center"><p><i class='fas fa-info-circle' style="font-size:48px;color:green;"></i></p>
		<p>No package history for this user.</p>
		<form method="post">
		<input type="submit" name="btnUserRecordBack" value="Back"
				class="btn btn-outline-success">
	</form>
	</div>
	<?php }?>
</div>

	<?php
	}
}
