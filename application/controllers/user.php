<?php

class User extends CI_Controller {

    public function get($user_id){
        $data = $this->user_model->get($user_id);
        print_r($data);
    }

    public function insert($data){
        $result = $this->user_model->insert();
    }

    public function update(){
        $result = $this->user_model->update();
    }

    public function delete($user_id){
        $result = $this->user_model->delete($user_id);
    }
}