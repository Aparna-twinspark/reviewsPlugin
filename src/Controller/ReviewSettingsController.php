<?php
namespace Integrateideas\Reviews\Controller;

use Integrateideas\Reviews\Controller\AppController;

/**
 * ReviewSettings Controller
 *
 * @property \Integrateideas\Reviews\Model\Table\ReviewSettingsTable $ReviewSettings
 *
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting[] paginate($object = null, array $settings = [])
 */
class ReviewSettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ReviewTypes', 'Businesses']
        ];
        $reviewSettings = $this->paginate($this->ReviewSettings);

        $this->set(compact('reviewSettings'));
        $this->set('_serialize', ['reviewSettings']);
    }

    /**
     * View method
     *
     * @param string|null $id Review Setting id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reviewSetting = $this->ReviewSettings->get($id, [
            'contain' => ['ReviewTypes', 'Businesses']
        ]);

        $this->set('reviewSetting', $reviewSetting);
        $this->set('_serialize', ['reviewSetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reviewSetting = $this->ReviewSettings->newEntity();
        if ($this->request->is('post')) {
            $reviewSetting = $this->ReviewSettings->patchEntity($reviewSetting, $this->request->getData());
            if ($this->ReviewSettings->save($reviewSetting)) {
                $this->Flash->success(__('The review setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review setting could not be saved. Please, try again.'));
        }
        $reviewTypes = $this->ReviewSettings->ReviewTypes->find('list', ['limit' => 200]);
        $businesses = $this->ReviewSettings->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('reviewSetting', 'reviewTypes', 'businesses'));
        $this->set('_serialize', ['reviewSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Review Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reviewSetting = $this->ReviewSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reviewSetting = $this->ReviewSettings->patchEntity($reviewSetting, $this->request->getData());
            if ($this->ReviewSettings->save($reviewSetting)) {
                $this->Flash->success(__('The review setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review setting could not be saved. Please, try again.'));
        }
        $reviewTypes = $this->ReviewSettings->ReviewTypes->find('list', ['limit' => 200]);
        $businesses = $this->ReviewSettings->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('reviewSetting', 'reviewTypes', 'businesses'));
        $this->set('_serialize', ['reviewSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Review Setting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reviewSetting = $this->ReviewSettings->get($id);
        if ($this->ReviewSettings->delete($reviewSetting)) {
            $this->Flash->success(__('The review setting has been deleted.'));
        } else {
            $this->Flash->error(__('The review setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
