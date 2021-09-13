<?php

    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Utility\Text;
    use Cake\Validation\Validator;

    

    class ArticlesTable extends Table {

        public function initialize(array $config)
        {
            $this->addBehavior('Timestamp');
        }

        // L'event model "beforeSave" est déclenché avant que chaque entity ne soit sauvegardée. 
        // Stopper cet event va  annuer l'opération de sauvegarde
        public function beforeSave($event, $entity, $options) {
            if ($entity->isNew() && !$entity->slug) {
                $sluggedTitle = Text::slug($entity->title);
                // On ne garde que le nombre de caractère correspondant à la longueur
                // maximum définie dans notre schéma
                $entity->slug = substr($sluggedTitle, 0, 191);
            }

        }

        // La méthode validationDefault va indiquer à CakePHP comment valider les données quand la méthode save() est appelé
        public function validationDefault(Validator $validator)
        {
            $validator
                ->notBlank('title')
                ->minLength('title', 10)
                ->maxLength('title', 255)

                ->notBlank('body')
                ->minLength('body', 10);
            
                return $validator;
        }
    }

?>