<?php

/**
 * imva.biz Module Services
 * 
 * 
 * 
 * For redistribution in the provicer's network only.
 *
 * Weitergabe au�erhalb des Anbieternetzwerkes verboten.
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
 * Urheberrecht gesch�tzt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 *
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bed�rfnisse anzupassen.
 *
 * Jegliche Modifikation, Vervielf�ltigung, Redistribution, �bertragung zum Zwecke der
 * Weiterentwicklung au�erhalb der Netzwerke des Anbieters ist untersagt und stellt einen Versto�
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der �bernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 *
 *
 * (EULA-13/7-OS)
 * 
 * 
 *
 * (c) 2013-2014 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 * 
 * 14/1/24-2/12
 * V 0.2
 * 
 */

class imva_services_dbservice extends oxI18n
{	

	protected $_sClassName = 'imva_services_dbservice'; // Name of this class
	protected $_sCoreTable = 'imva_config'; // Table Name
    
	
	
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
	 * @param string
	 * @return int
	 */
	public function countValuedSets($sField,$sValue){
		$sSqlRequest = "SELECT COUNT(*) FROM `".$this->sTable."` WHERE `".$sField."` = '.$sValue.'";
		$oReq = oxDb::getDb(true)->execute($sSqlRequest);
		$sRet = $oReq->fields[0];
		
		return $sRet;
	}
	public function countSets($sValue){
		$sSqlRequest = "SELECT COUNT(*) FROM `".$this->_sTable."` WHERE `".$this->_sField."` = '.$sValue.'";
		$oReq = oxDb::getDb(true)->execute($sSqlRequest);
		$sRet = $oReq->fields[0];
		
		return $sRet;
	}
}
