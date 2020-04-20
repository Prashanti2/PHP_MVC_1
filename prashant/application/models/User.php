<?php 

class user extends database {
    public function getData(){

        if($this->Query("SELECT * FROM fruit")){

            $data = $this->fetchAll();
              return $data;
        }

    }
    public function addFruit($fruit){

        if($this->Query("INSERT INTO fruit(name, price, quality) VALUES (?,?,?)", $fruit)){
            return true;
        }

    }
    public function deleteFruit($id, $userId){

        if($this->Query("DELETE FROM fruit WHERE id = ?", [$id])){
            return true;
        }

    }

}

?>