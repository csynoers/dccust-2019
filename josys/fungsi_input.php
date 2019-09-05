<?php
function cleanInput($data){
	$filter_sql = (stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

function input($params){
	return !empty($_REQUEST[$params])? $_REQUEST[$params]:'NULL';
}