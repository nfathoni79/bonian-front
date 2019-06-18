<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/04/2019
 * Time: 18.25
 */

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class CustomerForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('dob', ['type' => 'string'])
            ->addField('gender', ['type', 'string'])
            ->addField('password', ['type' => 'string'])
            ->addField('phone', ['type' => 'string'])
            ->addField('otp', ['type' => 'string'])
            ->addField('username', ['type' => 'string']);
    }

    protected function _execute(array $data)
    {

        return true;
    }
}