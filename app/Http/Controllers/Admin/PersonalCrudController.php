<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PersonalRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PersonalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PersonalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Personal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/personal');
        CRUD::setEntityNameStrings('personal', 'personals');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addColumn(['name' => 'full_name_en', 'type' => 'text', 'label' => 'Full name Eng']);
        $this->crud->addColumn(['name' => 'full_name_uk', 'type' => 'text', 'label' => 'Full name Ukr']);
        $this->crud->addColumn(['name' => 'department_en', 'type' => 'text', 'label' => 'Department Eng']);
        $this->crud->addColumn(['name' => 'department_uk', 'type' => 'text', 'label' => 'Department Urk']);
        $this->crud->addColumn(['name' => 'phone', 'type' => 'text', 'label' => 'Phone']);
        $this->crud->addColumn(['name' => 'email', 'type' => 'text', 'label' => 'Email']);
        $this->crud->addColumn(['name' => 'photo_path', 'type' => 'image', 'label' => 'Photo']);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PersonalRequest::class);


        $this->crud->addField(['name' => 'full_name_en', 'type' => 'text', 'label' => 'Full name Eng']);
        $this->crud->addField(['name' => 'full_name_uk', 'type' => 'text', 'label' => 'Full name Ukr']);
        $this->crud->addField(['name' => 'department_en', 'type' => 'text', 'label' => 'Department Eng']);
        $this->crud->addField(['name' => 'department_uk', 'type' => 'text', 'label' => 'Department Urk']);
        $this->crud->addField(['name' => 'phone', 'type' => 'text', 'label' => 'Phone']);
        $this->crud->addField(['name' => 'email', 'type' => 'text', 'label' => 'Email']);
        $this->crud->addField(['name' => 'photo_path', 'type' => 'image', 'label' => 'Photo']);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
