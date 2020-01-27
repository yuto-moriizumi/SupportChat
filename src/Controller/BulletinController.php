<?php

namespace App\Controller;

use App\Controller\AppController;

class BulletinController extends AppController
{
    public function index($id) //ストアIDはidの掲示板を表示するよ！
    {
        $this->loadModel('Threads');
        $thread = $this->Threads->newEntity();
        if ($this->request->is('post')) {
            $thread = $this->Threads->patchEntity($thread, $this->request->getData());
            $thread['store_id'] = $id;
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('保存しました。'));
            } else {
                $this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
            }
        }
        $this->set(['newThread' => $thread]);

        $threads = $this->paginate('Threads', [
            'conditions' => ['Threads.store_id' => $id],
            'limit' => 10
        ]);
        $this->set(compact('threads', 'id'));

        $this->loadModel('Stores');
        $storeName = $this->Stores->get($id)->toArray()['name'];
        $this->set(compact('storeName'));
    }
    public function view($id, $storeId)
    {
        $this->loadModel('Posts');
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('保存しました。'));
            } else {
                $this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
            }
        }
        $this->set(['myPost' => $post]);

        $this->loadModel('Threads');
        $thread = $this->Threads->find(
            'all',
            ['contain' => 'posts']
        )->where(['id' => $id])->toArray()[0];
        $this->set(compact('thread', 'storeId'));
    }
}
