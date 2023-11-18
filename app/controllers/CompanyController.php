<?php

namespace CompanyController;

class CompanyController{
    public $company;

    public function __construct($company)
    {
        $this->company = $company;
    }

    public function select()
    {
       return $this->company->getcompanies();
    }

    public function addCompany()
    { if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $company_id=$_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
    
            $data = [
                "id" => "$company_id", 
                "name" => "$name",
                "phone" => "$phone"
            ];
            if ($this->model->addcompany($data)) {
                echo "Company add successfully!" ;
            }
        }
        }
    
    
    public function updateCompany($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
                $company_id=$_POST['id'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $data=array();
                    $data = [
                "company_id" => "$company_id" ,     
                "name" => "$name",
                "phone" => "$phone"
                    ];    
                    if($this->model->editcompany($_GET['id'],$data))
                    {
                        echo "company update successfully!";
                    }
                }
            }
          
    
        public function deletecompany($id){
           
            if($this->model->deletecompany($_GET['id']))
            {
                echo "company delete successfully";
            }}
     
 }

