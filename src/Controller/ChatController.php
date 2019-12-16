<?php

namespace App\Controller;

use App\Controller\AppController;

class ChatController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Messages');
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
        $messages = $this->Messages->find('all', ['order' => ['created' => 'desc']]);
        $this->set(compact('messages'));
        $this->set(compact('message'));
    }
}
