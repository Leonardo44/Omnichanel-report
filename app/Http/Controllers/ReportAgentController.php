<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon as Carbon;
use Excel;

class ReportAgentController extends Controller
{
    public function showTicketInterfacePDF(Request $request){//Cantidad de tickets por interfaz - PDF
        $pdf = PDF::loadView('report.agent.ticket_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Tickets_Interfaz.pdf");
    }

    public function showTicketInterfaceExcel(Request $request){//Cantidad de tickets por interfaz - EXCEL
        $data = json_decode($request->input('data'), 1);
        
        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface);
            array_push($header, $interface);
        }

        Excel::create('Cantidad_Ticker_Interfaz', function($excel) use ($data, $interfaces, $header) {
            $excel->sheet('Datos', function($sheet) use ($data, $interfaces, $header){
                $sheet->row(1, $header); //Se agrega la fila de cabecera
                foreach($data["data"] as $value){//Data [Fecha + interfaces]
                    $row = [$value["date"]];
                    foreach($interfaces as $interface){
                        array_push($row, $value[$interface]);
                    }
                    $sheet->appendRow($row); 
                }
            });
        })->export('xls');
    }//Fin function showTicketInterfaceExcel()

    public function showAverageMessagesPDF(Request $request){ //Promedio de Mensajes por Ticket por Interfaz - PDF
        $pdf = PDF::loadView('report.agent.average_messages', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Promedio_Mensajes_Ticket_Interfaz.pdf");
    }

    public function showAverageMessagesExcel(Request $request){ //Promedio de Mensajes por Tikect por Interfaz -EXCEL
        $data = json_decode($request->input('data'), 1);
        
        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface);
            array_push($header, $interface);
        }

        Excel::create('Cantidad_Ticket_Interfaz', function($excel) use ($data, $interfaces, $header) {
            $excel->sheet('Datos', function($sheet) use ($data, $interfaces, $header){
                $sheet->row(1, $header); //Se agrega la fila de cabecera
                foreach($data["data"] as $value){//Data [Fecha + interfaces]
                    $row = [$value["date"]];
                    foreach($interfaces as $interface){
                        array_push($row, $value[$interface]);
                    }
                    $sheet->appendRow($row); 
                }
            });
        })->export('xls');
    }//Fin showAverageMessagesExcel

    public function showAvgTicketsInterfacePDF(Request $request){
        $pdf = PDF::loadView('report.agent.avg_tickets_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Promedio_de_Duracion_de_Tickets_Interfaz.pdf');
    }

    public function showAvgTicketsInterfaceExcel(Request $request){
        $data = json_decode($request->input('data'), 1);

        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface);
            array_push($header, $interface);
        }

        Excel::create('Promedio_de_Duracion_de_Tickets_Interfaz', function($excel) use ($data, $interfaces, $header) {
            $excel->sheet('Datos', function($sheet) use ($data, $interfaces, $header){
                $sheet->row(1, $header); //Se agrega la fila de cabecera
                foreach($data["data"] as $value){//Data [Fecha + interfaces]
                    $row = [$value["date"]];
                    foreach($interfaces as $interface){
                        array_push($row, $value[$interface]);
                    }
                    $sheet->appendRow($row); 
                }
            });
        })->export('xls');
    }// Fin showAvgTicketsInterfaceExcel

    public function showAvgResponseInterfacePDF(Request $request){
        $pdf = PDF::loadView('report.agent.avg_response_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('promedio_respuesta_ticket.pdf');
    }

    public function showAvgResponseInterfaceExcel(Request $request){
        $data = json_decode($request->input('data'), 1);  

        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface);
            array_push($header, $interface);
        }

        Excel::create('Promedio_Respuesta_Interfaz', function($excel) use ($data, $interfaces, $header) {
            $excel->sheet('Datos', function($sheet) use ($data, $interfaces, $header){
                $sheet->row(1, $header); //Se agrega la fila de cabecera
                foreach($data["data"] as $value){//Data [Fecha + interfaces]
                    $row = [$value["date"]];
                    foreach($interfaces as $interface){
                        array_push($row, $value[$interface]);
                    }
                    $sheet->appendRow($row); 
                }
            });
        })->export('xls');
    }// Fin showAvgResponseInterfaceExcel
}
