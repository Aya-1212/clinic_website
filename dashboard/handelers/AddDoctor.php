<?php

class AddDoctor{
        private $sql = "INSERT INTO `doctors` (`name` , `description` , `location` , `major_id`) VALUES ('$name' , '$Description' , '$location' ,'$sql1 ')";
        public $result;

        public $sql1 = "SELECT doctors.major_id FROM `doctors`
        INNER JOIN `majors` ON doctors.major_id = majors.id
        ";


        function setSql($sql){
            $this->sql = $sql ; 
        }
        function getSql(){
            return $this->sql ;
        }
}
