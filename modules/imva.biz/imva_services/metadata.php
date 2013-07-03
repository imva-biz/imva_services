<?php

/**
 * IMVA Services
 *
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
 * (c) 2012-2013 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-7/3
 * V 0.1.2.1
 *
 */

$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
	'id'			=> 'imva_services',
	'title'			=> '<img src="../modules/imva.biz/imva_services/out/src/imva-Logo-12.png" alt=".iI" title="imva.biz" /> Module Services (Build 20130703)',
	'description'	=> array(
		'en'	=>	'<p>imva.biz Services for modules. Provides several functionalities that are used by other modules of the manufacturer.</p>',
		'de'	=>	'<p>imva.biz-Dienste f&uuml;r Module. Stellt eine Reihe von Funktionalit&auml;ten bereit, auf die andere Module des Herstellers zugreifen k&ouml;nnen.</p>',
	),
	'thumbnail'		=> 'out/src/imva-Logo-90.png',
	'version'		=> '0.1.2.1',
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