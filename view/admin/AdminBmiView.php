<?php
class AdminBmiView extends View{
	public function displayBody(){
?>
	<div class="row">
		<div class="col-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title" style="font-family: Tahoma; color: #65ab3b;">BMI Table</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover">
						<tr style="color: #a7d433; font-size: 20px;">
							<th>No</th>
							<th>Height</th>
							<th>Minimum Weight</th>
							<th>Maximum Weight</th>
							<th>Normal</th>
							<th>Over Weight</th>
							<th>Obese</th>
							<th>Extreme</th>
						</tr>
						<tr>
							<td>1</td>
							<td>4'8"</td>
							<td>90lbs</td>
							<td>100lbs</td>
							<td>20</td>
							<td>25</td>
							<td>31</td>
							<td>40</td>
						</tr>
						<tr>
							<td>2</td>
							<td>4'9"</td>
							<td>90lbs</td>
							<td>110lbs</td>
							<td>19</td>
							<td>26</td>
							<td>30</td>
							<td>41</td>
						</tr>
						<tr>
							<td>3</td>
							<td>4'10"</td>
							<td>90lbs</td>
							<td>110lbs</td>
							<td>19</td>
							<td>25</td>
							<td>31</td>
							<td>40</td>
						</tr>
						<tr>
							<td>4</td>
							<td>4'11"</td>
							<td>100lbs</td>
							<td>120lbs</td>
							<td>20</td>
							<td>26</td>
							<td>30</td>
							<td>40</td>
						</tr>
						<tr>
							<td>5</td>
							<td>5'0"</td>
							<td>100lbs</td>
							<td>120lbs</td>
							<td>20</td>
							<td>25</td>
							<td>31</td>
							<td>41</td>
						</tr>
						<tr>
							<td>6</td>
							<td>5'1"</td>
							<td>100lbs</td>
							<td>120lbs</td>
							<td>19</td>
							<td>25</td>
							<td>30</td>
							<td>40</td>
						</tr>
						<tr>
							<td>7</td>
							<td>5'2"</td>
							<td>110lbs</td>
							<td>130lbs</td>
							<td>20</td>
							<td>26</td>
							<td>31</td>
							<td>40</td>
						</tr>
						<tr>
							<td>8</td>
							<td>5'3"</td>
							<td>110lbs</td>
							<td>130lbs</td>
							<td>19</td>
							<td>25</td>
							<td>30</td>
							<td>41</td>
						</tr>
						<tr>
							<td>9</td>
							<td>5'4"</td>
							<td>110lbs</td>
							<td>140lbs</td>
							<td>19</td>
							<td>26</td>
							<td>31</td>
							<td>41</td>
						</tr>
						<tr>
							<td>10</td>
							<td>5'5"</td>
							<td>120lbs</td>
							<td>140lbs</td>
							<td>20</td>
							<td>25</td>
							<td>30</td>
							<td>40</td>
						</tr>
					</table>
					<div class="prenextbtn">
						<a href="#"> Previous </a>&nbsp;|&nbsp; 
						<a href="#"> Next </a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	}
}