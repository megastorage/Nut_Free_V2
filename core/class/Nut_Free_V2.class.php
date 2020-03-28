<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class Nut_Free_V2 extends eqLogic {
    /*     * *************************Attributs****************************** */



    /*     * ***********************Methode static*************************** */
public static $_infosMap = array(
		//on cree un tableau contenant la liste des infos a traiter 
		//chaque info a un sous tableau avec les parametres 
		// dans postSave() il faut le parcourir pour creer les cmd
// 		array(
// 			'name' =>'Nom de l\'equipement infol'
// 			'logicalId'=>'Id de l\'quipement',
// 			'type'=>'info', //on peu ne  pas specifie cette valeur et alors dans la boucle mettre celle par default
// 			'subType'=>'string', //idem
// 			'order' => 1, // ici on pourrai utiliser l'index du tableau et l'ordre serait le meme que ce tableau
// 			'template_dashboard'=> 'line'
//			'cmd' => 'ups.status', //commande a executer
// 		),
	
		array(
			'name' =>'Marque_Model',
			'logicalId'=>'Marque',
			'template_dashboard'=> 'line',
			'subtype'=>'string',
			'cmd'=>'device.mfr',
		),
		array(
			'name' =>'Model',
			'logicalId'=>'Model',
			'subtype'=>'string',
			'cmd'=>'device.model',
		),
		array(
			'name' =>'Serial',
			'logicalId'=>'ups_serial',
			'cmd' => 'ups.serial',
			'subtype'=>'string',
		),
		array(
			'name' =>'UPS MODE',
			'logicalId'=>'ups_line',
			'cmd' => 'ups.status',
			'subtype'=>'string',
		),
		array(
			'name' =>'Tension en entrée',
			'logicalId'=>'input_volt',
			'cmd'=>'input.voltage',
			'unite'=>'V',
		),
		array(
			'name' =>'Fréquence en entrée',
			'logicalId'=>'input_freq',
			'cmd'=>'input.frequency',
			'unite'=>'Hz',
		),
		array(
			'name' =>'Tension en sortie',
			'logicalId'=>'output_volt',
			'cmd'=>'output.voltage',
			'unite'=>'V',
		),
		array(
			'name' =>'Fréquence en sortie',
			'logicalId'=>'output_freq',
			'cmd'=>'output.frequency',
			'unite'=>'Hz',
		),
		array(
			'name' =>'Puissance en sortie',
			'logicalId'=>'output_power',
			'cmd'=>'ups.power',
			'unite'=>'W',
		),
		array(
			'name' =>'Puissance en sortie réel',
			'logicalId'=>'output_real_power',
			'cmd'=>'ups.realpower',
			'unite'=>'W',
		),
		array(
			'name' =>'Niveau de charge batterie',
			'logicalId'=>'batt_charge',
			'cmd'=>'battery.charge',
			'unite'=>'%',
		),
		array(
			'name' =>'Tension de la batterie',
			'logicalId'=>'batt_volt',
			'cmd'=>'battery.voltage',
			'unite'=>'V',
		),
		array(
		  	'name'      => 'Température de la batterie',
		  	'logicalId' => 'batt_temp',
		  	'cmd'       => 'battery.temperature',
		  	'unite'     => '°C',
		),
		array(
			'name' =>'Charge onduleur',
			'logicalId'=>'ups_load',
			'cmd'=>'ups.load',
			'unite'=>'%',
		),
		array(
			'name' =>'Temps restant sur batterie en s',
			'logicalId'=>'batt_runtime',
			'cmd'=>'battery.runtime',
			'unite'=>'s',
		),
     		 array(
			'name' =>'Temps restant sur batterie en min',
			'logicalId'=>'batt_runtime_min',
			'cmd'=>'battery.runtime',
			'unite'=>'min',
		),
		array(
			'name' =>'Temps restant avant arrêt en s',
			'logicalId'=>'timer_shutdown',
			'cmd'=>'ups.timer.shutdown',
			'unite'=>'s',
		),
      		array(
			'name' =>'Temps restant avant arrêt en min',
			'logicalId'=>'timer_shutdown_min',
			'cmd'=>'ups.timer.shutdown',
			'unite'=>'min',
		),
		array(
			'name' =>'Beeper',
			'logicalId'=>'beeper_stat',
			'subtype'=>'string',
			'cmd'=>'ups.beeper.status',
		),
		array(
			'name' =>'SSH OPTION',
			'logicalId'=>'ssh_op',
		),
		array(
			'name' =>'Statut cnx SSH Scénario',
			'logicalId'=>'cnx_ssh',
			'subtype'=>'string',
		),
	);

    
    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom */
      public static function cron() {

      }
     foreach (eqLogic::byType('Nut_Free_V2') as $Nut_Free_V2) {
			$Nut_Free_V2->getInformations();
			$mc = cache::byKey('$Nut_Free_V2Widgetmobile' . $Nut_Free_V2->getId());
			$mc->remove();
			$mc = cache::byKey('$Nut_Free_V2Widgetdashboard' . $Nut_Free_V2->getId());
			$mc->remove();
			$Nut_Free_V2->toHtml('mobile');
			$Nut_Free_V2->toHtml('dashboard');
			$Nut_Free_V2->refreshWidget();
		}


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {

      }
     */



    /*     * *********************Méthodes d'instance************************* */

    public function preInsert() {
        
    }

    public function postInsert() {
        
    }

    public function preSave() {
        
    }

    public function postSave() {
        
    }

    public function preUpdate() {
        
    }

    public function postUpdate() {
        
    }

    public function preRemove() {
        
    }

    public function postRemove() {
        
    }

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après modification de variable de configuration
    public static function postConfig_<Variable>() {
    }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant modification de variable de configuration
    public static function preConfig_<Variable>() {
    }
     */

    /*     * **********************Getteur Setteur*************************** */
}

class templateCmd extends cmd {
    /*     * *************************Attributs****************************** */


    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

    public function execute($_options = array()) {
        
    }

    /*     * **********************Getteur Setteur*************************** */
}


