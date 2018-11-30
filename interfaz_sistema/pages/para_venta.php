<?php  
	
	class Comida 
	{
		
		public function oodo()
		{
			$producto=100516;
			$iva=($producto*19)/100;
			$total=$producto+$iva;

			echo "El valor del plato es: ", $producto, "</br>";
			echo "El valor del iva es: ", $iva, "</br>";
			echo "El valor del total es: ", $total, "</br>";
		}
	}

	
?>
