<?php

/**
 * imva.biz Module Services: File Service
 * 
 *
 *
 * For redistribution in the provicer's network only.
 *
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 * You are free to use this software and to modify it in order to fit your requirements.
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 * By applying and using this software product, you agree to the terms and conditions of use.
 * 
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 * 
 * (EULA-13/7-OS)
 *
 * (c) 2012-2020 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-20/3/29
 */

namespace Imva\OxidServices\Service;

class File
{

    /**
	 * File path
     *
	 * @return string
	 */
	private $_sPath = null;

	/**
	 * Global file object
     *
	 * @return object
	 */
	private $_oFile = null;

	/**
	 * Load: Prepare the instance
     *
     * @param string Path to file.
     * @return boolean
	 */
	public function load($path)
	{
		$this->_sPath = $path;
		$this->_oFile = fopen(
		    $this->_sPath,
            'w+'
        );
		
		if (!$this->getFile()){
			echo '<span class="msg err">Error creating File Object from Path: '
                .$path.' (IMVA_SERVICES_FILESERVICE, '.__LINE__.')</span>';
            return false;
		}
	}

    /**
     * File stream getter.
     *
     * @return stream|boolean
     */
	public function getFile()
    {
        if (!$this->_oFile){
            return $this->_oFile;
        }

        return false;
    }

    /**
	 * Write file
	 * 
	 * @param string $sContent
	 * @param object $sPath
	 */
	public function writeFile($content)
	{
		fwrite(
            $this->getFile(),
            $content
        );
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
		fclose($this->getFile());
	}
}
