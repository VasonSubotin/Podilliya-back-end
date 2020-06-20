<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OurPriceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OurPriceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OurPriceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OurPrice::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ourprice');
        CRUD::setEntityNameStrings('Our Price', 'our_prices');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn(['name' => 'culture_name_en', 'type' => 'text', 'label' => 'Culture name EN']);
        $this->crud->addColumn(['name' => 'culture_name_uk', 'type' => 'text', 'label' => 'Culture name UK']);
        $this->crud->addColumn(['name' => 'price_en', 'type' => 'text', 'label' => 'Price EN']);
        $this->crud->addColumn(['name' => 'price_uk', 'type' => 'text', 'label' => 'Price UK']);


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


        $this->crud->addField(['name' => 'culture_name_en', 'type' => 'text', 'label' => 'Culture name EN']);
        $this->crud->addField(['name' => 'culture_name_uk', 'type' => 'text', 'label' => 'Culture name UK']);
        $this->crud->addField(['name' => 'price_en', 'type' => 'text', 'label' => 'Price EN']);
        $this->crud->addField(['name' => 'price_uk', 'type' => 'text', 'label' => 'Price UK']);

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
