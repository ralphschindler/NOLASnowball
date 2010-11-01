<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->addElement(
            'text',
            'username',
            array(
                'label'     => 'Username',
                'size'      => 15,
                'maxlength' => 15,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 45)),
                    'Alnum',
                    ),
                )
            );

        $this->addElement(
            'password',
            'password',
            array(
                'label'     => 'Password',
                'class'     => 'genText',
                'size'      => 15,
                'maxlength' => 15,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(5, 45)),
                    'Alnum',
                    ),
                )
            );

        $this->addElement(
            'submit',
            'Login',
            array(
                'label'  => 'Login',
                'ignore' => true,
                'class'  => 'genText',
                )
            );

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl', 'class' => 'zend_form')),
            'Form',
            ));
    }


}

