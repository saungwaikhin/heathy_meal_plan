<?php

class AdminUserRecordListView extends View
{

    private $UserRecordList;

    public function __construct($UserRecordList)
    {
        $this->UserRecordList = $UserRecordList;
    }

    public function displayBody()
    {
        ?>
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
			
			function suggestUser() {
			
				document.getElementById("suggest").style.display="block";
				var chars = document.getElementById("search").value;
				if (chars==""){
					document.getElementById("suggest").innerHTML = "";
				}
				else{
					//doAjax("suggest","http://localhost/TextBookExtension/29-12-2017/view/ajax_search.php?search=" + chars);
					doAjax("suggest","./view/admin/ajax_search.php?search=" + chars);
				}
			}
			
			function choose() {
				document.getElementById("search").value= document.getElementById("suggest").value;
				document.getElementById("suggest").style.display="none";
			}
		</script>
<style type="text/css">
.typeahead, .tt-query {
	//border: 2px solid #CCCCCC;
	//border-radius: 8px;
	//font-size: 24px;
	//height: 50px;
	//line-height: 30px;
	//outline: medium none;
	//padding: 0px;
	//width: 500px;
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
	width: 500px;
}
</style>
<div class="container">
<p class="pagehead">User Records</p>
	<form method="post" class="w3-container">
		
		<div class="row">
		<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<p>
					<input type="text" name="search" class="w3-input w3-border w3-round-large .typeahead, .tt-query" placeholder="Search by Name"
						id="search" onkeyup="suggestUser()" class="form-control">
				</p>

				<select class="tt-dropdown-menu" id="suggest" size="5"
					onchange="choose()" style="display: none"></select>
			</div>
			<div class="col-sm-3">
				<div class="input-group-prepend" >
					<input type="submit" name="btnUserRecordSearch" value="Search"
						class="btn btn-outline-success">
				</div>
			</div>
		</div>
		<div class="row">
		<table class="table  table-bordered table-hover"
			style="text-align: center;">
			<tr style="color: #a7d433; font-size: 20px;">
				<th>No.</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Phone</th>

			</tr>
			<tr>
			<?php
        
        foreach ($this->UserRecordList as $key => $value) {
            
            ?>
				<td><?php echo $value["user_id"]?></td>
				<td><a
					href="index.php?usecase=<?php echo UC_A_RECORD_USER ?>&adminViewUserId=<?php echo $value["user_id"]?>&adminViewUserName=<?php echo $value['name']?>">
						<?php echo $value["name"]?></a> <!-- <form method="post" action="index.php?usecase=<?php echo UC_A_RECORD_USER ?>">	
					<input type="hidden" name="adminViewUserName" value="<?php echo $value['name']?>">
					</form>	 --></td>
				<td><?php echo $value["dob"]?></td>
				<td><?php if( $value["gender"]=="f")echo "Female"; else echo "Male";?></td>
				<td><?php echo $value["email"]?></td>
				<td><?php echo $value["phone"]?></td>

			</tr>
			<?php }?>

		</table>
		</div>
	</form>

	<div class="prenextbtn">


		<a
			href="index.php?usecase=<?php echo UC_A_RECORD_USER_LIST?>&page=<?php echo $_SESSION['page']-1 ?>">
			Previous </a>&nbsp;|&nbsp; <a
			href="index.php?usecase=<?php echo UC_A_RECORD_USER_LIST?>&page=<?php echo $_SESSION['page']+1 ?>">
			Next </a>
	</div>
</div>

<?php
    }
}