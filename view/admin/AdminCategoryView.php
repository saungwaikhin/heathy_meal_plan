<?php
class AdminCategoryView extends View{
	private $errors;
	private $allcategory;
    private $no_of_all_records;
    private $start_from;
	public function __construct($allcategory, $no_of_all_records, $start_from, $errors=null){
		$this->allcategory= $allcategory;
        $this->no_of_all_records = $no_of_all_records;
        $this->start_from = $start_from;
		$this->errors = $errors;
	}
	
	public function displayBody(){
?>
	<div class="col-6 col-12">
		<h3 style="font-family: Tahoma; color: #65ab3b;">Add Category</h3>
		<form method="post">
			<div class="form-group">
				<label for="catName">Category Name:</label>
				<input type="text" name="catName" placeholder="Enter Category Name..." class="form-control" value="<?php echo htmlspecialchars(@$_POST['catName']) ?>">
				<font color="red">
					<?php 
					   if(isset($this->errors["name_null"]))
					       echo $this->errors["name_null"];
					       
					   if(isset($this->errors["name_exist"]))
					   		echo $this->errors["name_exist"];
					?>
				</font>
			</div>
			<input type="submit" name="btnCatAdd" value="Add" class="btn btn-success">
			<input type="submit" name="btnCatAddCancel" value="Cancel" class="btn btn-success">
			<br>
			<br>
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">Category Table</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-hover">
								<tr style="color: #a7d433; font-size: 20px;">
									<th>No</th>
									<th>Category Name</th>
									<th>Action</th>
								</tr>
								<?php 
									
									foreach ($this->allcategory as $key=>$value){
										//print_r($value);
								?>
									<tr>
										<td><?php echo ++$this->start_from; ?></td>
										<td><?php echo $value["cat_name"]?></td>
										<td colspan="2" align="right">
											<a href="index.php?usecase=<?php echo UC_CAT_EDT?>&id=<?php echo $value["cat_id"]?>" class="btn btn-success">Edit</a>
											<a href="index.php?usecase=<?php echo UC_CAT_DEL?>&id=<?php echo $value["cat_id"]?>" class="btn btn-success">Delete</a>
										</td>	
									</tr>
								<?php 
									}
								?>	
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="prenextbtn">
			<a href="index.php?usecase=<?php echo UC_A_CAT?>&page=<?php echo $_SESSION["page"]-1 ?>">
			Previous </a>&nbsp;|&nbsp; 
		<a href="index.php?usecase=<?php echo UC_A_CAT?>&page=<?php echo $_SESSION["page"]+1 ?>">
			Next </a>
		</div>
	</div>
<?php 
	}
}