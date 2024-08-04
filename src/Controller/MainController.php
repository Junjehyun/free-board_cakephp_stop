<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MainController Controller
 *
 * @method \App\Model\Entity\MainController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MainController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Main Controller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mainController = $this->MainController->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('mainController'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mainController = $this->MainController->newEmptyEntity();
        if ($this->request->is('post')) {
            $mainController = $this->MainController->patchEntity($mainController, $this->request->getData());
            if ($this->MainController->save($mainController)) {
                $this->Flash->success(__('The main controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main controller could not be saved. Please, try again.'));
        }
        $this->set(compact('mainController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Main Controller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mainController = $this->MainController->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mainController = $this->MainController->patchEntity($mainController, $this->request->getData());
            if ($this->MainController->save($mainController)) {
                $this->Flash->success(__('The main controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main controller could not be saved. Please, try again.'));
        }
        $this->set(compact('mainController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Main Controller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mainController = $this->MainController->get($id);
        if ($this->MainController->delete($mainController)) {
            $this->Flash->success(__('The main controller has been deleted.'));
        } else {
            $this->Flash->error(__('The main controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
