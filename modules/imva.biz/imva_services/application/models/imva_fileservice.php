<?php

/**
 * IMVA Module Services: File Service
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
 * (EULA-13/7)
 * 
 * 
 *
 * (c) 2012-2013 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-7/19
 * V 0.1.2.5
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