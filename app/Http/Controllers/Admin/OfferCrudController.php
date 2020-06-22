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
        $this->crud->addColumn(['name' => 'is_home_page', 'type' => 'boolean', 'label' => 'Do you want to see offer at home page']);
        $this->crud->addColumn(['name' => 'is_read_more', 'type' => 'boolean', 'label' => 'Show "Read more" modal?']);
        $this->crud->addColumn(['name' => 'order_number', 'type' => 'number', 'label' => 'Order number']);
        $this->crud->addColumn(['name' => 'price_en', 'type' => 'text', 'label' => 'Price Eng']);
        $this->crud->addColumn(['name' => 'price_uk', 'type' => 'text', 'label' => 'Price Ukr']);
        $this->crud->addColumn(['name' => 'image_path', 'type' => 'image', 'label' => 'Image']);
        $this->crud->addColumn(['name' => 'heading_en', 'type' => 'text', 'label' => 'Heading Eng']);
        $this->crud->addColumn(['name' => 'heading_uk', 'type' => 'text', 'label' => 'Heading Ukr']);
        $this->crud->addColumn(['name' => 'partial_description_en', 'type' => 'text', 'label' => 'Partial Description Eng']);
        $this->crud->addColumn(['name' => 'partial_description_uk', 'type' => 'text', 'label' => 'Partial Description Ukr']);
        $this->crud->addColumn(['name' => 'full_description_en', 'type' => 'text', 'label' => 'Full Description Eng']);
        $this->crud->addColumn(['name' => 'full_description_uk', 'type' => 'text', 'label' => 'Full Description Urk']);

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

        $this->crud->addField(['name' => 'price_en', 'type' => 'text', 'label' => 'Price Eng']);
        $this->crud->addField(['name' => 'price_uk', 'type' => 'text', 'label' => 'Price Ukr']);
        $this->crud->addField(['name' => 'image_path', 'type' => 'image', 'label' => 'Image']);
        $this->crud->addField(['name' => 'heading_en', 'type' => 'text', 'label' => 'Heading Eng']);
        $this->crud->addField(['name' => 'heading_uk', 'type' => 'text', 'label' => 'Heading Ukr']);
        $this->crud->addField(['name' => 'partial_description_en', 'type' => 'text', 'label' => 'Partial Description Eng']);
        $this->crud->addField(['name' => 'partial_description_uk', 'type' => 'text', 'label' => 'Partial Description Ukr']);
        $this->crud->addField(['name' => 'full_description_en', 'type' => 'ckeditor', 'label' => 'Full Description Eng']);
        $this->crud->addField(['name' => 'full_description_uk', 'type' => 'ckeditor', 'label' => 'Full Description Urk']);
        $this->crud->addField(['name' => 'is_home_page', 'type' => 'boolean', 'label' => 'Do you want to see offer at home page']);
        $this->crud->addField(['name' => 'is_read_more', 'type' => 'boolean', 'label' => 'Show "Read more" modal?']);
        $this->crud->addField(['name' => 'is_offer_page', 'type' => 'boolean', 'label' => 'Show On Offer Page?']);
        $this->crud->addField(['name' => 'order_number', 'type' => 'number', 'label' => 'Order number']);

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
