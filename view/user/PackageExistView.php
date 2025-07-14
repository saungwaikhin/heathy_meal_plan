<?php

class PackageExistView extends View
{

    private $errors;

    public function __construct($errors = null)
    {
        $this->errors = $errors;
    }

    public function displayBody()
    {
        ?>
<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Daily Food Plan Package subscription</p>
	</div>
</div>
<div class="row">
	<div class="col page_center"><p><i class='fas fa-times-circle' style="font-size:48px;color:red;"></i></p>
		<p><?php
        if (isset($this->errors["package_exist"]))
            echo $this->errors["package_exist"];
        ?></p>
		<form method="post">
		<input type="submit" value="Ok" name="btnBackHistory"
			class="btn btn-success">
	</form>
	</div>
</div>

<?php
    }
}