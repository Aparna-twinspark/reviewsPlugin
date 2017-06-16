<?php
namespace Integrateideas\Reviews\Controller;

use Integrateideas\Reviews\Controller\AppController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;

/**
 * BusinessReviews Controller
 *
 * @property \Integrateideas\Reviews\Model\Table\BusinessReviewsTable $BusinessReviews
 *
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview[] paginate($object = null, array $settings = [])
 */
class BusinessReviewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $businessReviews = $this->BusinessReviews->find()
                                                 ->contain(['Businesses', 'ReviewTypes', 'Users'])
                                                 ->all()
                                                 ->toArray();

        $this->set(compact('businessReviews'));
        $this->set('_serialize', ['businessReviews']);
    }

    /**
     * View method
     *
     * @param string|null $id Business Review id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessReview = $this->BusinessReviews->get($id, [
            'contain' => ['Businesses', 'ReviewTypes', 'Users']
        ]);

        $this->set('businessReview', $businessReview);
        $this->set('_serialize', ['businessReview']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $uuid = $this->request->query['uuid'];
        $reviewRequestId = $this->request->query['review_request_id'];

        $this->loadModel('ReviewRequests');
        $reviewReq = $this->ReviewRequests->find()
                                          ->where(['uuid' => $uuid, 'id' => $reviewRequestId])
                                          ->first();
        if(!$reviewReq){
            throw new BadRequestException(__('Not found.'));
        }
        $businessReview = $this->BusinessReviews->newEntity();
        if ($this->request->is('post')) {
            $businessReview = $this->BusinessReviews->patchEntity($businessReview, $this->request->getData());
            if ($this->BusinessReviews->save($businessReview)) {
                $this->Flash->success(__('The business review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business review could not be saved. Please, try again.'));
        }
        $businesses = $this->BusinessReviews->Businesses->find('list', ['limit' => 200]);
        $reviewTypes = $this->BusinessReviews->ReviewTypes->find('list', ['limit' => 200]);
        $users = $this->BusinessReviews->Users->find('list', ['limit' => 200]);
        $this->set(compact('businessReview', 'businesses', 'reviewTypes', 'users'));
        $this->set('_serialize', ['businessReview']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        throw new MethodNotAllowedException(__('Not allowed.'));
        // $businessReview = $this->BusinessReviews->get($id, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $businessReview = $this->BusinessReviews->patchEntity($businessReview, $this->request->getData());
        //     if ($this->BusinessReviews->save($businessReview)) {
        //         $this->Flash->success(__('The business review has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The business review could not be saved. Please, try again.'));
        // }
        // $businesses = $this->BusinessReviews->Businesses->find('list', ['limit' => 200]);
        // $reviewTypes = $this->BusinessReviews->ReviewTypes->find('list', ['limit' => 200]);
        // $users = $this->BusinessReviews->Users->find('list', ['limit' => 200]);
        // $this->set(compact('businessReview', 'businesses', 'reviewTypes', 'users'));
        // $this->set('_serialize', ['businessReview']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        throw new MethodNotAllowedException(__('Not allowed.'));
        // $this->request->allowMethod(['post', 'delete']);
        // $businessReview = $this->BusinessReviews->get($id);
        // if ($this->BusinessReviews->delete($businessReview)) {
        //     $this->Flash->success(__('The business review has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The business review could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
    }
}
