<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2014 Leo Feyer
 * 
 * @package Logo
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'logo',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'logo\ModuleLogo' => 'system/modules/logo/modules/ModuleLogo.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_logo' => 'system/modules/logo/templates',
));
