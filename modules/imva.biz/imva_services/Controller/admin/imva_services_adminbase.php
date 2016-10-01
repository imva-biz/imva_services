<?php

/**
 * imva.biz Core Module with Services
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
 * (c) 2013-2016 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 14/1/23-16/10/1
 * v 0.5.1
 *
 */



class imva_services_adminbase extends oxAdminView
{



    /** @var int Service Build */
    protected $_requiredServiceBuild = 20161001;



    /** @var string Template. */
    protected $_sThisTemplate = 'imva_services_admin.tpl';



    /** @var imva_service_main  */
	public $coreSvc = null;



    /** @var string Module ID  */
    public $sModuleId = 'imva_services';
	
	
	
	/**
	 * Initialize
	 *
	 * @return null
	 */
	public function init(){
	    parent::init();

		// Prepare imva.biz Module Service
		$this->getCoreModule();
	}




    /**
     * Core module getter.
     *
     * @return imva_services_main
     */
    public function getCoreModule(){
        if ($this->_coreSvc === null) {
            $this->_coreSvc = oxNew('imva_services_main');
            $this->_coreSvc->requestBuild($this->_requiredServiceBuild);
        }

        return $this->_coreSvc;
    }



    /**
     * Template var. getter for module version.
     *
     * @return string
     */
    public function getMdlVersion($moduleId = null)
    {
        if (!$moduleId){
            $moduleId = $this->sModuleId;
        }

        $version = $this->getCoreModule()->getModuleVersion($moduleId);

        if ($moduleId == 'imva_services'){
            $version .= ' Build '.$this->getBuild();
        }
        else{
            $version .= ' with imva.biz
            <a href="https://imva.biz/oxid-services/oxid-module/module-services/"
            target="_blank">Module Services</a>'
                .' v'.$this->getCoreModule()->getModuleVersion('imva_services')
                .' Build '.$this->getBuild();
        }

        return $version;
    }



    /**
     * Template var. getter for build number
     *
     * @return int
     */
    public function getBuild()
    {
        return $this->getCoreModule()->build;
    }
}
