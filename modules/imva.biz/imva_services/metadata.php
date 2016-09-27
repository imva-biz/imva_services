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
 * (c) 2012-2016 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-16/9/21
 * V 0.4
 *
 */

$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = [
	'id'			=> 'imva_services',
	'title'			=>  [
	    'de'    =>  '<img src="../modules/imva.biz/imva_services/out/img/imva-Logo-12.png" alt=".iI" title="imva.biz" />
    		imva.biz-Kernmodul',
        'en'    =>  '<img src="../modules/imva.biz/imva_services/out/img/imva-Logo-12.png" alt=".iI" title="imva.biz" />
    		imva.biz Core module',
    ],
	'description'	=> array(
		'en'	=>	'<p>imva.biz Services for modules. Provides several functionalities that are used by other modules of the manufacturer.</p>',
		'de'	=>	'<p>imva.biz-Dienste f&uuml;r Module. Stellt eine Reihe von Funktionalit&auml;ten bereit, auf die andere Module des Herstellers zugreifen k&ouml;nnen.<br />
					<a href="http://imva.biz/oxid/module/module_services" style="color:#06c; font-weight:bold;">Informationen &uuml;ber diese Erweiterung</a></p>',
	),
	'thumbnail'		=> 'out/img/imva-Logo-90.png',
	'version'		=> '0.5.0',
	'author'		=> 'Johannes Ackermann',
	'url'			=> 'https://imva.biz',
	'email' 		=> 'imva@imva.biz',
	'extend'		=> [
		'oxviewconfig'              =>	'imva.biz/imva_services/core/imva_services_oxviewconfig',

        // Extended models
        'oxarticle'		            =>	'imva.biz/imva_services/Model/imva_services_oxarticle',
	],
	'files' => [
		// Installer
        'imva_services_setup'       =>  'imva.biz/imva_services/Controller/imva_services_setup.php',

	    // Module cmp.
	    'imva_services_main'        =>	'imva.biz/imva_services/Model/imva_services_main.php',
		'imva_services_config'      =>	'imva.biz/imva_services/Model/imva_services_config.php',
		'imva_services_fileservice'	=>	'imva.biz/imva_services/Model/imva_services_fileservice.php',
        'imva_services_dbservice'	=>	'imva.biz/imva_services/Model/imva_services_dbservice.php',
        'imva_services_logger'	    =>	'imva.biz/imva_services/Model/imva_services_logger.php',

        // Admin View Controller
        'imva_services_adminbase'	=>	'imva.biz/imva_services/Controller/admin/imva_services_adminbase.php',
        'imva_services_admin'		=>	'imva.biz/imva_services/Controller/admin/imva_services_admin.php',
	],
    'templates' => [
        'imva_services_admin.tpl'   =>	'imva.biz/imva_services/View/admin/tpl/imva_services_admin.tpl',
    ],
    'blocks'	=>	[
        [
            'template' => 'imva_services_admin.tpl',
            'block'    => 'imva_header',
            'file'     => 'View/blocks/imva_header.tpl'
        ],
        [
            'template' => 'imva_services_admin.tpl',
            'block'    => 'imva_footer',
            'file'     => 'View/blocks/imva_footer.tpl'
        ],
    ],
    'settings'  =>  [
        [
            'group' =>  'main',
            'name'  =>  'imva_services_logger_level',
            'type'  =>  'select',
            'value' =>  '0',
            'constraints'   => '0|1|2|3|4',
            'position'  =>  1
        ],
    ],
];
