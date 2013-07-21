<?php

/**
 * IMVA Module Services
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

$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
	'id'			=> 'imva_services',
	'title'			=> '<img src="../modules/imva.biz/imva_services/out/src/imva-Logo-12.png" alt=".iI" title="imva.biz" />
		Module Services (Build 20130718)',
	'description'	=> array(
		'en'	=>	'<p>imva.biz Services for modules. Provides several functionalities that are used by other modules of the manufacturer.</p>',
		'de'	=>	'<p>imva.biz-Dienste f&uuml;r Module. Stellt eine Reihe von Funktionalit&auml;ten bereit, auf die andere Module des Herstellers zugreifen k&ouml;nnen.<br />
					<a href="http://imva.biz/oxid/module/module_services" style="color:#06c; font-weight:bold;">Informationen &uuml;ber diese Erweiterung</a></p>',
	),
	'thumbnail'		=> 'out/src/imva-Logo-90.png',
	'version'		=> '0.1.2.3',
	'author'		=> 'Johannes Ackermann',
	'url'			=> 'http://imva.biz',
	'email' 		=> 'imva@imva.biz',
	'extend'		=> array(
		'oxviewconfig'				=>	'imva.biz/imva_services/core/imva_oxviewconfig',
	),
	'files' => array(
		'imva_service'				=>	'imva.biz/imva_services/application/models/imva_service.php',
		'imva_fileservice'			=>	'imva.biz/imva_services/application/models/imva_fileservice.php',
	),
);