<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Threads Controller
 *
 * @property \App\Model\Table\ThreadsTable $Threads
 *
 * @method \App\Model\Entity\Thread[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThreadsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id)
    {
        $threads = $this->paginate($this->Threads, ['condition' => ['Threads.store_id' => $id]]);

        $this->set(compact(['threads']));
        $this->set(['id' => $id]);
    }

    /**
     * View method
     *
     * @param string|null $id Thread id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $thread = $this->Threads->get($id, [
            'contain' => ['Posts'],
        ]);

        $this->set('thread', $thread);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $thread = $this->Threads->newEntity();
        if ($this->request->is('post')) {
            $thread = $this->Threads->patchEntity($thread, $this->request->getData());
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('The thread has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The thread could not be saved. Please, try again.'));
        }
        $this->set(compact('thread'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Thread id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $thread = $this->Threads->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thread = $this->Threads->patchEntity($thread, $this->request->getData());
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('The thread has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The thread could not be saved. Please, try again.'));
        }
        $this->set(compact('thread'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Thread id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thread = $this->Threads->get($id);
        if ($this->Threads->delete($thread)) {
            $this->Flash->success(__('The thread has been deleted.'));
        } else {
            $this->Flash->error(__('The thread could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
