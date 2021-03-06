<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Room;
use app\models\Reservation;
use app\models\Customer;


class RoomsController extends Controller
{


    public function actionCreate()
    {
        $model = new Room();
        $modelCanSave = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

$model->fileImage = UploadedFile::getInstance($model, 'fileImage');

if ($model->fileImage) { 
                $model->fileImage->saveAs(Yii::getAlias('@uploadedfilesdir/' . $model->fileImage->baseName . '.' . $model->fileImage->extension));
            } 

            $model->save();
            $modelCanSave = true;
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelCanSave' => $modelCanSave
        ]);
    }


    public function actionIndex()
    {
        $sql = 'SELECT * FROM room ORDER BY id ASC';
        
        $db = Yii::$app->db;
        
        $rooms = $db->createCommand($sql)->queryAll();
        
    // same of
     // $rooms = Yii::$app->db->createCommand($sql)->queryAll();

	
        return $this->render('index', [ 'rooms' => $rooms ]);
    }

	//activerecord ex
	public function actionIndexFiltered()
    {
        $query = Room::find();
        
        $searchFilter = [
            'floor' => ['operator' => '', 'value' => ''],
            'room_number' => ['operator' => '', 'value' => ''],
            'price_per_day' => ['operator' => '', 'value' => ''],
        ];
        
        if(isset($_POST['SearchFilter']))
        {
            $fieldsList = ['floor', 'room_number', 'price_per_day'];
            
            foreach($fieldsList as $field)
            {
                $fieldOperator = $_POST['SearchFilter'][$field]['operator'];
                $fieldValue = $_POST['SearchFilter'][$field]['value'];
                
                $searchFilter[$field] = ['operator' => $fieldOperator, 'value' => $fieldValue];
                
                if( $fieldValue != '' )
                {
                    $query->andWhere([$fieldOperator, $field, $fieldValue]);
                }
            }
        }
        
        $rooms = $query->all();
        
        return $this->render('indexFiltered', [ 'rooms' => $rooms, 'searchFilter' => $searchFilter ]);
        
    }

    //tabelle relazionali
    public function actionLastReservationByRoomId($room_id)
    {
        $room = Room::findOne($room_id);
        
        // equivalent to
        // SELECT * FROM reservation WHERE room_id = $room_id
        $lastReservation = $room->lastReservation;
        
        // next times that we will call $room->reservation, no sql query will be executed.
        
        return $this->render('lastReservationByRoomId', ['room' => $room, 'lastReservation' => $lastReservation]);
    }

	//actionLastReservationForEveryRoom():

	    public function actionLastReservationForEveryRoom()
	    {
	            $rooms = Room::find()
	            ->with('lastReservation')
	            ->all();
	        
	            return $this->render('lastReservationForEveryRoom', ['rooms' => $rooms]);
	    }

		public function actionIndexWithRelationships()
		    {
		        // 1. Check what parameter of detail has been passed
		        $room_id = Yii::$app->request->get('room_id', null);
		        $reservation_id = Yii::$app->request->get('reservation_id', null);
		        $customer_id = Yii::$app->request->get('customer_id', null);
		        
		        // 2. Fill three models: roomSelected, reservationSelected and customerSelected and
		        //    Fill three arrays of models: rooms, reservations and customers;
		        $roomSelected = null;
		        $reservationSelected = null;
		        $customerSelected = null;
		        
		        if($room_id != null)
		        {
		            $roomSelected = Room::findOne($room_id);
		            
		            $rooms = array($roomSelected);
		            $reservations = $roomSelected->reservations;
		            $customers = $roomSelected->customers;
		        }
		        else if($reservation_id != null)
		        {
		            $reservationSelected = Reservation::findOne($reservation_id);
		            
		            $rooms = array($reservationSelected->room);
		            $reservations = array($reservationSelected);
		            $customers = array($reservationSelected->customer);
		        }
		        else if($customer_id != null)
		        {
		            $customerSelected = Customer::findOne($customer_id);
		            
		            $rooms = $customerSelected->rooms;
		            $reservations = $customerSelected->reservations;
		            $customers = array($customerSelected);
		        }
		        else
		        {
		            $rooms = Room::find()->all();
		            $reservations = Reservation::find()->all();
		            $customers = Customer::find()->all();
		        }
		        return $this->render('indexWithRelationships', ['roomSelected' => $roomSelected, 'reservationSelected' => $reservationSelected, 'customerSelected' => $customerSelected, 'rooms' => $rooms, 'reservations' => $reservations, 'customers' => $customers]);
    }

}