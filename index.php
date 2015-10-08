
<?php
include('init.php');

//$sizes = array(100 => 100, 150 => 150, 250 => 250);
//var_dump($_SERVER['REQUEST_METHOD'] );	
//var_dump($_FILES['image']);
//hello;

if ($_SERVER['REQUEST_METHOD'] =='POST' AND isset($_FILES['image'])){
	echo 'here 1';
	if( $_FILES['image']['size'] < $Image->max_file_size ){
		echo 'here 2';
		// get file extension
		$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		//var_dump($ext);
		$is_a_valid_extension=$Image->is_a_valid_image_type($ext);

		$sizes=$Image->sizes;
		if ($is_a_valid_extension) {
			/* resize image */
			foreach ($sizes as $w => $h) {
				$files[] = $ImageUploader->resize($w, $h);
			}

		} else {
			$msg = 'Unsupported file';
		}
	} else{
		echo 'here 3';
		$msg = 'Please upload image smaller than 200KB';
	}
} 



?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Image resize while uploading - w3bees.com demo</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrap">
		<h1><a href="http://www.w3bees.com/2013/03/resize-image-while-upload-using-php.html">Image resize while uploading</a></h1>
		<?php if(isset($msg)): ?>
			<p class='alert'><?php echo $msg ;?></p>
		<?php endif ?>
		
		<!-- file uploading form -->
		<form action="" method="post" enctype="multipart/form-data">
			<label>
				<span>Choose image</span>
				<input type="file" name="image" accept="image/*" />
			</label>
			<input name ="image-upload" id ="image-upload"  type="submit" value="Upload Image" />
		</form>
		
		<?php
		// show image thumbnails
		if(isset($files)){
			foreach ($files as $image) {
				echo "<img class='img' src='{$image}' /><br /><br />";
			}
		}
		?>
	</div>
</body>
</html>