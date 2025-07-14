<?php
class updateProfileSaveView extends View{
	public function displayBody(){?>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	<td>
		<h3>Successfully Update...</h3>
		<form method="post">
				<input type="submit" class="click_btn"  value="Home" name="btnHome">
		</form>
			
	</td>
	<?php }
}
