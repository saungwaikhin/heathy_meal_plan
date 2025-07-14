<?php
class AdminFoodListSearchView extends View{
    private $serachFood;
    public function __construct($searchFood){
        $this->serachFood = $searchFood;
    }
    
    public function displayBody(){
?>
	<div class="col-6 col-12">
    	<form method="post">
    		<div class="row">
    			<div class="col-12">
    				<div class="box">
    					<div class="box-header">
    						<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">Food
    							List Table</h3>
    					</div>
    					<div class="box-body">
    						<table class="table table-bordered table-hover"
    							style="text-align: center;">
    							<tr style="color: #a7d433; font-size: 20px;">
    								<th>No</th>
    								<th>Food Name</th>
    								<th>Food Category</th>
    								<th>Food Description</th>
    								<th>Action</th>
    							</tr>
    								<?php
    								    $foodDao = new FoodListDao();
    								    $i =1;
                                        foreach ($this->serachFood as $kdy => $food) {
                                    ?>
    									
    								<tr>
    								<td><?php echo $i; $i++; ?></td>
    								<td><?php echo $food["food_name"]?></td>
    									<?php
                                            $categorydao = new CategoryDao();
                                            $catId = $food["cat_id"];
                                            $category = $categorydao->getCatById($catId);
                                            foreach ($category as $key => $value) {
                                        ?>
    										<td><?php echo $value["cat_name"]?></td>
    									<?php
                                            }
                                        ?>
    									<td><?php echo $food["food_desc"]?></td>
    									<td colspan="2" align="right"><a
    									href="index.php?usecase=<?php echo UC_FOOD_EDT ?>&id=<?php echo $food["food_id"] ?>"
    									class="btn btn-success">Edit</a> <a
    									href="index.php?usecase=<?php echo UC_FOOD_DEL ?>&id=<?php echo $food["food_id"] ?>"
    									class="btn btn-success">Delete</a></td>
    							</tr>
    								
    								<?php
                                        }
                                    ?>
    							</table>
    					</div>
    				</div>
    			</div>
    		</div>
    		<input type="submit" name="btnBackFood" value="Back" class="btn btn-success">
    	</form>
    </div>
<?php 
    }
}