<?php 

	class TriangleCrypt
	{


		private $matrix = [];

		private function getMatrix($i, $j){ // i = baris, j = kolom
			return $this->matrix["$i"]["$j"];
		}

		private function setMatrix($i, $j, $val){
			if(isset( $this->matrix["$i"] )){
				$this->matrix["$i"]["$j"] = $val;
			} else {
				$this->matrix["$i"] = [
					"$j" => $val
				];
			}
		}

		private function fetch_first_index_as_array($reverse = false){
			$r = [];
			foreach ($this->matrix as $item) {
				
				if($reverse) 
					$item = array_reverse($item);

				foreach ($item as $value) {
					$r[] = $value;
					break;
				}
			}
			return $reverse ? array_reverse($r) : $r;
		}

		private function fetch_first_index_as_code($reverse = false){
			return implode("x", $this->fetch_first_index_as_array($reverse));
		}

		private function fetch_first_index($reverse = false){
			$r = "";
			foreach ($this->matrix as $item) {
				
				if($reverse) 
					$item = array_reverse($item);

				foreach ($item as $value) {
					$r .= chr($value);
					break;
				}
			}
			return $reverse ? strrev($r) : $r;
		}


		public function encrypt($str, $key){
			$this->matrix = [];
			$n = strlen($str);

			for($j = 1; $j <= $n; $j++){
				$val = ord($str[$j-1]) + ($key*1) % 256;
				$this->setMatrix(1,$j, $val );
			}

			for($i = 2; $i <= $n; $i++){
				for($j = $i; $j <= $n; $j++){
					$val = $this->getMatrix($i - 1, $j) + ($key*$i) % 256;
					$this->setMatrix($i,$j, $val );
				}							
			}

			$str = $this->fetch_first_index_as_array();
			$this->matrix = [];

			for($j = 1; $j <= $n; $j++){
				$val = $str[$j-1] + ($key*1) % 256;
				$this->setMatrix(1,$j, $val );
			}

			for($i = 2; $i <= $n; $i++){
				for($j = 1; $j <= $n - $i + 1; $j++){
					$val = $this->getMatrix($i - 1, $j) + ($key*$i) % 256;
					$this->setMatrix($i,$j, $val );
				}							
			}

			return $this->fetch_first_index_as_code(true);
		}

		public function decrypt($code, $key){
			$this->matrix = [];
			$str = explode('x', $code);
			$n = count($str);

			for($j = 1; $j <= $n; $j++){
				$val = $str[$j-1] - ($key*1) % 256;
				$this->setMatrix(1,$j, $val );
			}

			for($i = 2; $i <= $n; $i++){
				for($j = 1; $j <= $n - $i + 1; $j++){
					$val = $this->getMatrix($i - 1, $j) - ($key*$i) % 256;
					$this->setMatrix($i,$j, $val );
				}							
			}

			$str = $this->fetch_first_index_as_array(true);
			$this->matrix = [];

			for($j = 1; $j <= $n; $j++){
				$val = $str[$j-1] - ($key*1) % 256;
				$this->setMatrix(1,$j, $val );
			}

			for($i = 2; $i <= $n; $i++){
				for($j = $i; $j <= $n; $j++){
					$val = $this->getMatrix($i - 1, $j) - ($key*$i) % 256;
					$this->setMatrix($i,$j, $val );
				}							
			}

			return $this->fetch_first_index();			
		}		
	}

 ?>