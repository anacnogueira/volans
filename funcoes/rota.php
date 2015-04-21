<?

function rota($origem,$destino,$hora){
  $usu_origem = $origem;
	$usu_destino = $destino;

	foreach ($cidade as $c => $v) {
		$D[$c] = $T[$usu_origem][$c];
		$R[$c] = $usu_origem;
	}

	$S[$usu_origem]=1;


	while (count(array_diff_assoc($cidade,$S))) {

        	$m=100;
		foreach ($cidade as $c => $v) {
			if (!isset ($S[$c])) {
				if ($D[$c] < $m) {
					$m=$D[$c];
					$w=$c;
				}
			}
		}

		$S[$w]=1;
		foreach ($cidade as $c => $v) {
			if (!isset ($S[$c])) {
				if ($D[$w] + $T[$w][$c] < $D[$c]) {
					$D[$c]=$D[$w] + $T[$w][$c];
					$R[$c]=$w;
				}
			}
		}
	}
  //Alterar ordem de origem e destino
limpa();

	$c = $R[$usu_destino];
	while ($c != $usu_origem) {
		push($c);
		$c = $R[$c];
	}
	push($c);

  }
?>
