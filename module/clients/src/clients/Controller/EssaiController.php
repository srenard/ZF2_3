<?php

namespace Clients\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Annotation\AnnotationBuilder;
use Clients\Form\Annotation1Form;
use Clients\Form\CreateProduct;
use clients\Model\Product;

class EssaiController extends AbstractActionController {

    public function test1Action() {
        $builder = new AnnotationBuilder();
        $AnnotationForm = new Annotation1Form();
        $form2 = $builder->createForm($AnnotationForm);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            var_dump($data);
            exit();
            return $this->redirect()->toRoute('formulaire1');
        }
        return array('form2' => $form2);
    }

    public function test2Action() {
        $form = new CreateProduct();
        $product = new Product();
        $form->bind($product);
        $request = $this->getRequest();
        if ($request->isPost()) {
            //var_dump($request->getPost());
            $form->setData($request->getPost());
            //var_dump($form);
            echo 'ok1';
            //if ($form->isValid()) {
            if (true) {
                echo 'ok2';
                //var_dump($product);
            }
        }
        return array(
            'form' => $form,
        );
    }
    public function test3Action(){
        
    }

}
