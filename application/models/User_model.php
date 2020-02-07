<?php 

class User_model extends CI_Model 
{
    public function getAll()
    {       
        return $this->db->get('users');
    }

    public function numAdmin()
    {
        return $this->db->get('users')->num_rows();
    }

    public function delete($id)
    {
        return $this->db->delete('users',['id'=>$id]);
    }
}
