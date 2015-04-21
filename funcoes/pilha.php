<?php

function push($x) {

 global $pilha, $topo;

	$pilha[$topo] = $x;

	$topo++;
}

function pop() {

	global $pilha, $topo;

	$k = $pilha[$topo-1];

	$topo--;

	return $k;
}

function vazia() {

	global $topo;

	return ($topo == 0);
}

function limpa() {

	global $topo;

	$topo = 0;
}

 ?>
  
