<?php
namespace Integrateideas\Reviews\Controller\Api;

use Integrateideas\Reviews\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Core\Configure;
use Cake\Routing\Router;

/**
 * BusinessReviews Controller
 *
 * @property \Integrateideas\Reviews\Model\Table\BusinessReviewsTable $BusinessReviews
 *
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview[] paginate($object = null, array $settings = [])
 */
class BusinessReviewsController extends ApiController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   

        $this->paginate = [
            'contain' => ['Businesses', 'ReviewTypes', 'Users']
        ];
        $businessReviews = $this->paginate($this->BusinessReviews);

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

    public function generateReviewLink(){

        if(!$this->request->is('get')){
            throw new MethodNotAllowedException(__('Bad Request.'));
        }

        $customerId = $this->request->query['customer_id'];
        $customerModel = $this->loadModel(Configure::read('ReviewPlugin.CustomerModel'));
        $customer = $customerModel->findById($customerId)->first();
    
        if(!$customer){
            throw new BadRequestException(__('Customer was not found.'));
        }

        $dataForReviewRequest = [
                                        'business_id' => $customer->business_id,
                                        'user_id' => $this->Auth->user('id'),
                                        'customer_id' => $customerId,
                                        'status' => 0 //status changes to 1 when a an entry is done in BusinessReviews for review_type_id 1 or 2.
                                ];

        $this->loadModel('Integrateideas/Reviews.ReviewRequests');
        $reviewRequest = $this->ReviewRequests->newEntity($dataForReviewRequest);
        $reviewRequest  = $this->ReviewRequests->save($reviewRequest);

        if(!$reviewRequest){
            throw new InternalErrorException(__('Could not save data.')); 
        }else{
            $url =  Router::url('/', true);
            $url = $url.'integrateideas/reviews/businessReviews/add?review_request_id='.$reviewRequest->id.'&uuid='.$reviewRequest->uuid;
        }

        $this->set('response', ['status' => true, 'url' => $url]);
        $this->set('_serialize', ['response']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
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
