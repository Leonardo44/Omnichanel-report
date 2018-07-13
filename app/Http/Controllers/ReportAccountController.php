<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon as Carbon;
use Excel;

class ReportAccountController extends Controller
{
    public function showTicketInterfacePDF(Request $request){//Cantidad de tickets por interfaz - PDF
        $pdf = PDF::loadView('report.account.ticket_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Tickets_Interfaz.pdf");
    }

    public function showTicketInterfaceExcel(Request $request){//Cantidad de tickets por interfaz - EXCEL
        $data = json_decode($request->input('data'), 1);
        
        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface["name"]);
            array_push($header, $interface["name"]);
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
        $pdf = PDF::loadView('report.account.average_messages', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Promedio_Mensajes_Ticket_Interfaz.pdf");
    }

    public function showAverageMessagesExcel(Request $request){ //Promedio de Mensajes por Tikect por Interfaz -EXCEL
        $data = json_decode($request->input('data'), 1);
        
        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface["name"]);
            array_push($header, $interface["name"]);
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

    public function showCantTicketsClientPDF(Request $request){
        $pdf = PDF::loadView('report.account.cant_tickets_client', ['data' => json_decode($request->input('data'), 1)]);
        return $pdf->download("Cantidad_de_Tickets_por_Cliente.pdf");
    }

    public function showCantTicketsClientExcel(Request $request){
        $data = json_decode($request->input('data'), 1);

        Excel::create('Cantidad_Ticket_Cliente', function($excel) use ($data){
            $excel->sheet('Datos', function($sheet) use ($data){
                $sheet->row(1, ['Cliente [Interfaz]', 'Cantidad de Tickets']);
                foreach($data["data"] as $value){
                    $sheet->appendRow(['', $value["date"]]);
                    foreach($value["clients"] as $client){
                        $sheet->appendRow([$client["name"], $client["cant"]]);
                    }
                }
            });
        })->export('xls');
    }// Fin showCantTicketsClientExcel

    public function showAvgTicketsInterfacePDF(Request $request){
        $pdf = PDF::loadView('report.account.avg_tickets_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Promedio_de_Duracion_de_Tickets_Interfaz.pdf');
    }

    public function showAvgTicketsInterfaceExcel(Request $request){
        $data = json_decode($request->input('data'), 1);

        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface["name"]);
            array_push($header, $interface["name"]);
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

    public function showTopClientsPDF(Request $request){
        $pdf = PDF::loadView('report.account.top_clients', ['data' => json_decode($request->input('data'), 1)]);
        return $pdf->download('top_clientes.pdf');
    }

    public function showTopClientsExcel(Request $request){
        $data = json_decode($request->input('data'), 1);   
        
        Excel::create('Top_Clientes', function($excel) use ($data){
            $excel->sheet('Datos', function($sheet) use ($data){
                $sheet->row(1, ['Cliente [Interfaz]', 'Cantidad de Tickets']);
                foreach($data["data"] as $value){
                    $sheet->appendRow(['', $value["date"]]);
                    foreach($value["clients"] as $client){
                        $sheet->appendRow([$client["name"], $client["cant"]]);
                    }
                }
            });
        })->export('xls');
    }// Fin showTopClientsExcel

    public function showTopAgentsPDF(Request $request){
        $pdf = PDF::loadView('report.account.top_agents', ['data' => json_decode($request->input('data'), 1)]);
        return $pdf->download('top_agentes.pdf');
    }

    public function showTopAgentsExcel(Request $request){
        $data = json_decode($request->input('data'), 1);   
        
        Excel::create('Top_Agents', function($excel) use ($data){
            $excel->sheet('Datos', function($sheet) use ($data){
                $sheet->row(1, ['Agente [Username]', 'Cantidad de Tickets', 'Duración']);
                foreach($data["data"] as $value){
                    $sheet->appendRow(['', $value["date"]]);
                    foreach($value["agents"] as $agent){
                        $sheet->appendRow([$agent["username"], $agent["cant"], $agent["duration"]]);
                    }
                }
            });
        })->export('xls');
    }// Fin showTopAgentsExcel

    public function showAvgResponseInterfacePDF(Request $request){
        $pdf = PDF::loadView('report.account.avg_response_interface', ['data' => json_decode($request->input('data'), 1)]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('promedio_respuesta_ticket.pdf');
    }

    public function showAvgResponseInterfaceExcel(Request $request){
        $data = json_decode($request->input('data'), 1);  

        $interfaces = [];
        $header = ["Fecha"];
        foreach($data["interfaces"] as $interface){
            array_push($interfaces, $interface["name"]);
            array_push($header, $interface["name"]);
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
