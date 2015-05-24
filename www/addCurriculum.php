<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM curriculums");
	$query->execute();
	$result = $query->fetchAll();
	
?>
<script src="js/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript">

jQuery(document).ready(function(e) {
    
    var columnsToIndex = [1,2,3,4,6]; // first column is 1
    
    initLiveFilter(columnsToIndex);
});

function initLiveFilter(columnsToIndex) {

    var liveFilter = jQuery("#liveFilter");
    
    if (liveFilter.length > 0) {
        
        var liveFilterField     = liveFilter.find("input.liveFilterInput"),
            liveFilterGrid      = liveFilter.find("table.liveFilterList"),
            liveFilterGridRows  = liveFilterGrid.find("tr:gt(0)"),
            liveFilterClear     = liveFilter.find(".clearField"),
            liveFilterNoResults = liveFilterGrid.prev(),
            liveFilterDataArray = new Array(),
        
    
            characterValidationArray = [8,45,46],
        
        
            characterExclusionArray = [13,20,27,33,34,37,39,35,36,16,17,18,144,145];
        
    
        if (columnsToIndex.length > 1) {
            
            for (col=0; col<=columnsToIndex.length-1; col++)
            {
    
                liveFilterGridRows.children("td:nth-child(" + columnsToIndex[col] + ")").each(function(i){
                
                    liveFilterDataArray[liveFilterDataArray.length++] = jQuery(this).text();
                
                });
            }
            
        } else {
            
            liveFilterGridRows.children("td:first-child").each(function(i){
                
                liveFilterDataArray[i] = jQuery(this).text();
                
            });
        }
   
    
        liveFilterField.on("keyup",function(key){
            
    
            if (jQuery.inArray(key.keyCode,characterExclusionArray) == -1) {
            
                var liveFilterValue = liveFilterField.val();
    
                if (!liveFilterField.hasClass("default")){
                
                    if (liveFilterValue != "") {
    
                        liveFilterClear.fadeIn(300);
        
                        rowsToShow = new Array();
                        
                        var currentRow = 0;
                        
    
                        for (var i=0; i < liveFilterDataArray.length; i+=1) {
        
                            RE = eval("/" + liveFilterValue + "/i");
            
                            if (liveFilterDataArray[i].match(RE)) {
                                
                                rowsToShow.push(currentRow);
                                
                            }
                            
                            if(currentRow < liveFilterGridRows.length - 1) {
        
                                currentRow++;
                                
                            } else {
        
                                currentRow = 0;
        
                            }
                        }
                    
    
                        if (rowsToShow.length > 0) {
    
                            liveFilterGrid.show();
                            liveFilterGridRows.hide();
                            if (liveFilterNoResults.is(":visible")) {
                                liveFilterNoResults.slideUp(150);
                            }
                            
                            for (var i=0; i < rowsToShow.length; i+=1) {
    
                                jQuery(liveFilterGridRows.get(rowsToShow[i])).show();
    
                            }
                            
                        } else {
                            
                            liveFilterGrid.hide();
    
                                                    
                            if (liveFilterNoResults.is(":visible") && liveFilterNoResults.queue().length == 0 && jQuery.inArray(key.keyCode,characterValidationArray) == -1) {
                                
                                liveFilterNoResults.effect('shake', {times:3, distance:3}, 100);
    
                            } else {
                                liveFilterNoResults.slideDown(150); 
                            }
                        }
                        
                    
                    } else {
    
                        clearField();
                    }
                }
            }
        });
        
    
        liveFilterField.on("focus", function(){
    
            if (liveFilterField.hasClass("default")){
                liveFilterField.val("").removeClass("default");
            }
            
            return false;
    
        });
        
        
        liveFilterClear.on("click",function(){
    
            clearField();
            
            return false;
    
        });
        
        
        function clearField() {
    
            liveFilterField.val('');
            liveFilterClear.fadeOut(300);
            liveFilterNoResults.slideUp(300);
            liveFilterGridRows.show();
            liveFilterGrid.show();
        }
    }
}
</script>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Curriculum</h2>
<div id="liveFilter">
    <div class="liveFilterContainer">
        <input type="text" class="liveFilterInput default" />
        <a href="#" class="clearField" title="Clear Filter">x</a>
    </div>
    <div class="noResults"> Enter Search Key</div>
			<table class="liveFilterList table table-hover">
				<thead>
					<tr>
						<th>School Year</th>
						<th>Course</th>
						<th>Year</th>
						<th>Semester</th>
						<th>Subject Code</th>
                        <th></th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $curriculum): ?>
                    <tr>
                        <td><?php echo $curriculum["school_year"]; ?></td>
                        <td><?php echo $curriculum["course"]; ?></td>
                        <td><?php echo $curriculum["year"] ?></td>
                        <td><?php echo $curriculum["semester"] ?></td>
                        <td><?php echo $curriculum["subjectCode"] ?></td>
                        <td><a href="updateCurriculum.php?id=<?php echo $curriculum["curr_id"] ?>">Edit</a></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>

<?php include "fragments/footer.php" ?>