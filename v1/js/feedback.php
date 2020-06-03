<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'] && $_POST['name']!=null)){
		$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$phone=(!empty($_POST['phone']))? filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT):0;
		$msg=filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
		$stmt= $con->prepare('INSERT INTO messages (username, email, phone, msg) VALUES (:zusername, :zemail, :zphone, :zmsg)');
		$stmt->execute(array('zusername' => $name, 'zemail' => $email, 'zphone' => $phone, 'zmsg' => $msg));
		$stmt->rowCount();
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong>Thanks <?php echo $name ?> ,for feedbacking
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
		header('Refresh:2;url=index.php');
		$_POST['name']=null;unset($_POST);
	}
	else{
		?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong>Someting wrong was happened
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
		header('Refresh:2;url=index.php');
	}
}else{
	header('Refresh:2;url=index.php');
}
?>