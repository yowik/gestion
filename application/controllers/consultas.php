<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Consultas extends CI_Controller {              
            
        public function __construct()
        {            
            parent::__construct();            
            $this->load->database();
        }
                        
        public function index($page = 'home', $id = -1)
        {
            /*if (!$this->session->userdata('login'))
            {           
                //$this->myLogin();                   
            } */          
            $this->showContent($page, $id);                                                                 
        }
        

        function showContent($page = 'home', $id = -1)
        {
            //var_dump($id);
            //var_dump($_GET);
            $data = array();
            $data['id'] = $id;
            $data['title'] = '';
            $page = str_replace("-", "_", $page);
            $title_part = explode("_", $page);
            
            foreach($title_part as $t)                            
                $data['title'] .= ucfirst($t)." "; // Capitalize the first letter               
                                         
            $this->load->view('consultas/'.$page, $data);                
                      
        }
               
}