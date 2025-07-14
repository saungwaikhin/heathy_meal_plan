<?php
class AdminPackageView extends View{
	private $allpackage;

    private $no_of_all_records;

    private $start_from;

    public function __construct($allpackage, $no_of_all_records, $start_from)
    {
        $this->allpackage = $allpackage;
        $this->no_of_all_records = $no_of_all_records;
        $this->start_from = $start_from;
    }
	
	public function displayBody(){
?>
	<div class="col-6 col-12">
		<form method="post">
			<div class="input-group mb-3">
				<input type="submit" name="btnAddPackage" value="Add Package" class="btn btn-success">
			</div>
			<br>
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">Package Table</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-hover" style="text-align: center;">
								<tr style="color: #a7d433; font-size: 20px;">
									<th>No</th>
									<th>Package Name</th>
									<th>Days</th>
									<th>Package Description</th>
									<th>Action</th>
								</tr>
								<?php 
									
									foreach ($this->allpackage as $key=>$value){
								?>
									<tr>
										<td><?php echo ++$this->start_from; ?></td>
										<td><?php echo $value["package_name"]?></td>
										<td><?php echo $value["package_type"]?></td>
										<td><?php echo $value["package_desc"]?></td>
										<td colspan="2" align="right">
											<a href="index.php?usecase=<?php echo UC_PACKAGE_EDIT?>&id=<?php echo $value["package_id"]?>" class="btn btn-success">Edit</a>
											<a href="index.php?usecase=<?php echo UC_PACKAGE_DELETE?>&id=<?php echo $value["package_id"]?>" class="btn btn-success">Delete</a>
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
			<a href="index.php?usecase=<?php echo UC_A_PACKAGE?>&page=<?php echo $_SESSION["page"]-1 ?>">
			Previous </a>&nbsp;|&nbsp; 
			<a href="index.php?usecase=<?php echo UC_A_PACKAGE?>&page=<?php echo $_SESSION["page"]+1 ?>">
			Next </a>
		</div>
	</div>
<?php 
	}
}