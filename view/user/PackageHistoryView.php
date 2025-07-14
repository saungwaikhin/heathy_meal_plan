<?php

class PackageHistoryView extends View
{

    private $recommend;

    private $cont;

    private $allhistory;
    private $packageImg;

    public function __construct($allrecord)
    {
        //$this->recommend = $recommend;
        $this->allhistory = $allrecord;
    }

    public function displayBody()
    {
        ?>


<div class="container pageHigh">
<!-- content header -->
<div class="row">
	<div class="col ">
		<p class="pagehead">Package History</p>
	</div>
</div>
<?php if (empty($this->allhistory)){?>
<div class="row">
		<div class="col page_center">
			<p>
				<i class="fa fa-info-circle" style="font-size: 48px; color: green;"></i>
			</p>

			<p>You didn't subscribe any package.</p>
			<p>Please choose one package to start your daily food plan.</p>
			<form method="post">
				<input type="submit" class="btn btn-outline-success"
					value="Choose Package" name="btnHome">
			</form>
		</div>
	</div>
<?php }else{?>
	<form method="post">

		<table class="table  table-bordered table-hover"
			style="text-align: center;">
			<tr >
				<th>No.</th>
				<th>Package Name</th>
				<th>Start Date</th>
				<th>Finished Date</th>
				<th>Package Result</th>

			</tr>
			<?php
			
        foreach ($this->allhistory as $key => $history) {
            ?>
			<tr>
				<td><?php echo ++$this->cont?></td>
				<td><?php
            
				echo $history["package_name"];
            ?>
				</td>
				<td><?php if ($history["start_date"]==""){?>
				<a
					href="index.php?usecase=<?php echo UC_START?>&choosePackageid=<?php echo $history["choose_id"]?>"
					class="btn btn-success">Start</a>
				<?php
            } else {
                echo $history["start_date"];
            }
            ?>
				
				</td>
				<td><?php echo $history["finish_date"];?></td>



				<td>
				<?php
            
            if ($history["finish_date"] < date("Y-m-d") && $history["package_result"] == "") {
                if ($history["start_date"] != "") {
                    ?>
				<a
					href="index.php?usecase=<?php echo UC_PAK_HIS_RESULT?>&choosePackage_id=<?php echo $history["choose_id"] ?>"
					class="btn btn-success btn-sm" style="font-weight: bold">Result</a>
				<?php
                }
            } elseif ($history["package_result"] != "") {
                echo $history["package_result"];
            } else {
                ?>
				<font color='green'> <i class="fa fa-spinner fa-spin"
						style="font-size: 24px"></i>&emsp;
				<?php echo "In progress"; }?>
				</font>
				</td>

			</tr>
			
			<?php }?>
		</table>
	</form>
	<!-- <pre>
	<?php print_r($this->allhistory); ?>
	</pre> -->
	<?php }?>
</div>

<?php }
}