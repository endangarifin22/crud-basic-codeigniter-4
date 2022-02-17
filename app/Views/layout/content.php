<?php
/**
 * $content is string file in View folder for show content
 * 
 * */

if(isset($content)){
    echo view($content);
} else {
	echo 'Content Not Found';
}