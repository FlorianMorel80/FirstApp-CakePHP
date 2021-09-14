<?php 

    namespace App\Model\Entity;
    use Cake\ORM\Entity;
    
    class User extends Entity{
        
        // la propriété _accessible permet de contrôler quelles propriétés peuvent être modifiées 
        protected $_accessible = [
            '*' => true,
            'id' => false,
            'email' => true,
            'password' => true,
        ];
    }

?>