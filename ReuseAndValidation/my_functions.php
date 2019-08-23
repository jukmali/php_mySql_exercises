<?php
function is_weekend($day)
{
	if (strcasecmp($day,'saturday')==0||strcasecmp($day,'sunday')==0)
		return true;
	else
		return false;
}
?>