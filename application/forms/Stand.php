<?php

class Application_Form_Stand extends Zend_Form
{

    public function init()
    {
        // add id element
        $this->addElement('hidden', 'id');
        
        // remove id's decorators
        $this->getElement('id')
            ->removeDecorator('DtDdWrapper')
            ->removeDecorator('HtmlTag')
            ->removeDecorator('Label');
        
        $this->addElement(
            'text',
            'name',
            array(
                'label'     => 'Name',
                'size'      => 80,
                'maxlength' => 120,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 120))
                    ),
                )
            );

        $this->addElement(
            'text',
            'address',
            array(
                'label'     => 'Address',
                'size'      => 80,
                'maxlength' => 120,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 120))
                    ),
                )
            );
        
        $this->addElement(
            'text',
            'city',
            array(
                'label'     => 'City',
                'size'      => 80,
                'maxlength' => 120,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 120))
                    ),
                )
            );
        
        $states = array(
            'AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado',
            'CT'=>'Connecticut','DE'=>'Delaware','DC'=>'District Of Columbia','FL'=>'Florida','GA'=>'Georgia',
            'HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa','KS'=>'Kansas',
            'KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland', 'MA'=>'Massachusetts',
            'MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana',
            'NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico',
            'NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio','OK'=>'Oklahoma',
            'OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota',
            'TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington',
            'WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming'
            );
        
        $this->addElement(
            'select',
            'state', array(
                'label'     => 'State',
                'required'  => true,
                'multiOptions' => $states,
                'value' => 'LA',
                'registerInArrayValidator' => false
                /*
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 120))
                    ),
                */
                )
            );
        
        $this->addElement(
            'text',
            'zipCode',
            array(
                'label'     => 'Zip Code',
                'size'      => 5,
                'maxlength' => 5,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(5, 5))
                    ),
                )
            );
        
        $this->addElement(
            'submit',
            'Save',
            array(
                'label'  => 'Save',
                'ignore' => true,
                //'class'  => 'genText',
                )
            );

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl', 'class' => 'zend_form')),
            'Form',
            ));
    }
    
    public function setDefaultsFromEntity(\NOLASnowball\Entity\Stand $stand)
    {
        $values = array(
            'id' => $stand->getId(),
            'name' => $stand->getName(),
            'address' => $stand->getAddress(),
            'city' => $stand->getCity(),
            'state' => $stand->getState(),
            'zipCode' => $stand->getZipCode()
            );
        $this->setDefaults($values);
    }


}

