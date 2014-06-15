<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Application\Model\Account;
use Application\Model\AccountTable;

use Application\Model\Aspect;
use Application\Model\AspectTable;

use Application\Model\Company;
use Application\Model\CompanyTable;

use Application\Model\Content;
use Application\Model\ContentTable;

use Application\Model\Credentials;
use Application\Model\CredentialsTable;

use Application\Model\GroupTag;
use Application\Model\GroupTagTable;

use Application\Model\Profile;
use Application\Model\ProfileTable;

use Application\Model\Rating;
use Application\Model\RatingTable;

use Application\Model\Reply;
use Application\Model\ReplyTable;

use Application\Model\Review;
use Application\Model\ReviewTable;

use Application\Model\Tag;
use Application\Model\TagTable;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
        {
            return array(
                'factories' => array(
                    'Application\Model\AccountTable' =>  function($sm) {
                        $tableGateway = $sm->get('AccountTableGateway');
                        $table = new AccountTable($tableGateway);
                        return $table;
                    },
                    'AccountTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Account());
                        return new TableGateway('Account', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\AspectTable' =>  function($sm) {
                        $tableGateway = $sm->get('AspectTableGateway');
                        $table = new AspectTable($tableGateway);
                        return $table;
                    },
                    'AspectTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Aspect());
                        return new TableGateway('Aspect', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\CompanyTable' =>  function($sm) {
                        $tableGateway = $sm->get('CompanyTableGateway');
                        $table = new CompanyTable($tableGateway);
                        return $table;
                    },
                    'CompanyTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Company());
                        return new CompanyTableGateway('', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\ContentTable' =>  function($sm) {
                        $tableGateway = $sm->get('ContentTableGateway');
                        $table = new ContentTable($tableGateway);
                        return $table;
                    },
                    'ContentTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Content());
                        return new TableGateway('Content', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\CredentialsTable' =>  function($sm) {
                        $tableGateway = $sm->get('CredentialsTableGateway');
                        $table = new CredentialsTable($tableGateway);
                        return $table;
                    },
                    'CredentialsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Credentials());
                        return new TableGateway('Credentials', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\GroupTagTable' =>  function($sm) {
                        $tableGateway = $sm->get('GroupTagTableGateway');
                        $table = new GroupTagTable($tableGateway);
                        return $table;
                    },
                    'GroupTagTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new GroupTag());
                        return new TableGateway('GroupTag', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\ProfileTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProfileTableGateway');
                        $table = new ProfileTable($tableGateway);
                        return $table;
                    },
                    'ProfileTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Profile());
                        return new TableGateway('Profile', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\RatingTable' =>  function($sm) {
                        $tableGateway = $sm->get('RatingTableGateway');
                        $table = new RatingTable($tableGateway);
                        return $table;
                    },
                    'RatingTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Rating());
                        return new TableGateway('Rating', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\ReplyTable' =>  function($sm) {
                        $tableGateway = $sm->get('ReplyTableGateway');
                        $table = new ReplyTable($tableGateway);
                        return $table;
                    },
                    'ReplyTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Reply());
                        return new TableGateway('Reply', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\ReviewTable' =>  function($sm) {
                        $tableGateway = $sm->get('ReviewTableGateway');
                        $table = new ReviewTable($tableGateway);
                        return $table;
                    },
                    'ReviewTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Review());
                        return new TableGateway('Review', $dbAdapter, null, $resultSetPrototype);
                    },
                    'Application\Model\TagTable' =>  function($sm) {
                        $tableGateway = $sm->get('TagTableGateway');
                        $table = new TagTable($tableGateway);
                        return $table;
                    },
                    'TagTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Tag());
                        return new TableGateway('Tag', $dbAdapter, null, $resultSetPrototype);
                    },
                ),
            );
        }
}
