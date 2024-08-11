<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Finanza;

class FinanzaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Finanza';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Finanza());

        $grid->column('id', __('Id'));
        $grid->column('n_de_empastado', __('N de empastado'));
        $grid->column('tipo_de_tramite', __('Tipo de tramite'));
        $grid->column('n_de_comprobante', __('N de comprobante'));
        $grid->column('año_de_gestion', __('Año de gestion'));
        $grid->column('mes_de_gestion', __('Mes de gestion'));
        $grid->column('n_de_estante', __('N de estante'));
        $grid->column('n_de_bandeja', __('N de bandeja'));
        $grid->column('n_de_pasillo', __('N de pasillo'));  
        //$grid->column('image', __('Image'));
        $grid->column('image')->image();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
        
            // Filtrar por Año de Gestión
            $filter->equal('año_de_gestion', 'Año de Gestion');
            
            // Filtrar por Mes de Gestión
            $filter->equal('mes_de_gestion', 'Mes de Gestion')->select([
                'ENERO' => 'Enero',
                'FEBRERO' => 'Febrero',
                'MARZO' => 'Marzo',
                'ABRIL' => 'Abril',
                'MAYO' => 'Mayo',
                'JUNIO' => 'Junio',
                'JULIO' => 'Julio',
                'AGOSTO' => 'Agosto',
                'SEPTIEMBE' => 'Septiembre',
                'OCTUBRE' => 'Octubre',
                'NOVIEMBRE' => 'Noviembre',
                'DICIEMBRE' => 'Diciembre',
            ]);
            
            // Filtrar por N° de Estante
            $filter->equal('n_de_estante', 'Numero de ESTANTE');
        }); 

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Finanza::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('n_de_empastado', __('N de empastado'));
        $show->field('tipo_de_tramite', __('Tipo de tramite'));
        $show->field('n_de_comprobante', __('N de comprobante'));
        $show->field('año_de_gestion', __('Año de gestion'));
        $show->field('mes_de_gestion', __('Mes de gestion'));
        $show->field('n_de_estante', __('N de estante'));
        $show->field('n_de_bandeja', __('N de bandeja'));
        $show->field('n_de_pasillo', __('N de pasillo'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Finanza());

        $form->number('n_de_empastado', __('N de empastado'));
        $form->select('tipo_de_tramite', __('Tipo de tramite'))->options([
            'INGRESO' => 'Ingreso',
            'EGRESO' => 'Egreso'
        ]);
        $form->text('n_de_comprobante', __('N de comprobante'));
        $form->number('año_de_gestion', __('Año de gestion'));
        $form->select('mes_de_gestion', __('Mes de gestion'))->options([
            'ENERO' => 'Enero',
            'FEBRERO' => 'Febrero',
            'MARZO' => 'Marzo',
            'ABRIL' => 'Abril',
            'MAYO' => 'Mayo',
            'JUNIO' => 'Junio',
            'JULIO' => 'Julio',
            'AGOSTO' => 'Agosto',
            'SEPTIEMBRE' => 'Septiembre',
            'OCTUBRE' => 'Octubre',
            'NOVIEMBRE' => 'Noviembre',
            'DICIEMBRE' => 'Diciembre',
        ]);
        $form->number('n_de_estante', __('N de estante'));
        $form->number('n_de_bandeja', __('N de bandeja'));
        $form->number('n_de_pasillo', __('N de pasillo'));
        $form->image('image', __('Image'));

        return $form;
    }
}
