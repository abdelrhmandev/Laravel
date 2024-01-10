<?php include 'config.php';?>



<?php 
function hasChild($id){
	global $conn;
	 $sql = "SELECT * FROM categories WHERE 1 AND id = '$id' ORDER BY id ASC";
      $query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {
        return true;
    }
    return false;
}

function dumpTree($parent = 0, $level = 0){	
	global $conn;
	 $sql = "SELECT * FROM categories WHERE 1 AND parent_id = '$parent'";
    // select all categories that have the parent with which the function was called
    $cats = mysqli_query($conn,$sql);
	
	
    foreach ($cats AS $cat) {
        echo '<option value="'. $cat['id'] .'">' . str_repeat("-", $level*2) . $cat['title'] . "</option>"; 		
        if (hasChild($cat['id'])) { 
            dumpTree($cat['id'], $level+1,$conn);  
        }
    }
}
?>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$title = $_POST["title"];
	$parent = $_POST["parent"];
	$add = $_POST["add"];
	// check validation 
		if(!empty($add) == 1){
			if(!empty($title)){
			$SQL = mysqli_query($conn,"INSERT INTO categories (title,parent_id) VALUES ('$title','$parent')");
			if($SQL){
					echo '<div style="color:green;">Sub Category &nbsp;&nbsp;'.$title.'&nbsp; Added</div>';
				}
			}else{
					echo '<div style="color:red;">Please insert main category name</div>';
			}	
		}// check add post 
}
?>




<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input type="hidden" name="add" value="1">
<?php
echo '<select name="parent">';
dumpTree(); // plant a tree here, thank you very much ;)  
echo '</select>';
?>
<br><br>
<input type="text" name="title" id="title">
<br><br>
<input type="submit" name="submit" value="Add Sub Category">
</form>