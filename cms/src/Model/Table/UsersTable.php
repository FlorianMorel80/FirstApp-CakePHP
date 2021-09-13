<?php

    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Utility\Text;
    use Cake\Validation\Validator;

    

    class UsersTable extends Table {

        public function initialize(array $config)
        {
            $this->addBehavior('Timestamp');
        }

        // L'event model "beforeSave" est déclenché avant que chaque entity ne soit sauvegardée. 
        // Stopper cet event va  annuer l'opération de sauvegarde
        public function beforeSave($event, $entity, $options) {
            if ($entity->isNew() && !$entity->slug) {
                $sluggedID = Text::slug($entity->id);
                // On ne garde que le nombre de caractère correspondant à la longueur
                // maximum définie dans notre schéma
                $entity->slug = substr($sluggedID, 0, 191);
            }

        }

        // La méthode validationDefault va indiquer à CakePHP comment valider les données quand la méthode save() est appelé
        public function validationDefault(Validator $validator)
        {
            $validator
                ->notBlank('email')
                ->minLength('email', 10)
                ->maxLength('email', 255);

                return $validator;
        }
    }

?>