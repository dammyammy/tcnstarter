<?php

/*
|--------------------------------------------------------------------------
| Settings Related Helpers @ app/config/settings.php
|--------------------------------------------------------------------------
| 
*/

function ClientEmail($name){
	return HTML::mailto(Config::get('settings.company.email.' . $name ));
}

function ClientEmailAddress($name){
	return Config::get('settings.company.email.' . $name );
}

function ClientPhone($name){
	return Config::get('settings.company.phone.' . $name );
}

function ClientAddress($name){
	return Config::get('settings.company.address.' . $name );
}

function ClientSocial($name, $type = 'url'){
	return Config::get('settings.company.' . $name .'.' . $type );
}

function Client($name){
	return Config::get('settings.company.' . $name );
}

function TCN($name){
	return Config::get('settings.developer.' . $name );
}

function CSS($filename){
	return asset('/css/'. $filename);
}

function JS($filename){
	return asset('/js/'. $filename);
}

function minCSS($filename){
	return asset('/cssmin/'. $filename);
}

function minJS($filename){
	return asset('/jsmin/'. $filename);
}

function ASSETS($filename){
	return asset('/assets/'. $filename);
}

function IMG($filename){
	return asset('/img/'. $filename);
}

function OIMG($filename){
	return asset('/images/'. $filename);
}

function FONT($filename){
	return asset('/fonts/'. $filename);
}
