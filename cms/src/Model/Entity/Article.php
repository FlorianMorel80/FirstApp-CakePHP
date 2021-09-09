<?php 

    namespace App\Model\Entity;
    use Cake\ORM\Entity;
    
    class Article extends Entity{
        
        // la propriété _accessible permet de contrôler quelles propriétés peuvent être modifiées 
        protected $_accessible = [
            '*' => true,
            'id' => false,
            'slug' => false,
        ];
    }

?>