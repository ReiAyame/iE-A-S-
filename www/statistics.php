<?php

	include "fragments/header.php";
	include "fragments/nav.php";


	$query = $pdo->prepare("SELECT * FROM students WHERE school='SABM'");
	$query->execute();
	$result = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SCIS'");
	$query->execute();
	$result1 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SEA'");
	$query->execute();
	$result2 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SNS'");
	$query->execute();
	$result3 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SOH'");
	$query->execute();
	$result4 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SOL'");
	$query->execute();
	$result5 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SOM'");
	$query->execute();
	$result6 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='SON'");
	$query->execute();
	$result7 = $query->fetchAll();

	$query = $pdo->prepare("SELECT * FROM students WHERE school='STE'");
	$query->execute();
	$result8 = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
			<h2>Statistics</h2>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          Overall Statistics
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
		        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          School of Accountancy and Business Management (SABM) <?php echo "(".count($result).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		        
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>School</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          School of Computing and Information Sciences (SCIS) <?php echo "(".count($result1).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
		        
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result1)>0):?>
					<?php $no=1; ?>
					<?php foreach($result1 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFour">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		          School of Engineering and Architecture (SEA) <?php echo "(".count($result2).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      <div class="panel-body">
		        
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result2)>0):?>
					<?php $no=1; ?>
					<?php foreach($result2 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFive">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
		          School of Natural Sciences (SNS) <?php echo "(".count($result3).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
		      <div class="panel-body">
		              
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">

                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result3)>0):?>
					<?php $no=1; ?>
					<?php foreach($result3 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSix">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
		          School of Humanities (SOH) <?php echo "(".count($result4).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      <div class="panel-body">
		              
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result4)>0):?>
					<?php $no=1; ?>
					<?php foreach($result4 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>     </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSix">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
		          School of Law (SOL) <?php echo "(".count($result5).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      <div class="panel-body">
      
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result5)>0):?>
					<?php $no=1; ?>
					<?php foreach($result5 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSix">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseSix">
		          School of Medicine (SOM) <?php echo "(".count($result6).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      <div class="panel-body">
      
<div class="container-fluid" id="other">
		<div class="container">

<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result6)>0):?>
					<?php $no=1; ?>
					<?php foreach($result6 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSeven">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseSeven">
		          School of Nursing (SON) <?php echo "(".count($result7).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
		      <div class="panel-body">
	      
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">

                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result7)>0):?>
					<?php $no=1; ?>
					<?php foreach($result7 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingEight">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseEight">
		          School of Teacher Education (STE) <?php echo "(".count($result8).")"?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
		      <div class="panel-body">
	      
<div class="container-fluid" id="other">
		<div class="container">
<div id="liveFilter">
                    
			<table class="table table-hover liveFilterList">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result8)>0):?>
					<?php $no=1; ?>
					<?php foreach($result8 as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["lastName"]; ?></td>
                        <td><?php echo $student["firstName"]; ?></td>
                        <td><?php echo $student["middleName"] ?></td>
                        <td><?php echo $student["course"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
</div>
		</div>
	</div>		      </div>
		    </div>
		  </div>
		</div>
	</div>

<?php include "fragments/footer.php" ?>