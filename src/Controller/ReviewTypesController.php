<?php
namespace Integrateideas\Reviews\Controller;

use Integrateideas\Reviews\Controller\AppController;

/**
 * ReviewTypes Controller
 *
 * @property \Integrateideas\Reviews\Model\Table\ReviewTypesTable $ReviewTypes
 *
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType[] paginate($object = null, array $settings = [])
 */
class ReviewTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $reviewTypes = $this->paginate($this->ReviewTypes);

        $this->set(compact('reviewTypes'));
        $this->set('_serialize', ['reviewTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Review Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reviewType = $this->ReviewTypes->get($id, [
            'contain' => ['ReviewSettings', 'BusinessReviews']
        ]);

        $this->set('reviewType', $reviewType);
        $this->set('_serialize', ['reviewType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reviewType = $this->ReviewTypes->newEntity();
        if ($this->request->is('post')) {
            $reviewType = $this->ReviewTypes->patchEntity($reviewType, $this->request->getData());
            if ($this->ReviewTypes->save($reviewType)) {
                $this->Flash->success(__('The review type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review type could not be saved. Please, try again.'));
        }
        $this->set(compact('reviewType'));
        $this->set('_serialize', ['reviewType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Review Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reviewType = $this->ReviewTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reviewType = $this->ReviewTypes->patchEntity($reviewType, $this->request->getData());
            if ($this->ReviewTypes->save($reviewType)) {
                $this->Flash->success(__('The review type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review type could not be saved. Please, try again.'));
        }
        $this->set(compact('reviewType'));
        $this->set('_serialize', ['reviewType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Review Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reviewType = $this->ReviewTypes->get($id);
        if ($this->ReviewTypes->delete($reviewType)) {
            $this->Flash->success(__('The review type has been deleted.'));
        } else {
            $this->Flash->error(__('The review type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
