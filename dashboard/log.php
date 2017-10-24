<?php
const DEBUG = true;

function debug_print($info) {
	if(!DEBUG) {
		return;
	}
	print($info);
}

function debug_print_r($info) {
	if(!DEBUG) {
		return;
	}
	print(var_dump($info));
}