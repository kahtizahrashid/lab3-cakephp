<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Special Controller
 *
 * @method \App\Model\Entity\Special[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $special = $this->paginate($this->Special);

        $this->set(compact('special'));
    }

    /**
     * View method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $special = $this->Special->get($id, [
            'contain' => [],
        ]);

        $this->set('special', $special);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $special = $this->Special->newEmptyEntity();
        if ($this->request->is('post')) {
            $special = $this->Special->patchEntity($special, $this->request->getData());
            if ($this->Special->save($special)) {
                $this->Flash->success(__('The special has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special could not be saved. Please, try again.'));
        }
        $this->set(compact('special'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $special = $this->Special->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $special = $this->Special->patchEntity($special, $this->request->getData());
            if ($this->Special->save($special)) {
                $this->Flash->success(__('The special has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special could not be saved. Please, try again.'));
        }
        $this->set(compact('special'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $special = $this->Special->get($id);
        if ($this->Special->delete($special)) {
            $this->Flash->success(__('The special has been deleted.'));
        } else {
            $this->Flash->error(__('The special could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
