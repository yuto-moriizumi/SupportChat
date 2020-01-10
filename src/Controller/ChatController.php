<?php

namespace App\Controller;

use App\Controller\AppController;

class ChatController extends AuctionBaseController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Messages');
        $this->set('authuser', $this->Auth->user());
    }
    public function index()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $this->Messages->patchEntity($message, $this->request->getData());
            if (!$this->Messages->save($message)) {
                $this->Flash->error(__('メッセージの送信に失敗しました。'));
            } else {
                $this->redirect(['action' => 'index']);
            }
        }
        $messages = $this->Messages->find('all', ['contain' => ['Users'], 'order' => ['created' => 'desc']]);
        $this->set(compact('messages'));
        $this->set(compact('message'));
    }
}
