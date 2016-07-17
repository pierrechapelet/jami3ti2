<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Faqs Controller
 *
 * @property \App\Model\Table\FaqsTable $Faqs
 */
class FaqsController extends AppController
{



    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index', 'view']);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
 

    public function index()
    {
        $faqs = $this->Faqs->find()->where(['is_active' => 1]);

        $session = $this->request->session();
        $lang = $session->read('System.language.code');
        
        foreach ($faqs as $faq) {

            if ($lang == 'en_US'){
                $faq['question'] = $faq->question_en;
                $faq['answer'] = $faq->answer_en;
            }
            else{
                $faq['question'] = $faq->question_ara;
                $faq['answer'] = $faq->answer_ara;
            }

            $this->set(compact('faqs'));
            $this->set('_serialize', ['faqs']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faq = $this->Faqs->get($id, [
            'contain' => []
        ]);

        $this->set('faq', $faq);
        $this->set('_serialize', ['faq']);
    }



}
