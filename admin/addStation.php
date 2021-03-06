<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }
if(isset($_POST['submit']))
{
	$output = "";
	$error = 0;

	
		// db insert
		try{
		$stmt = $db->prepare('INSERT INTO station (CityID,Name,Bay) VALUES (:cID,:name,:bay)');
		$stmt->execute(array('cID' => $_POST['cID'],   'name' => $_POST['name'],   'bay' => $_POST['bay']));
		$output = "Station added successfully!";
		
		}catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;

	}
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<?php
		if(isset($_POST['submit']))
		{
			if($error == 1)
			{
				echo '<div class="alert alert-danger" role="alert">'.$output.'</div>';
			}
			else
			{
				echo '<div class="alert alert-success" role="alert">'.$output.'</div>';
			}
		}
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Station Panel</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>CityID</label>
                            <input class="form-control" name="cID" placeholder="cIDID">
                          </div>
						  <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="name">
													  <div class="form-group">
                            <label>Bay</label>
                            <input class="form-control" name="bay" placeholder="bay">
                          <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </form>
                        
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
            
            
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="../style/js/jquery-1.11.1.min.js"></script>
	<script src="../style/js/bootstrap.min.js"></script>	
</body>

</html>