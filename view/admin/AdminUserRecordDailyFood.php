<?php
class AdminUserRecordDailyFood extends View{
    public function displayBody(){
?>
	<div class="row">
		<div class="col-6 col-12">
			<div class="container" style="background-color: #efffff; width: 800px; font-size: 15px; margin-left: 30px;">
    			<form method="post">
    				<div class="form-group">
            			<input type="submit" name="btnUserRecordBmi" value="User's BMI" class="btn btn-success">
            			<input type="submit" name="btnUserRecordPackage" value="User's Package" class="btn btn-success">
            			<input type="submit" name="btnUserRecordDailyFood" value="User's Daily Food" class="btn btn-success">
            		</div>
    			
    			<h3 style="font-family: Tahoma; color: #65ab3b;">That Mon's Daily Food Record</h3>
    			<table class="table  table-bordered table-hover" style="text-align: center;">
        			<tr style="color: #a7d433; font-size: 20px;">
        				<th>No.</th>
        				<th>Day</th>
        				<th>Breakfast</th>
        				<th>Lunch</th>
        				<th>Snack</th>
        				<th>Dinner</th>
        			</tr>
        			<tr>
        				<td>1</td>
        				<td>Day1</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>2</td>
        				<td>Day2</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>3</td>
        				<td>Day3</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>4</td>
        				<td>Day4</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>5</td>
        				<td>Day5</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>6</td>
        				<td>Day6</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        			<tr>
        				<td>7</td>
        				<td>Day7</td>
        				<td>Muesli with Raspberries</td>
        				<td>4 cups White Bean & Veggie Salad</td>
        				<td>medium orange</td>
        				<td>1 medium apple</td>
        			</tr>
        		</table>
        		<div class="prenextbtn">
            		<a href="#"> Previous </a>&nbsp;|&nbsp; 
            		<a href="#"> Next </a>
            	</div>
        			<input type="submit" name="btnUserRecordBack" value="Back">
        		</form>
        	</div>
		</div>
	</div>
<?php 
    }
}