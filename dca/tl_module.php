<?php 

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package   logo 
 * @author    Daniel Kiesel 
 * @license   LGPL 
 * @copyright Daniel Kiesel 2012 
 */


/**
 * Table tl_module 
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['logo'] = '{title_legend},name,type;{source_legend},singleSRC;{config_legend},imgSize;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['fields']['name']['eval']['tl_class'] = 'w50';
$GLOBALS['TL_DCA']['tl_module']['fields']['type']['eval']['tl_class'] = 'w50';
