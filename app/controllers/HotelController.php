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
        var_dump($hotels);
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
           echo "Done .";
         }
    }
}


public function updateHotel($id){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id=$_POST['id'];
        $city_id=$_POST['city_id'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $data = [
            'city_id' =>$city_id,
            'name' =>$name ,
            'phone' => $phone ,
          
        ];

        if ($this->model->updateHotel($id, $data)) {
            echo "Hotel updated successfully!";}
           else {
             echo "Failed to update Hotel.";
         }

    }}

public function deleteHotel($id){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id=$_POST['id'];}
        if ($this->model->deleteHotel($id)) {
            echo "Delete done";
    }

}

}
?>


    
    
    
    