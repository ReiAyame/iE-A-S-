<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM subjects");
	$query->execute();
	$result = $query->fetchAll();
	
?>
<script src="js/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript">

jQuery(document).ready(function(e) {
    
    var columnsToIndex = [1,2,3,6]; // first column is 1
    
    initLiveFilter(columnsToIndex);
});

// Live Filter
function initLiveFilter(columnsToIndex) {

    var liveFilter = jQuery("#liveFilter");
    
    if (liveFilter.length > 0) {
        
        var liveFilterField     = liveFilter.find("input.liveFilterInput"),
            liveFilterGrid      = liveFilter.find("table.liveFilterList"),
            liveFilterGridRows  = liveFilterGrid.find("tr:gt(0)"), // gt(0) prevents the first row (normally a TH) from being included.
            liveFilterClear     = liveFilter.find(".clearField"),
            liveFilterNoResults = liveFilterGrid.prev(),
            liveFilterDataArray = new Array(),
        
    //Create an array and populate it with key codes that should not cause shake effects
    
            characterValidationArray = [8,45,46], //backspace, insert, delete
        
    //Create an array and populate it with key codes that don't trigger an action
        
            characterExclusionArray = [13,20,27,33,34,37,39,35,36,16,17,18,144,145]; // enter, caps, esc, page up, page down, left, right, home, end, shift, ctrl, alt, num lock, scroll lock
        
    // Create the datasources we'll use to index the content
    
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
    
    // When a key is pressed in the designated input field - do the following:
    
        liveFilterField.on("keyup",function(key){
            
        // Check the character that was pressed and ensure it doesn't exist in the exclusion array defined above
    
            if (jQuery.inArray(key.keyCode,characterExclusionArray) == -1) {
            
                var liveFilterValue = liveFilterField.val();
    
                if (!liveFilterField.hasClass("default")){
                
                    if (liveFilterValue != "") {
    
                        liveFilterClear.fadeIn(300);
        
                        rowsToShow = new Array();
                        
                        var currentRow = 0;
                        
                    // Check the value entered against a regular expression matched with the column data. If a match exists add the row to a new array
    
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
                    
                    // If there are matches, show the grid, hide all the rows and show the selected ones
    
                        if (rowsToShow.length > 0) {
    
                            liveFilterGrid.show();
                            liveFilterGridRows.hide();
                            if (liveFilterNoResults.is(":visible")) {
                                liveFilterNoResults.slideUp(150);
                            }
                            
                            for (var i=0; i < rowsToShow.length; i+=1) {
    
                                jQuery(liveFilterGridRows.get(rowsToShow[i])).show();
    
                            }
                            
                    // If there are NO matches we hide the grid and display an error panel. If an incorrect value is entered while the error panel is visible it shakes itself assuming if                                      it doesn't match any of the excluded values defined in the characterValidationArray
                            
                        } else {
                            
                            liveFilterGrid.hide();
    
                            // if the no results panel is shown and the effects queue length is 0 and there are no illegal character presses
                                                    
                            if (liveFilterNoResults.is(":visible") && liveFilterNoResults.queue().length == 0 && jQuery.inArray(key.keyCode,characterValidationArray) == -1) {
                                
                                liveFilterNoResults.effect('shake', {times:3, distance:3}, 100);
    
                            } else {
                                liveFilterNoResults.slideDown(150); 
                            }
                        }
                        
                    // If the value entered is blank, hide the clear field button, show the grid and all of its rows and hide the no results panel if it is visible
                    
                    } else {
    
                        clearField();
                    }
                }
            }
        });
        
        // When the designated input field is clicked do the following:
    
        liveFilterField.on("focus", function(){
    
            if (liveFilterField.hasClass("default")){
                liveFilterField.val("").removeClass("default");
            }
            
            return false;
    
        });
        
        // When the clear field link is clicked do the following:
        
        liveFilterClear.on("click",function(){
    
            clearField();
            
            return false;
    
        });
        
        // The clear field function which clears the search field under certain conditions
        
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
			<h2>View Subjects</h2>
			

<div id="liveFilter">
    <div class="liveFilterContainer">
        <input type="text" class="liveFilterInput default" />
        <a href="#" class="clearField" title="Clear Filter">x</a>
    </div>
    <div class="noResults"> Enter Search Key</div>
                    <table class="liveFilterList table table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>School</th>
                                <th>Course</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Description</th>
                                <th>Units</th>
                                <th>Slots</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody align="center">
                        <?php if(count($result)>0):?>
                            <?php $no=1; ?>
                            <?php foreach($result as $student): ?>
                            <tr>
                                <td><?php echo $student["subjectCode"]; ?></td>
                                <td><?php echo $student["school"]; ?></td>
                                <!--<td><?php echo $student->firstName; ?></td>-->
                                <td><?php echo $student["course"]; ?></td>
                                <td><?php echo $student["year"] ?></td>
                                <td><?php echo $student["semester"] ?></td>
                                <td><?php echo $student["description"] ?></td>
                                <td><?php echo $student["units"] ?></td>
                                <td><?php echo $student["slots"] ?></td>
                                <td><a href="updateSub.php?id=<?php echo $student["subjectCode"] ?>">Edit</a></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
</div>
		</div>
	</div>
<?php include "fragments/footer.php" ?>