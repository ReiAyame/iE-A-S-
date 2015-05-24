<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once "fragments/db_connect.php";

	include "assets/libchart/classes/libchart.php";
	
?>

	<div class="container-fluid" id="other">
		<h2>Statistics</h2>
		<p>These statistics are based on the database where this application is connected to. Any questions or concerns about how this function works, please contact the programmers immediately. Enjoy looking the population of Saint Louis University. Thank you!</p>

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
				<?php
					$chart = new PieChart( 900, 540 );
					$dataSet = new XYDataSet();
					$query = "SELECT COUNT(`students`.`course`) AS `counts`, `schools`.`school_code` AS `schools` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code` GROUP BY `schools`.`school_code`";
					$result = $mysqli->query( $query );
					$num_results = $result->num_rows;

					if( $num_results > 0 ){
					
						while( $row = $result->fetch_assoc() ){
							extract($row);
							$dataSet->addPoint(new Point("{$schools} {$counts}", $counts));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("Overall Statistics of Saint Louis University's Schools");
						$chart->render("generated/overall.png");
						echo "<img alt='SLU Schools Pie Chart'  src='generated/overall.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
		    <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		        	School of Accountancy and Business Management (SABM)
		        </a>
		    </h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		    <div class="panel-body">
		        <?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_sabm = "SELECT COUNT(`students`.`student_id`) AS `students_sabm`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'SABM' GROUP BY `courses`.`course`";
					$result_sabm = $mysqli->query( $query_sabm );
					$num_results_sabm = $result_sabm->num_rows;

					if( $num_results_sabm > 0 ){
					
						while( $row_sabm = $result_sabm->fetch_assoc() ){
							extract($row_sabm);
							$dataSet->addPoint(new Point("{$courses}", $students_sabm));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Accountancy and Business Management (SABM) Courses Statistics");
						$chart->render("generated/sabm.png");
						echo "<img alt='SABM Pie Chart'  src='generated/sabm.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
	<div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingThree">
		    <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		        	School of Computing and Information Sciences (SCIS)
		        </a>
		    </h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		    <div class="panel-body">
		    	<?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_scis = "SELECT COUNT(`students`.`student_id`) AS `students_scis`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'scis' GROUP BY `courses`.`course`";
					$result_scis = $mysqli->query( $query_scis );
					$num_results_scis = $result_scis->num_rows;

					if( $num_results_scis > 0 ){
					
						while( $row_scis = $result_scis->fetch_assoc() ){
							extract($row_scis);
							$dataSet->addPoint(new Point("{$courses}", $students_scis));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Computing and Information Sciences (SCIS) Courses Statistics");
						$chart->render("generated/scis.png");
						echo "<img alt='SCIS Pie Chart'  src='generated/scis.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingFour">
		    <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			        School of Engineering and Architecture (SEA)
		        </a>
		    </h4>
		</div>
	    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
	    	<div class="panel-body">
	    		<?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_sea = "SELECT COUNT(`students`.`student_id`) AS `students_sea`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'sea' GROUP BY `courses`.`course`";
					$result_sea = $mysqli->query( $query_sea );
					$num_results_sea = $result_sea->num_rows;

					if( $num_results_sea > 0 ){
					
						while( $row_sea = $result_sea->fetch_assoc() ){
							extract($row_sea);
							$dataSet->addPoint(new Point("{$courses}", $students_sea));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Engineering and Architecture (SEA) Courses Statistics");
						$chart->render("generated/sea.png");
						echo "<img alt='SEA Pie Chart'  src='generated/sea.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
	     	</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingFive">
		    <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
			        School of Natural Sciences (SNS)
		        </a>
		    </h4>
		</div>
		<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
		    <div class="panel-body">
		    	<?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_sns = "SELECT COUNT(`students`.`student_id`) AS `students_sns`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'sns' GROUP BY `courses`.`course`";
					$result_sns = $mysqli->query( $query_sns );
					$num_results_sns = $result_sns->num_rows;

					if( $num_results_sns > 0 ){
					
						while( $row_sns = $result_sns->fetch_assoc() ){
							extract($row_sns);
							$dataSet->addPoint(new Point("{$courses}", $students_sns));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Natural Sciences (SNS) Courses Statistics");
						$chart->render("generated/sns.png");
						echo "<img alt='SNS Pie Chart'  src='generated/sns.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingSix">
		    <h4 class="panel-title">
			    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
		    	    School of Humanities (SOH)
		        </a>
		    </h4>
		</div>
		<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		    <div class="panel-body">
		    	<?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_soh = "SELECT COUNT(`students`.`student_id`) AS `students_soh`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'soh' GROUP BY `courses`.`course`";
					$result_soh = $mysqli->query( $query_soh );
					$num_results_soh = $result_soh->num_rows;

					if( $num_results_soh > 0 ){
					
						while( $row_soh = $result_soh->fetch_assoc() ){
							extract($row_soh);
							$dataSet->addPoint(new Point("{$courses}", $students_soh));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Humanities (SOH) Courses Statistics");
						$chart->render("generated/soh.png");
						echo "<img alt='SOH Pie Chart'  src='generated/soh.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingSeven">
		    <h4 class="panel-title">
			    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
		    	    School of Teacher Education (STE)
		        </a>
		    </h4>
		</div>
		<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
		    <div class="panel-body">
		    	<?php
					$chart = new VerticalBarChart();
					$dataSet = new XYDataSet();
					$query_ste = "SELECT COUNT(`students`.`student_id`) AS `students_ste`, `courses`.`course` AS `courses` FROM `schools` INNER JOIN `students` INNER JOIN `courses` WHERE `students`.`course` = `courses`.`course` AND `courses`.`school` = `schools`.`school_code`  AND `schools`.`school_code` = 'STE' GROUP BY `courses`.`course`";
					$result_ste = $mysqli->query( $query_ste );
					$num_results_ste = $result_ste->num_rows;

					if( $num_results_ste > 0 ){
					
						while( $row_ste = $result_ste->fetch_assoc() ){
							extract($row_ste);
							$dataSet->addPoint(new Point("{$courses}", $students_ste));
						}
					
						$chart->setDataSet($dataSet);
						$chart->setTitle("School of Teacher Education (STE) Courses Statistics");
						$chart->render("generated/ste.png");
						echo "<img alt='STE Pie Chart'  src='generated/ste.png' />";

					} else {
						echo "No schools found in the database.";
					}
				?>
		    </div>
		</div>
	</div>
</div>

<?php include "fragments/footer.php" ?>