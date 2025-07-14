<?php

class AdminFoodListView extends View
{

    private $allfoods;

    private $no_of_all_records;

    private $start_from;

    public function __construct($allfoods, $no_of_all_records, $start_from)
    {
        $this->allfoods = $allfoods;
        $this->no_of_all_records = $no_of_all_records;
        $this->start_from = $start_from;
    }

    public function displayBody()
    {
        ?>
        <style type="text/css">
		.typeahead, .tt-query {
			border: 2px solid #CCCCCC;
			border-radius: 8px;
			font-size: 18px;
			height: 40px;
			line-height: 40px;
			outline: medium none;
			padding: 0px;
			width: 200px;
		}
		
		.submitahead {
			border: 2px solid #CCCCCC;
			border-radius: 8px;
			font-size: 18px;
			height: 40px;
			line-height: 40px;
			outline: medium none;
			padding: 0px;
			width: 100px;
		}
		
		.typeahead {
			background-color: #FFFFFF;
		}
		
		.typeahead:focus {
			border: 2px solid #0097CF;
		}
		
		.tt-query {
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
		}
		
		.tt-dropdown-menu {
			background-color: #FFFFFF;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 8px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			margin-top: 0px;
			padding: 0px;
			width: 200px;
		}
		</style>
<script type="text/javascript">
	function doAjax(element, uri) {
		var ajax;
		if(window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		} 
		else if(window.ActiveXObject) {
			try {
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		ajax.open("POST", uri,true);
		ajax.onreadystatechange = function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
				var obj = eval(document).getElementById(element);
				obj.innerHTML = ajax.responseText;
				eval(document);
			}
		};
		ajax.send("");
		}

		function suggest1(){
			//alert("OK");
			document.getElementById("suggestfood").style.display="block";
			var chars = document.getElementById("searchfood").value;
			var charsCat = document.getElementById("searchCatId").value;
			//alert(charsCat);
			if(chars==""){
				document.getElementById("suggestfood").innerHTML = "";
			}else{
				if(charsCat==0){
					//alert("OK");
					doAjax("suggestfood","./view/ajax_search_food.php?searchfood="+chars);
				}else
					
				doAjax("suggestfood","./view/ajax_search_foodbycatid.php?searchfood="+chars+"&searchCatId="+charsCat);
			}
		}

		function choose(){
			document.getElementById("searchfood").value = document.getElementById("suggestfood").value;
		}
		function clearSearchInput(){
			document.getElementById("searchfood").value=null;
			document.getElementById("suggestfood").style.display="none";
		}
	</script>

<div class="col-6 col-12">
	<form method="post">
		<div class=row>
			<div class="col-5">
				<input type="submit" name="btnFoodListAdd" value="Add Food"
					class="btn btn-success">
			</div>
			<div class="col-7">
				<div class="row">
					<div class="col-4">
						 <select name="searchCatId" class="form-control typeahead tt-query" id="searchCatId" onchange="clearSearchInput()">
    					<option value="0">--Choose Category--</option>
    					<?php 
					   $categoryDao = new CategoryDao();
					   $allcategory = $categoryDao->getAllCategory();
					   foreach ($allcategory as $key=>$value){
					?>
						<option value="<?php echo $value["cat_id"] ?>"><?php echo $value["cat_name"]?></option>
					<?php    
					   }
					?>
    				</select>
					</div>
					<div class="col-4">
						<input type="text" name="searchfood" id="searchfood"
							class="form-control typeahead tt-query" align="right"
							onkeyup="suggest1()"> <select class="tt-dropdown-menu"
							id="suggestfood" size="5" onchange="choose()" style="display: none"></select>
					</div>
					<div class="col-2">
						<input type="submit" name="btnSearchFood" value="Search"
							class="btn btn-outline-success submitahead">
					</div>
				</div>
			</div>
		</div>


		<br>

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
							        foreach ($this->allfoods as $kdy => $food) {
							    ?>
									
								<tr>
								<td><?php echo ++$this->start_from; ?></td>
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
	</form>
	<div class="prenextbtn">
		<a href="index.php?usecase=<?php echo UC_A_FOOD?>&page=<?php echo $_SESSION["page"]-1 ?>">
			Previous </a>&nbsp;|&nbsp; 
		<a href="index.php?usecase=<?php echo UC_A_FOOD?>&page=<?php echo $_SESSION["page"]+1 ?>">
			Next </a>
	</div>
</div>
<?php
    }
}