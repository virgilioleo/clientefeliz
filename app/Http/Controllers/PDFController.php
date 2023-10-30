<?php 

namespace App\Http\Controllers;

use App\Cliente;
//use App\Stackoverflow;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Facade;

class PDFController extends Controller
{

    private $model;
    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function gerarpdf()
    {
        $data['model'] = $this->model->all();
        return FacadePdf::loadView('pdf', $data)
            ->stream();
    }
}
