<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
use Intervention\Image\ImageManager;


class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'add', 'logout']);
    }
    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    /**website
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
            return $this->redirect($url);
        }
    }

    /**
     * Visualisations de tout les tickets pour les admins/modos
     **/
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $this->loadModel('Tickets');

        $user = $this->Users->get($id, [
            'contain' => ['Tickets']
        ]);

        $tickets_count = $this->Tickets->find('all', ['conditions' => ['Tickets.user_id' => $user['id']]])->count();

        $this->paginate = [
            'limit' => 10,
            'conditions' => ['Tickets.user_id' => $user['id']]
        ];

        $this->set('user', $user);
        $this->set('tickets', $this->paginate($this->Tickets));
        $this->set('tickets_count', $tickets_count);
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
    /**
     * Mon profile
     */
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

            $extension = ''; $name_image = '';
            $repertoire = WWW_ROOT . 'img/upload/avatars/';
            $all_extension = ['jpg','gif','png','jpeg'];


            // Upload
            if(isset($this->request->data['avatar_file']) && !empty($this->request->data['avatar_file'])){
                $extension  = pathinfo($this->request->data['avatar_file']['name'], PATHINFO_EXTENSION);
                if(in_array(strtolower($extension), $all_extension)){
                    $name_image = $user['id']. '-' . $user['username'] . '.' . $extension;
                    if(
                        move_uploaded_file($this->request->data['avatar_file']['tmp_name'] , $repertoire . $name_image)

                    ){
                        // Intervention
                        $manager = new ImageManager();
                        // Répertoire de l'avatar
                        $manager->make($repertoire . $name_image)
                        // Roger et redimensionner l'avatar
                        ->fit(170)
                        // Sauvegarde de l'avatar
                        ->save($repertoire . $name_image);

                        $this->Users->patchEntity($user, ['avatar' => $name_image]);
                        return $this->redirect(['action' => 'profile']);
                    }
                }
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Votre compte a bien été édité.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Votre compte n\'a pas pu être édité.'));
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
            $this->Flash->error(__('Votre compte n\'a pas pu être supprimé'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
