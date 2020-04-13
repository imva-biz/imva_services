<?php

/**
 * imva.biz Module Services
 * 
 * 
 * 
 * For redistribution in the provicer's network only.
 *
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
 *
 *
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 *
 * You are free to use this software and to modify it in order to fit your requirements.
 *
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 *
 * By applying and using this software product, you agree to the terms and conditions of use.
 *
 *
 *
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 *
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 *
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 *
 *
 * (EULA-13/7-OS)
 * 
 * 
 *
 * (c) 2013-2020 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 * 
 * 14/1/24-20/3/29
 */

namespace \Imva\OxidServices\Service;

use OxidEsales\Eshop\Core\DatabaseProvider;

class Database extends \OxidEsales\Eshop\Core\Model\MultiLanguageModel
{	

	/** @var string Name of this class */
    protected $_sClassName = 'dbservice';

    /** @var string Table Name */
	protected $_sCoreTable = 'imva_config';

	/**
	 * Construct
	 * 
	 * @param null
	 * @return null
	 */
	public function __construct()
	{
		parent::__construct();
		$this->init($this->_sCoreTable);
	}

	/**
	 * Simply counts appearances of rows with a certain value for a field.
	 * Super-simple mode: have set the table before and just call with a value.
	 *
	 * @param string field
     * @param string value
	 * @return int amount
	 */
	public function countValuedSets($sField,$sValue){
		$oReq = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_NUM)->execute(
            "SELECT COUNT(*) FROM `".$this->sTable."` WHERE `".$sField."` = ?;",
            [$sValue]
        );
		$sRet = $oReq->fields[0];
		
		return $sRet;
	}

	/**
     * Simply counts appearances of rows with a certain value for a preset field.
     * Super-simple mode: have set the table before and just call with a value.
     *
     * @param string field
     * @return int amount
     */
	public function countSets($sValue){
		$oReq = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_NUM)->execute(
            "SELECT COUNT(*) FROM `".$this->_sTable."` WHERE `".$this->_sField."` = ?;",
            [$sValue]
        );
		$sRet = $oReq->fields[0];
		
		return $sRet;
	}
}
