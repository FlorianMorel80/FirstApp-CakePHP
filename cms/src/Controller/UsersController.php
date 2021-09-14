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

        public function view($id = null) {
            $user = $this->Users->findById($id)->firstOrFail();
            $this->set(compact('user'));
        }


        public function add() {
            $user = $this->Users->newEntity();

            if($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->user_id = 1;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('L\'utilisateur à bien été ajouté'));
                    return $this->redirect((['action' => 'index']));
                }
                $this->Flash->error(__('L\'utilisateur n\'a pas pu être ajouté'));
            }
            $this->set('user', $user);
        }


        public function edit($id) {
            $user = $this->Users->findById($id)->firstOrfail();

            if($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($user, $this->request->getData());

                if($this->Users->save($user)){
                    $this->Flash->success(__('Votre user a été mis à jour'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Impossible de mettre à jour l\'user.'));

            }
        }
    }