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
        $json_a=isset($json_a)?$json_a:new stdclass();
        $json_a->status="true";
        $json_a->cities=$cities;
        $json=json_encode($json_a);
        print_r($json);
        //var_dump($cities);
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
                $json_a=isset($json_a)?$json_a:new stdclass();
                $json_a->status="true";
                $json_a->data=$data;
                $json=json_encode($json_a);
                print_r($json);
                //var_dump($data);
               echo "Add Done .";}}
             else {
                $json_a=isset($json_a)?$json_a:new stdclass();
                $json_a->status="false";
                echo $json=json_encode($json_a);
                 echo "Failed to add .";
             
        }
        }
    


    public function updateCity(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=$_GET['id'];
            $name=$_POST['name'];
            $country=$_POST['country'];
            $data = [
                'name' =>$name ,
                'country' => $country ,
            ];

            if ($this->model->updateCity($id, $data)) {
                $json_a=isset($json_a)?$json_a:new stdclass();
                $json_a->status="true";
                $json_a->data=$data;
                $json=json_encode($json_a);
                print_r($json);
                echo "City updated successfully!";}
            }
             else {
                $json_a=isset($json_a)?$json_a:new stdclass();
                $json_a->status="false";
                echo $json=json_encode($json_a);
                 echo "Failed to update City.";
                 }
      
        }

    public function deleteCity(){
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=$_GET['id'];
            if ($this->model->deleteCity($id)) {
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
                echo $json=json_encode($json_a);
                 echo "Failed to Delete City.";
             }
            }

 }


?>
