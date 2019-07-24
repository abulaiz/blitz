<?php 

	class MonoAlpha{

		private $key = "xyz";

		public function encrypt($str){
			$key = rand(1, 3);
			$r = "";
			for($i=0; $i < strlen($str); $i++){
				$r .= chr(ord($str[$i]) + $key);
			}

			return $this->key[ $key - 1 ].$r;
		}

		public function decrypt($str){
			$k = $str[0];
			if($k == 'x') $key = 1;
			elseif ($k == 'y') $key = 2;
			elseif ($k == 'z') $key = 3;

			$str = substr($str, 1);
			$r = "";
			for($i=0; $i < strlen($str); $i++){
				$r .= chr(ord($str[$i]) - $key);
			}						
			return $r;
		}
	}

 ?>