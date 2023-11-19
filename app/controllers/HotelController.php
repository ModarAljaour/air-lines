<?php
// namespace control_hotel;
// use model_hotel;

class HotelController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    public function index() {
        $hotels = $this->model->getHotels();
        $json_a=isset($json_a)?$json_a:new stdclass();
        $json_a->status="true";
        $json_a->hotels=$hotels;
        $json=json_encode($json_a);
        print_r($json);
       // var_dump($hotels);
         echo "Done ";
    }

    public function addHotel() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $city_id=$_POST['city_id'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $data = [
            'city_id' =>$city_id,
            'name' =>$name ,
            'phone' => $phone ,
            
        ];

        if ($this->model->addHotel($data)) {
            $json_a=isset($json_a)?$json_a:new stdclass();
            $json_a->status="true";
            $json_a->data=$data;
            $json=json_encode($json_a);
            print_r($json);
           echo "Done .";
         }}
         else
         {
            $json_a=isset($json_a)?$json_a:new stdclass();
            $json_a->status="false";
            echo $json=json_encode($json_a);
         }
    
}


public function updateHotel(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //$id=$_POST['id'];
        $city_id=$_POST['city_id'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $data = [
            'city_id' =>$city_id,
            'name' =>$name ,
            'phone' => $phone ,
          
        ];

        if ($this->model->updateHotel($_GET['id'], $data)) {
            $json_a=isset($json_a)?$json_a:new stdclass();
            $json_a->status="true";
            $json_a->data=$data;
            $json=json_encode($json_a);
            print_r($json);
            echo "Hotel updated successfully!";}}
           else {
            
            $json_a=isset($json_a)?$json_a:new stdclass();
            $json_a->status="false";
            echo $json=json_encode($json_a);
             echo "Failed to update Hotel.";
         }

    }

public function deleteHotel(){
   // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id=$_GET['id'];
        if ($this->model->deleteHotel($id)) {
            $json_a=isset($json_a)?$json_a:new stdclass();
            $json_a->status="true";
            $json_a->id=$id;
            $json=json_encode($json_a);
            print_r($json);
            echo "Delete done";
    }
    else {
            
        $json_a=isset($json_a)?$json_a:new stdclass();
        $json_a->status="false";
        echo $json=json_encode($json_a);}



}
}
?>


    
    
    
    