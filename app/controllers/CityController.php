<?php
// namespace control_city;
// use model_city;

class CityController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function index() {
        $cities = $this->model->getCities();
        var_dump($cities);
         echo "Done";
    }

    public function addCity() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name=$_POST['name'];
            $country=$_POST['country'];
            $data = [
                'name' =>$name ,
                'country' => $country ,
            ];
             
            if ($this->model->addCity($data)) {
               var_dump($data);
               echo "Add Done .";}
             else {
                 echo "Failed to add .";
             
        }
        }
    }


    public function updateCity($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name=$_POST['name'];
            $country=$_POST['country'];
            $data = [
                'name' =>$name ,
                'country' => $country ,
            ];

            if ($this->model->updateCity($id, $data)) {
                echo "City updated successfully!";}
             else {
                 echo "Failed to update City.";
                 }
      
        }}

    public function deleteCity($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=$_POST['id'];}
            if ($this->model->deleteCity($id)) {
                echo "Delete done";
            } else {
                 echo "Failed to Delete City.";
             }
        }

 }


?>
