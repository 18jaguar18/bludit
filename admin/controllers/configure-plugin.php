<?php defined('BLUDIT') or die('Bludit CMS.');

// ============================================================================
// Check role
// ============================================================================

if($Login->role()!=='admin') {
	Alert::set('You do not have sufficient permissions to access this page, contact the administrator.');
	Redirect::page('admin', 'dashboard');
}

// ============================================================================
// Functions
// ============================================================================

// ============================================================================
// Main before POST
// ============================================================================
$_Plugin = false;

foreach($plugins['all'] as $P)
{
	if($P->className()==$layout['parameters']) {
		$_Plugin = $P;
	}
}

// Check if the plugin exists.
if($_Plugin===false) {
	Redirect::page('admin', 'plugins');
}

// Check if the plugin has the method form.
if($_Plugin->form()===false) {
	Redirect::page('admin', 'plugins');
}

// ============================================================================
// POST Method
// ============================================================================

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$_Plugin->setDb($_POST);
	Alert::set('Configuration has been saved successfully');
}

// ============================================================================
// Main after POST
// ============================================================================
