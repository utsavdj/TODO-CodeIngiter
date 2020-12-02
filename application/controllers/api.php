<?php

class Api extends CI_Controller{

    // -----------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
    }

    // -----------------------------------------------------------------------------------------------------------------

    private function _require_login(){
        if($this->session->userdata('user_id') == false){
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => 'You are not authorized.'
            ]));
            return false;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function login(){
        $usename = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->user_model->get([
            'username' => $usename,
            'password' => hash('sha512', $password . SALT)
        ]);

        $this->output->set_content_type('application_json');
        if($result) {
            $this->session->set_userdata([
                'user_id' => $result[0]['user_id']
            ]);
            $this->output->set_output(json_encode([
                'result' => 1
            ]));
            return false;
        }

        $this->output->set_output(json_encode([
            'result' => 0
        ]));
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function register(){
        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[16]|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[4]|max_length[16]|matches[password]');

        if($this->form_validation->run() == false){
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => $this->form_validation->error_array()
            ]));
            return false;
        }

        $usename = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        $user_id = $this->user_model->insert([
            'username' => $usename,
            'email' => $email,
            'password' => hash('sha512', $password . SALT),
        ]);


        if($user_id) {
            $this->session->set_userdata([
                'user_id' => $user_id
            ]);
            $this->output->set_output(json_encode([
                'result' => 1
            ]));
            return false;
        }

        $this->output->set_output(json_encode([
            'result' => 0,
            'error' => 'User not created'
        ]));
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function get_todo($id = null){
        $this->_require_login();
        if($id != null){
            $this->db->where([
                'todo_id' => $id,
                'user_id' => $this->session->userdata('user_id')
            ]);
        }else{
            $this->db->where('user_id', $this->session->userdata('user_id'));
        }

        $query = $this->db->get('todo');
        $result = $query->result();
        $this->output->set_output(json_encode($result));
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function create_todo(){
        $this->_require_login();
        $this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');
        if($this->form_validation->run() == false){
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => $this->form_validation->error_array()
            ]));
            return false;
        }

        $result = $this->db->insert('todo', [
            'content' => $this->input->post('content'),
            'user_id' => $this->session->userdata('user_id')
        ]);

        if($result){
//            Get the freshest entry for the DOM
            $query = $this->db->get_where('todo', ['todo_id' => $this->db->insert_id()]);

            $this->output->set_output(json_encode([
                'result' => 1,
                'data' => $query->result()
            ]));
            return false;
        }

        $this->output->set_output(json_encode([
            'result' => 0,
            'error' => 'Could not insert record'
        ]));
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function update_todo(){
        $this->_require_login();
        $todo_id = $this->input->post('todo_id');
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function delete_todo(){
        $this->_require_login();
        $result = $this->db->delete('todo', [
            'todo_id' => $this->input->post('todo_id'),
            'user_id' => $this->session->userdata('user_id')
        ]);

        if($result){
            $this->output->set_output(json_encode([ 'result' => 1 ]));
            return false;
        }

        $this->output->set_output(json_encode([
            'result' => 0,
            'message' => 'Could not delete.'
        ]));
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function get_note(){
        $this->_require_login();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function create_note(){
        $this->_require_login();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function update_note(){
        $this->_require_login();
        $note_id = $this->input->post('note_id');
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function delete_note(){
        $this->_require_login();
        $note_id = $this->input->post('note_id');
    }

    // -----------------------------------------------------------------------------------------------------------------
}