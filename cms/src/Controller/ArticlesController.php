<?php 
    // namespace représente le moyen d'encapsuler les éléments 
    namespace App\Controller;

    use App\Controller\AppController;

    class ArticlesController extends AppController{


        public function initialize() {
            parent::initialize();
            $this->loadComponent('Paginator');
            // FlashComponent est un moyen de définir des messages de notifications à afficher après avoir envoyé un formulaire ou des données connues; 
            // CakePHP appelle ces messages des "messages flash" qui sont écrit dans $_SESSION et affiché dans la view 

            $this->loadComponent('Flash');
        }

        public function index() {

            // Récupérer un jeu d'article paginés dans la bdd en utilisant l'objet model Articles, chargé automatiquemet via les conventions de nommage
            $articles = $this->Paginator->paginate($this->Articles->find());
            
            // la méthode set va permettre de faire passer les articles récupérés au template 
            $this->set(compact('articles'));
        }

        public function view($slug = null) {
            // findBySlug est un finder dynamique 
            // la méthode va permettre de créer une requête basique qui permet de récupérer des articles par un "slug" donné
            // firstOrFail qui va permettre de récupérer le premier enregistrement oou lancera une NotFoundException si aucun article correspondant n'est trouvé
            $article = $this->Articles->findBySlug($slug)->firstOrFail();
            $this->set(compact('article'));
        }


        //*********************************** ADD ******************************************************** */
        //L'action add() fait : 
            // - si la méthode est en POST alors ça tentera de sauvegarder les données en utlisant le model Articles
            // - si la sauvegarde ne se fait pas, cela rendra juste la view permettant aussi de montrer les erreurs de validations et les messages à l'utilisateur
        public function add() {

            $article = $this->Articles->newEntity();

            if ($this->request->is('post')) {
                //$this->request : cet objet va contenir les infos à propos de la requête qui vient d'être reçue. 
                // L’objet ServerRequest fournit une façon d’inspecter différentes conditions de la requête utilisée. En utilisant la
                // méthode is(), vous pouvez vérifier un certain nombre de conditions, ainsi qu’inspecter d’autres critères de la requête
                // spécifique à l’application EXEMPLE:
                // $isPost = $this->request->is('post');
                $article = $this->Articles->patchEntity($article, $this->request->getData());
                // L'écriture de 'user_id' en dur est temporaire et
                // sera supprimé quand nous aurons mis en place l'authentification.
                $article->user_id = 1;

                if ($this->Articles->save($article)) {
                    // On définit ici les messages de sessions. Les messages flash seront affiché sur la page suivante
                    // Après la redirection 
                    $this->Flash->success(__('Votre article a été sauvegardé.'));
                    // Après la sauvegarde, l'user est redirigé vers la liste des articles
                    // Le paramètre "action => index" correspond à l'URL /articles c'est à dire l'action index du ArticlesController (Articles/index.ctp)
                    return $this->redirect(['action'=>'index']);
                }
                    $this->Flash->error(__('Impossible d\'ajouter votre article.'));
            }
                $this->set('article', $article);
        }

        //****************************END OF ADD **************************************************** */

        // **************************** EDIT **************************************************
        public function edit($slug) {
            // firstOrFail va retourner le premier enregistrement trouvé en bdd; 
            // Si aucun modèle n'existe, il retournera une erreur
            $article = $this->Articles->findBySlug($slug)->firstOrFail();

            // L'action va vérifier si la requête est en post ou put; si oui, alors l'entity sera mis à jour par les nouvelles données
            // via la méthode patchEntity()
            if($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->getData());

                if($this->Articles->save($article)){
                    $this->Flash->success(__('Votre article a été mis à jour'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Impossible de mettre à jour l\'article.'));

            }
        }
        // ***************************END OF EDIT ***********************************************
    

        //******************************DELETE*********************************************** */
        public function delete($slug) {
            // Ici, si l'user essai de supprimer l'article en méthode get alors allowmethod lancera une exception avec un message d'erreur
            $this->request->allowMethod(['post', 'delete']);
            $article = $this->Articles->findBySlug($slug)->firstOrFail();

            if($this->Articles->delete($article)){
                $this->Flash->success(__('L\'article {0} à bien été supprimé', $article->title));
                return $this->redirect(['action' => 'index']);
            }
        }
        //***************************END OF DELETE******************************************* */
    }

?>