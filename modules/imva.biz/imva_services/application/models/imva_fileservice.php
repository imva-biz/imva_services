<?php

/**
 * IMVA Module Services: File Service
 * 
 * Redistribution permitted.
 * 
 * Weitergabe verboten.
 * 
 *
 * This Software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is open-source, but not freeware.
 *
 * Any unauthorized use of this software product - usage without a valid license,
 * modification, copying, redistribution, transmission is a violation of the license agreement
 * and will be prosecuted by civil and criminal law.
 * 
 * By applying and using this software product, you agree to the terms and condition of usage and
 * furthermore agree, not to share information, source codes, technologies, credentials and addresses
 * of any kind.
 * 
 *  
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen und wahren Stillschweigen über die Ihnen zugänglich gemachten
 * Informationen, Quellcodes, Technologien, Zugangsdaten und Adressen jeglicher Art.
 * Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach sich ziehen.
 * 
 * (c) 2013 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 * 
 * 13/6/28-7/15
 * V 0.2
 * 
 */

class imva_fileservice extends oxUbase
{
	/**
	 * File path
	 * @return string
	 */
	private $_sPath = null;
	
	
	
	/**
	 * Global file object
	 * @return object
	 */
	private $_oFile = null;
	
	
	
	/**
	 * Load: Prepare the instance
	 */
	public function load($sPath)
	{
		$this->_sPath = $sPath;
		$this->_oFile = fopen($this->_sPath,'w+');
		
		if (!$this->_oFile){
			echo '<span class="msg err">Error creating File Object from Path: '.$sPath.' (IMVA_FILESERVICE, '.__LINE__.')</span>';
		}
	}
	
	
	
	/**
	 * Write file
	 * 
	 * @param string $sContent
	 * @param object $sPath
	 */
	public function writeFile($sContent)
	{
		fwrite($this->_oFile,$sContent);
	}
	
	
	
	/**
	 * Destruct
	 * Close file handle.
	 * 
	 * @param null
	 * @return null
	 */
	public function __destruct()
	{
		fclose($this->_oFile);
	}
}