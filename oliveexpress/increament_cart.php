<?php
$product_id = $_POST["pid"];


if(!empty($_COOKIE['item'])){
				if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
	 {
			foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$found = 0;
				if($product_id == $values11[5])
				{
					$found = $found + 1;
					$qty = $values11[3] + 1;
					$img1 = $values11[0];
					$nm = 	$values11[1];
					$prize = $values11[2];
					$id = $values11[5];
					$total = $values11[4];		
					if($qty == 0)
					{
						?>
						<script type='text/javascript'>
								alert("No more available product in the cart");
						</script>
						
						<?php
					}else{
					
					$total = $values11[2] * $qty;
					
					setcookie("item[$name]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id,time()+1800);
					
					}
				}
			}
			$tot = 0;
			foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$tot = $tot + $values11[4];
			}
			$tot = $tot + $prize;
			echo"$img1"."_"."$nm"."_"."$prize"."_"."$qty"."_"."$total"."_"."$id"."_"."$tot";	
		
		}
}
?>