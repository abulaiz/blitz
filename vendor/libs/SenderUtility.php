<?php 

	class SenderUtility
	{
		
		public static function generate_id($source_code)
		{
			$ret = dechex(date("Ymd"));
			$ret .= dechex(date("His"));
			$ret .= "-".dechex($source_code);
			return strtoupper($ret);
		}

		public static function upload($image, $id)
		{
			$info = explode(".", $image['name']);
			$ext = $info[count($info)-1];
			$extC = strtoupper($ext); 

			if($extC=="PHP" || $extC=="HTML" || $extC=="PY") return false;

			$name = date("YmdHis");
			$dir = Vendor::Path("storage/$id");

			if(!file_exists($dir)) {
				$oldmask = umask(0);
				mkdir($dir, 0777);
				umask($oldmask);				
			}

			$newname = $dir."/".$name.".".$ext;
			move_uploaded_file($image['tmp_name'], $newname);
			return true;
		}

		public static function getImageURL($id){
			$path = Vendor::Path("storage/$id");
			if(!file_exists($path)) return "None";
			$d = scandir($path, 1);
			$filename = $d[0];
			if(file_exists($path."/".$filename))
				return "storage/image?".$id."/".$filename;
			else return "None";

		}

		public static function removeImage($id){
			$path = Vendor::Path("storage/$id");
			if(!file_exists($path)) return "None";
			$d = scandir($path, 1);
			$filename = $d[0];
			if(file_exists($path."/".$filename)){
				unlink(Vendor::Path("storage/$id/$filename"));	
				rmdir(Vendor::Path("storage/$id"));	
			}
		}


	}

 ?>