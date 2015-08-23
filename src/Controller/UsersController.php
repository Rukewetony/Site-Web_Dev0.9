<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Email\Email;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'add', 'logout']);
    }

    /**
     * Visualisations de tout les tickets pour les admins/modos
     **/
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }
    /**
     * Connexion votre compte
     */
    public function login()
    {
        $userLogin = $this->Auth->identify();
        if ($userLogin) {

            $this->Auth->setUser($userLogin);
            $user = $this->Users->newEntity($userLogin);
            $user->isNew(false);
            $user->last_login = new Time();
            $this->Users->save($user);

            $this->request->session()->write('Auth.User', $user);

            $url = $this->Auth->redirectUrl();
            if (substr($this->Auth->redirectUrl(), -5) == 'login') {
                $url = ['controller' => 'pages', 'action' => 'home'];
            }
            return $this->redirect($url);
        }
    }

    /**
     * Visualisations de tout les tickets pour les admins/modos
     **/
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Tickets']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Ajouté un compte
     **/
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Votre compte à bien était créé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Votre compte n\'a pas plus être créé.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function profile(){
        $user = $this->Auth->user();

        $this->loadModel('Tickets');

        $tickets_count = $this->Tickets->find('all', ['conditions' => ['Tickets.user_id' => $user['id']]])->count();

        $this->paginate = [
            'limit' => 10,
            'conditions' => ['Tickets.user_id' => $user['id']]
        ];

        $this->set('tickets', $this->paginate($this->Tickets));
        $this->set('tickets_count', $tickets_count);
        $this->set('user', $user);

    }

    /**
     * Édition de votre compte
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Votre compte à bien était éditer.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Votre compte n\'a pas plus être éditer.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Supression de votre compte
     **/
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Votre compte à bien était supprimé'));
        } else {
            $this->Flash->error(__('Votre compte n\'a pas plus être supprimé'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
