<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TicketsController extends AppController
{

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Tickets.created' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $ticketId = (int)$this->request->params['pass'][0];
            if ($this->Tickets->isOwnedBy($ticketId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Visualisations de tout les tickets pour les admins/modos
     **/
    public function index()
    {

        $this->set('tickets', $this->paginate($this->Tickets));
        $this->set('_serialize', ['tickets']);
    }

    /**
     * Visualisations de tout les tickets pour les admins/modos
     **/
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
        ]);
        $this->set('ticket', $ticket);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Ajout d'un ticket
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();

        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);

            // debug($this->Auth->user('id'));
            // debug($ticket->);
            $user = $this->Auth->user();

            $ticket->user_id = $user['id'];

            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('Votre ticket à bien était sauvegarder.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Votre ticket n\' pas plus être sauvegarder, veuillez recommmencer.'));
            }
        }
        $this->set(compact('ticket', 'users', 'tags'));
        $this->set('_serialize', ['ticket']);
    }
    /**
     * Édition du ticket
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            }
        }
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $tags = $this->Tickets->Tags->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'users', 'tags'));
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Suppression du ticket
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
