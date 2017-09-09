<?php 

for($i = 4; $i >= 0; $i--){
	echo $i.$i;
	for($j = $i; $j >= 0; $j--){
		echo $i + 2;
	}
	echo '<br>';
}

?>