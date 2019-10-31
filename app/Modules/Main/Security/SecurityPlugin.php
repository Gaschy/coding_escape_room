<?php
namespace CodingEscapeRoom\Modules\Main\Security;

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Plugin {

    /**
     * Returns an existing or new access control list
     *
     * @return AclList
     */
    public function getAcl() {
        $this->persistent->destroy();
        if (! isset($this->persistent->acl_coding_escape_room)) {
            $acl = new AclList();

            $acl->setDefaultAction(Acl::DENY);

            // Register rollen
            $roles = array (
                new Role('Superadmin'),
                new Role('Admin'),
                new Role("User"),
                new Role('Guests'),
            );
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            // Private area resources
            $privateResources = array (

            );

            foreach ($privateResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            // Public area resources
            $publicResources = array (
                'index' => array (
                    'index',
                    "start"
                ),
                "cone" => array(
                    "index",
                    "complete"
                ),
                "ctwo" => array(
                    "index",
                    "complete"
                ),
                "cthree" => array(
                    "index",
                    "complete"
                ),
                "cfour" => array(
                    "index",
                    "complete"
                ),
                "cfive" => array(
                    "index",
                    "complete"
                ),
                "complete" => array(
                    "index"
                ),
                'errors' => array(
                    'show404',
                    'show401',
                    'show401AJAX',
                    'show500',
                    'show500AJAX'
                )
            );

            foreach ($publicResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            // Alle rolle bekommen Zugriff auf die public-Ressourcen
            foreach ($roles as $role) {
                foreach ($publicResources as $resource => $actions) {
                    foreach ($actions as $action) {
                        $acl->allow($role->getName(), $resource, $action);
                    }
                }
            }

            // Alle eingeloggten User bekommen Rechte für die Private-Ressourcen
            foreach ($privateResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('Admin', $resource, $action);
                    $acl->allow('Superadmin', $resource, $action);
                }
            }

            // The acl is stored in session, APC would be useful here too
            $this->persistent->acl_coding_escape_room = $acl;
        }
        return $this->persistent->acl_coding_escape_room;
    }

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher) : bool {
        $role = 'Guests';

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            //AJAX - Not Allowed
            if($this->request->isAjax()) {
                $dispatcher->forward(array(
                    'controller' => 'errors',
                    'action' => 'show401AJAX'
                ));
            } else {
                $dispatcher->forward(array (
                    'controller' => 'errors',
                    'action' => 'show401'
                ));
                return false;
            }
        }

        // TODO Zusätzliche Rechte abfragen .. z.B. Rechte die in der Datenbank hinterlegt sind --> Nur User XY hat Zugriff auf Ressource XY
        return true;
    }

    // TODO Zusätliche Methoden um Rechte abzufragen
}
