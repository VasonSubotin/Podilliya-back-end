<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OfferRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OfferCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OfferCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Offer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/offer');
        CRUD::setEntityNameStrings('offer', 'offers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addColumn(['name' => 'heading', 'type' => 'text', 'label' => 'Heading']);
        $this->crud->addColumn(['name' => 'heading_en', 'type' => 'text', 'label' => 'Heading Eng']);
        $this->crud->addColumn(['name' => 'text', 'type' => 'ckeditor', 'label' => 'Text']);
        $this->crud->addColumn(['name' => 'text_en', 'type' => 'ckeditor', 'label' => 'Text en']);
        $this->crud->addColumn(['name' => 'image_path', 'type' => 'image']);
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
        CRUD::setValidation(OfferRequest::class);

        $this->crud->addField(['name' => 'heading', 'type' => 'text', 'label' => 'Heading']);
        $this->crud->addField(['name' => 'heading_en', 'type' => 'text', 'label' => 'Heading Eng']);
        $this->crud->addField(['name' => 'text', 'type' => 'ckeditor', 'label' => 'Text']);
        $this->crud->addField(['name' => 'text_en', 'type' => 'ckeditor', 'label' => 'Text en']);
        $this->crud->addField(['name' => 'image_path', 'type' => 'image', 'upload' => true, 'crop' => true]);

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
