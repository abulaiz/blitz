<?php 


	class FileController
	{

		public function image()
		{
			$file = "";
			foreach ($_GET as $key=>$value) {
				$file = $key;
			}

			$file = str_replace("_", ".", $file);
			// Get file extention
			$stream = explode(".", $file);
			$format = $stream[count($stream)-1];

			// Only allow image format
			if($format == "php" || $format == "py") die();

			// Print out Image file
			header('Content-type: image/jpeg');
			echo file_get_contents(Vendor::Path('storage/'.$file));
		}

	}

 ?>