<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

if ( !function_exists( 'timestampToLiteral' ) )
{
	function dateFR( $format, $timestamp = null )
	{
		$FR = array(
			//Day
			"Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche",
			//Month
			"Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" );
		$EN = array(
			//Day
			"Monday", "Monday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday",
			//Month
			"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" );
		return str_replace( $EN, $FR, date( $format, $timestamp ) );
	}
}