<?php 
    // namespace représente le moyen d'encapsuler les éléments 
    namespace App\Controller;

    use App\Controller\AppController;

    class UsersController extends AppController{
        public function initialize()
        {
            parent::initialize();
            $this->loadComponent('Paginator');
            $this->loadComponent('Flash');
        }

        public function index() {
            $users = $this->Paginator->paginate($this->Users->find());
            $this->set(compact('users'));
        }

        public function view($slug = null) {
            $user = $this->Users->findBySlug($slug)->firstOrFail();
            $this->set(compact('user'));
        }


        public function add() {
            $user = $this->Users->newEntity();

            if($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->user_id = 1;
            }
        }
    }