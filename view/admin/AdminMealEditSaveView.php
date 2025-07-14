<?php
class AdminMealEditSaveView extends View{
    public function displayBody(){
?>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<div class="row">
		<div class="col-6 col-12">
			<h3 style="font-family: Tahoma; color: #65ab3b;">Your data is successfully added</h3>
			<form method="post">
				<input type="submit" name="btnBackMeal" value="Back" class="btn btn-success">
			</form>
		</div>
	</div>
<?php 
    }
}