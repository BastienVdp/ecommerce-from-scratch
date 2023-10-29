<?php 

function Redirect($url)
{
	header("Location: $url");
	exit;
}