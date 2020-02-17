<?php

class Auth_model extends CI_Model 
{
    public function addAdmin($token)
    {
        $email=$this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'images' => 'default.png',
            'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
            'role_id' => 1,
            'is_active' => 0,
            'date_created' => time()
        ];

        
        $user_token=[
            'email'=>$email,
            'token'=>$token,
            'date_created'=>time()
        ];

        $this->db->insert('users', $data);
        $this->db->insert('users_token', $user_token);

        
    }


    public function getAllNumRow()
    {
        return $this->db->get_where('users',['role_id'=>2])->num_rows();
    }
}

 