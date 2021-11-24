<?php 
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-5">
  <h2>Registeration Form</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="text">Stundent Id: </label>
      <input type="text" class="form-control" id="studentnum" placeholder="Enter Student Id" name="studentnum">
    </div>
    <div class="form-group">
      <label for="fullname">Fullname:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname">
    </div>
    <div class="form-group">
      <label for="birthday">Birthday:</label>
      <input type="date" class="form-control" id="birthday" placeholder="Enter Birthday" name="birthday">
    </div>
	<div class="form-group">
      <label for="course">Course:</label>
      <input type="text" class="form-control" id="course" placeholder="Enter Course" name="course">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
	<button type="reset" name="clear" class="btn btn-default">Clear</button>

  </form>
</div>
</div>
<div class="col-lg-12">
 <table class="table table-bordered">
    <thead>
      <tr>
	  <th># </th>
        <th>Student Id</th>
        <th>Fullname</th>
        <th>Birthday</th>
		<th>Course</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
	   $dis = mysqli_query($conn, "select * from students");
	  while ($row = mysqli_fetch_array($dis))
	  {
		  echo "<tr>";
	  echo "<td>"; echo  $row["id"]; echo "</td>";
	  echo "<td>"; echo  $row["studentnum"]; echo "</td>";
	  echo "<td>"; echo  $row["fullname"]; echo "</td>";
	  echo "<td>"; echo  $row["birthday"]; echo "</td>";
	  echo "<td>"; echo  $row["course"]; echo "</td>";
	  echo "<td>"; echo  $row["email"]; echo "</td>";
	   echo "<td>";?> <a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
	   echo "<td>";?> <a href="delete.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
		  echo "</tr>";
		  
	  }
	  ?>
     
    </tbody>
  </table>
</div>

<?php  
	if (isset($_POST["insert"]))
	{
		mysqli_query($conn,"insert into students values(NULL, '$_POST[studentnum]', '$_POST[fullname]', 
		'$_POST[birthday]','$_POST[course]','$_POST[email]')");
		?>
		<script type="text/javascript">
		window.location.href=window.location.href;
		</script>
		<?php
	}

	
?>

</body>
</html>