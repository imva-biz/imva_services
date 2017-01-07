<?php

/**
 * imva.biz Module Services: Main
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
 * (c) 2012-2016 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-17/1/7
 *
 */

class imva_services_main extends oxUbase
{



	/**
	 * Build No.
	 * Check this number in modules to make sure the version of the imva service provider is capable of the functions to be used.
	 * 
	 * @return int
	 */
	public $build = 20170107;


    /**
     * Build mode no.
     *
     * @return int
     */
    protected $_workingBuidNo = null;
	
	
	
	/**
	 * Initialize. Compares the build number, if given.
	 * To be extended later...
	 * 
	 * @param int
	 */
	public function requestBuild($iBuildNo = null)
	{
        if ($iBuildNo > $this->build){
			$this->_logToFile(
                'SERVICE VERSION OUTDATED (IS '.$this->build.', AT LEAST '
                    .$iBuildNo.' REQUIRED), imva.biz Core Module.',
                1,
                __LINE__
            );
		}
		else{
            $this->_workingBuidNo = $iBuildNo;
        }
	}
	
	
	
	/**
	 * _generateSecretKey
	 * On db setup, this function generates a secret key to be used for authentication. Perfect for lazy users. ;-)
	 *
	 * @return string
	 */
	public function generateSecretKey($length)
	{
		srand ((double)microtime()*1000000);

        return substr(
            md5(rand()),
            0,
            $length
        );
	}
	
	
	
	/**
	 * Action getter, e.g. for usage with forms.
	 * Returns the content of "action".
	 *
	 * @return string
	 */
	public function getAction(){
		if ($this->req('action') || $this->req('action') != ''){
			return $this->req('action');
		}
		else{
			return false;
		}
	}
	
	
	
	/**
	 * Param getter
	 * Returns the content of a named POST, REQUEST or GET parameter.
	 * 
	 * @param string
	 * @return string
	 */
	public function req($sParamName)
	{
		return $this->getConfig()->getRequestParameter($sParamName);
	}
	
	
	
	/**
	 * Read config data for imva.biz modules
	 * Parameters:	-	Internal module name
	 * 				-	Parameter
	 *
	 * @param string
	 * @param string
	 * @return string
	 */
	function readImvaConfig($sModuleName = null, $sParam = null)
	{
		if ($sModuleName and $sParam)
		{
			$sSqlRequest = 'SELECT value FROM imva_config WHERE module_name = "'.$sModuleName.'" AND param = "'.$sParam.'"';
			return oxDb::getDb(true)->getone($sSqlRequest);
		}
		elseif ($sModuleName and !$sParam){
			$this->log($sModuleName,'readImvaConfig','EMPTY PARAM','','','');
			return false;
		}
		else{
			$this->log('UNKNOWN','readImvaConfig','EMPTY PARAM','','','');
		}
	}
	
	
	
	/**
	 * logger
	 * Writes actions to db
	 *
	 * @return null
	 */
	public function log($sModuleName,$sAction,$d1 = '',$d2 = '',$d3 = '',$d4 = '',$p = ''){
		$sSqlRequest = "INSERT INTO imva_oxidmodules (mod_name, action, data1, data2, data3, data4, param, timestamp) VALUES ('".$sModuleName."', '".$sAction."', '".$d1."', '".$d2."', '".$d3."', '".$d4."', '".$p."', CURRENT_TIMESTAMP)";
		oxDb::getDb(true)->execute($sSqlRequest);
	}
	
	
	
	/**
	 * Returns the root directory of the virtual host
	 *
	 * @return string
	 */
	public function getRootDirectory()
	{
		$sRootDir = $_SERVER['PHP_SELF'];
		$sRootDir = dirname($sRootDir);
		if ($sRootDir != '/'){
			$sRootDir = $sRootDir.'/';
		}
		return $sRootDir;
	}
	
	
	
	/**
	 * Get Module Version by Module ID
	 * 
	 * @param string
	 * @return string
	 */
	public function getModuleVersion($sModuleId = null)
	{
		if ($sModuleId) {
            $oTmpModuleObj = oxNew('oxmodule');
            $oTmpModuleObj->load($sModuleId);

            return $oTmpModuleObj->getInfo('version');
        }

        return false;
	}



	/**
     * Log to file (core only)
     *
     * @param string
     * @param int
     * @param int
     */
	private function _logToFile($msg,$no,$prio)
    {
        $Logger = oxNew('imva_services_logger');
        $Logger->log($msg,$no,$prio);
    }
}
