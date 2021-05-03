<?php
class Admin_model extends CI_Model{
    public $idadmin;
    public $username;
    public $mdp;

    public function __construct($username="", $mdp=""){
        parent::__construct();
        $this->username= $username;
        $this->mdp= $mdp;
    }

    public function insert($admin){
        $sql= "INSERT INTO t_admin (username,mdp) VALUES('%s',sha1('%s'))";
        $sql=sprintf($sql,$admin->username,$admin->mdp);
        try {
            //
            $this->db->query($sql);
            $admin->idadmin=$this->db->insert_id();
            return $admin;
        } catch (\Throwable $th) {
            return "error";
        }
    }
    /**
     * Inscription Admin
     * @return (status,data)
     */
    public function register($admin){
        $data= array(
            "status" => null,
            "data" => null
        );
        $admin_chek=$this->Admin_model->insert($admin);
        if($admin_chek != "error"){
            $data["status"] = "succes";
            $data["data"]=$this->Admin_model->generateToken($admin_chek);
            $this->Admin_model->insertToken($admin_chek->idAdmin,$data["data"]);
        }else{
            $data["status"]= "error";
        }

        return $data;
    }

    /**
     * Se connecter
     * @return (status,data)
     */
    public function connect($username, $mdp){
        //data response
        $data= array(
            "status" => null,
            "data" => null
        );
        $sql= "SELECT * FROM t_admin WHERE username='%s' AND mdp=sha1('%s')";
        $sql=sprintf($sql, $username, $mdp);
        if($result=$this->db->query($sql)){
            if(count($result->result_array())>0){
                foreach($result->result_array() as $row){
                    //
                    $admin=new Admin_model($row["username"],$row["mdp"]);
                    $admin->idadmin=$row["id"];
                    //getTokent
                    $token=$admin->getToken($admin->idadmin);
                    if($token==""){
                        $token=$admin->generateToken($admin);
                        $admin->insertToken($admin->idadmin,$token); 
                        $data["data"]=$token;  
                    }else{
                        $data["data"]=$token;
                    }
                    $data["status"]='succes';
                    break;
                }
            }else{
                $data["status"]='error';
            }
        }else{
            $data["status"]='error';
        }
        return $data;
    }
    
    // Token manipulation

    /**
     * @return token 
     */
    public function generateToken($admin){
        date_default_timezone_set('africa/nairobi');
        $now=date('Y-m-d H:i:s');
        $token=sha1($now . "corona" . $admin->username);
        return $token;
    }

    public function getToken($adminId){
        date_default_timezone_set('africa/nairobi');
        $token="";
        $sql= "SELECT token FROM t_token WHERE dateexpiration > NOW() AND idadmin=%d";
        $sql=sprintf($sql,$adminId);
        $result=$this->db->query($sql);
        foreach($result->result_array() as $row){
            $token=$row["token"];
            break;
        }
        return $token;
    }

    public function insertToken($adminId,$token){
        date_default_timezone_set('africa/nairobi');
        $sql= "INSERT INTO t_token VALUES(%d,'%s',DATE_ADD(NOW(),INTERVAL 5 DAY))";
        $sql=sprintf($sql,$adminId,$token);
        $this->db->query($sql);
    }

    public function checkToken($adminId){
        $sql= "SELECT token FROM t_token WHERE dateexpiration > NOW() AND idadmin=%d";
        $sql=sprintf($sql, $adminId);
        $result=$this->db->query($sql);
        $check=false;
        if($result=$this->db->query($sql)){
            if(count($result->result_array())>0){
                foreach($result->result_array() as $row){
                    $check=true;
                }
            }
        }
        return $check;
    }
}
