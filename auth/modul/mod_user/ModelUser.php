<?php
    class ModelUser extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        public function get_user()
        {
            return $this->db->get_select("SELECT * FROM users WHERE username='admin'")['data'];
        }
        public function update_user()
        {
            $table                  = 'users';
            $columnsArray           = [
                'password'=> md5($this->post['password']),
            ];
            $where                  = [
                'username'=> 'admin'
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set users
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
    }
    