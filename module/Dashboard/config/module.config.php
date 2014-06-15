<?php
return array(
    	'controllers' => array(
		'invokables' => array(
			'Dashboard\Controller\Dashboard' => 'Dashboard\Controller\DashboardController',
		),
	),

	'router' => array(
		'routes' => array(
			'dashboard' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/dashboard[/]',
					'defaults' => array(
						'controller' => 'Dashboard\Controller\Dashboard',
						'action'     => 'index',
					),
				),
			),
		),
	),

	'view_manager' => array(
		'template_path_stack' => array(
			'dashboard' => __DIR__ . '/../view',
		),
	),
);