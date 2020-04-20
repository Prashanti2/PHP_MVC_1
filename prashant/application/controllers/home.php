<?php
    class home extends Controller {
        public function __construct(){
            $this->userModel = $this->model('user');
        }

        public function index(){
            $data = $this->userModel->getData();
            $this -> view('profile', $data);
        }
        public function addObject(){
            $this -> view('addObject');
        }
        public function deleteObject($id){
            echo 'home/test';
        }
        public function editObject($id){


            $data = [

                'data'    => $fruitEdit,
                'nameError' => '',
                'priceError' => '',
                'qualityError' => ''
        
              ];
            $this->view("editFruit", $data);
        }
        public function addFruit(){
            $fruitData = [
      
             'name'           => $this->input('name'),
             'price'          => $this->input('price'),
             'quality'        => $this->input('quality'),
             'nameError'      => '',
             'priceError'     => '',
             'qualityError'   => ''
      
            ];
            if(empty($fruitData['name'])){
                $fruitData['nameError'] = "Name is required";
            }
            if(empty($fruitData['price'])){
            $fruitData['priceError'] = "Price is required";
            }

            if(empty($fruitData['quality'])){
            $fruitData['qualityError'] = "Quality is required";
            }
            if(empty($fruitData['nameError']) && empty($fruitData['priceError']) && empty($fruitData['qualityError'])){
                $data = [$this->input('name'), $fruitData['price'], $fruitData['quality']];
                 if($this->userModel->addFruit($data)){
                        $this-> redirect("public/home/index");
                 }
            }else{
                $this->view("addFruit", $fruitData);
            }
      
        }
        public function updateFruit(){

            $id = $this->input('hiddenId');
            $userId = $this->getSession('userId');
            $fruitEdit = $this->profileModel->edit_data($id, $userId);
            $fruitData = [
      
              'name'           => $this->input('name'),
              'price'          => $this->input('price'),
              'quality'        => $this->input('quality'),
              'data'           => $fruitEdit,
              'hiddenId'       => $this->input('hiddenId'),
              'nameError'      => '',
              'priceError'     => '',
              'qualityError'   => ''
              
       
             ];
       
             if(empty($fruitData['name'])){
               $fruitData['nameError'] = "Name is required";
             }
             if(empty($fruitData['price'])){
               $fruitData['priceError'] = "Price is required";
             }
             if(empty($fruitData['quality'])){
               $fruitData['qualityError'] = "Quality is required";
             }
      
             if(empty($fruitData['nameError']) && empty($fruitData['priceError']) && empty($fruitData['qualityError'])){
             
              $updateData = [$fruitData['name'], $fruitData['price'], $fruitData['quality'], $fruitData['hiddenId'], $userId];
      
              if($this->profileModel->updateFruit($updateData)){
      
                $this->setFlash('fruitUpdated', 'Your fruit record has been updated successfully');
                $this->redirect("profile/index");
      
              }
      
             } else {
              $this->view("edit_fruit", $fruitData);
             }
      
          }
      
          public function delete($id){
            if($this->userModel->deleteFruit($id, $userId)){
              $this->redirect('public/home/index');
            }
        }
    }
?>