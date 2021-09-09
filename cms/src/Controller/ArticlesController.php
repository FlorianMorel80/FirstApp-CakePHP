<?php 

    namespace App\Controller;

    class ArticlesController extends AppController{

        public function index() {

            $this->loadComponent('Paginator');7

            // Récupérer un jeu d'article paginés dans la bdd en utilisant l'objet model Articles, chargé automatiquemet via les conventions de nommage
            $articles = $this->Paginator->paginate($this->Articles->find());
            
            // la méthode set va permettre de faire passer les articles récupérés au template 
            $this->set(compact('articles'));
        }
    }

?>