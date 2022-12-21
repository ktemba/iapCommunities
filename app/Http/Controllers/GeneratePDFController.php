<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use PDF;
class GeneratePDFController extends Controller
{
    public function event(){
        $id = \request("id");
        $event = Event::where('id',\request("id"))->first();
        view()->share('odf.event',$event);
        $pdf = PDF::loadView('pdf.event',['event'=>$event]);
        return $pdf->download('event_'.$id.'.pdf');

    }
}
