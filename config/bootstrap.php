<?php
/**
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Routing\DispatcherFactory;
// use Integrateideas\NotificationManager\Event\MailerEventListener;


//Bandwidth Credentials for sms.
// if(!Configure::read('Phone.number')) {
//     Configure::write('Phone.number', '+19104270863');
// }
// if(!Configure::read('Bandwidth.userId')) {
//     Configure::write('Bandwidth.userId', 'u-afrxo6uha7hk2btra3zsx6i');
// }
// if(!Configure::read('Bandwidth.apiToken')) {
//     Configure::write('Bandwidth.apiToken', 't-zy263sjkbc7dv3ho2q5523q');
// }
// if(!Configure::read('Bandwidth.apiSecret')) {
//     Configure::write('Bandwidth.apiSecret', 'cookq6qky7vmrh6353upc7gkn46wkhtztfjfnpy');
// }

if(!Configure::read('ReviewPlugin.CustomerForeignKey')) {
    Configure::write('ReviewPlugin.CustomerForeignKey', 'customer_id');
}

if(!Configure::read('ReviewPlugin.CustomerModel')) {
    Configure::write('ReviewPlugin.CustomerModel', 'Customers');
}

?>