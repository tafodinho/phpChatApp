<?php
	if(isset($_POST['submit']))
	{
		$image_name = $_FILES['picture']['name'];
		$image_size = $_FILES['picture']['size'];
		$image_ext = end(explode('.', $image_name));
		$image_tmp = $_FILES['picture']['tmp_name'];
		$target_dir = "../img/profile/";
		$target_file = $target_dir .substr((md5(time())), 0, 10).".".$image_ext;;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


		//checks if file is ready to upload
		if($uploadOk == 0)
		{
			echo "Sorry, your file was not uploaded.";
		}
		else
		{
			if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file))
			{
				echo "The file ".basename($_FILES['picture']['name'])." has been uploaded.";
				

			}
			else
			{
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

?>