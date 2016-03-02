<?php
// 1. specify namespace at the top (in basic application usually app\controllers); 
namespace app\controllers;

// 2. specify 'use' path for used class; use Yii;
use yii\web\Controller;

// 3. controller class must extend yii\web\Controller class; // This line is equivalent to
// class NewsController extends yii\web\Controller

class NewsController extends Controller
{

// 4. actions are handled from controller functions whose name starts with 'action' and the first letter of each word is uppercase;
	public function actionIndex() {
		echo "this is my first controller";
	} 

//5 crea una azione per gestire items

// public function actionItemsList()
//   { 
// 		return $this->render('itemsList');
//   }

// //6 sposto qui i dati

	// public function actionItemsList() {
	// 	$newsList = [
	// 	[ 'title'=> 'Camper del giorno', 'date' => '2016-07-28' ],
	// 	[ 'title' => 'Camping del secolo', 'date' => '2016-09-01' ],
	// 	[ 'title' => 'Regalo MotorHome', 'date' => '2016-07-20' ] 

	// 	];
	// 	return $this->render('itemsList', ['newsList' => $newsList]); 

	// }




//7 sposto i dati in una funzione del controller
	public function dataItems() {
		$newsList = [
		[ 'title'=> 'Camper del giorno', 'date' => '2016-07-28' ],
		[ 'title' => 'Camping del secolo', 'date' => '2016-09-01' ],
		[ 'title' => 'Regalo MotorHome', 'date' => '2016-07-20' ] 
		];
		return $newsList;
	}
	public function actionItemsList() {
		$newsList = $this->dataItems();
		return $this->render('itemsList', ['newsList' => $newsList]); 
	}

// //8creo la funzione actionItemDetail per mostrare il dettaglio
	public function actionItemDetail($title) {

		$newsList = $this->dataItems();
		$item = null; foreach($newsList as $n) {

			if($title == $n['title']) $item = $n; 
		}

		return $this->render('itemDetail', ['item' => $item]); 
	}

	//9 aggiungo l'id alla news e poi lo ricevo nella vista dettaglio
	/*
	public function dataItems() {
	$newsList = [
	[ 'title'=> 'Camper del giorno', 'date' => '2016-07-28' ],
	[ 'title' => 'Camping del secolo', 'date' => '2016-09-01' ],
	[ 'title' => 'Regalo MotorHome', 'date' => '2016-07-20' ] 
	];

	return $newsList; 
	}

	public function actionItemsList() {
	$newsList = $this->dataItems();
	return $this->render('itemsList', ['newsList' => $newsList]); 
	}
	public function actionItemDetail($id)
	{
	$newsList = $this->dataItems();
	$item = null; 
	foreach($newsList as $n) {
	if($id == $n['id']) $item = $n; 
	}
	return $this->render('itemDetail', ['item' => $item]); 
	}
	*/

// fine classe
}



