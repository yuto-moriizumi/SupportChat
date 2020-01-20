<?php

namespace App\Controller;

use App\Controller\AppController;

class ToppageController extends AppController
{
    public function index()
    {
        $this->loadModel('Stores');
        $store = $this->Stores->newEntity();
        if ($this->request->is('post')) {
            $store = $this->Stores->patchEntity($store, $this->request->getData());
            if ($this->Stores->save($store)) {
                $this->Flash->success(__('保存しました。'));
            } else {
                $this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
            }
        }
        $this->set(['newStore' => $store]);

        $stores = $this->paginate('Stores', [
            'limit' => 10
        ]);
        $this->set(compact('stores'));
    }
}
