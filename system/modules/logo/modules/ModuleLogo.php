<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * @package    logo
 * @author     Daniel Kiesel <daniel@craffft.de>
 * @license    LGPL
 * @copyright  Daniel Kiesel 2012
 */


/**
 * Namespace
 */
namespace logo;


/**
 * Class ModuleLogo
 *
 * @copyright  Daniel Kiesel 2012-2014
 * @author     Daniel Kiesel <daniel@craffft.de>
 * @package    Devtools
 */
class ModuleLogo extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_logo';


	/**
	 * generate function.
	 *
	 * @access public
	 * @return void
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### LOGO MODULE ###';

			return $objTemplate->parse();
		}

		if ($this->singleSRC == '')
		{
			return '';
		}

		if (!is_numeric($this->singleSRC))
		{
			return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
		}

		$objFile = \FilesModel::findByUuid($this->singleSRC);

		if ($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
		{
			return '';
		}

		$this->singleSRC = $objFile->path;

		return parent::generate();
	}


	/**
	 * compile function.
	 *
	 * @access protected
	 * @return void
	 */
	protected function compile()
	{
		$objImage = new \File($this->singleSRC);
		$arrMeta = $this->arrMeta[$objImage->basename];

		if ($arrMeta[0] == '')
		{
			$arrMeta[0] = str_replace('_', ' ', preg_replace('/^[0-9]+_/', '', $objImage->filename));
		}

		$this->arrData['alt'] = specialchars($arrMeta[0]);
		$this->arrData['size'] = $this->imgSize;
		$this->arrData['fullsize'] = $this->fullsize;

		if (!empty($this->jumpTo))
		{
			$this->Template->href = '{{link_url::' . $this->jumpTo . '}}';
		}

		$this->addImageToTemplate($this->Template, $this->arrData);
	}
}
