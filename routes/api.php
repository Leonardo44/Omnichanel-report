<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
	Reportes por cuenta
*/

// Cantidad de ticket por interfaz - pdf
Route::post('/account/ticket_interface/pdf', 'ReportAccountController@showTicketInterfacePDF');
// Cantidad de ticket por interfaz - excel
Route::post('/account/ticket_interface/excel', 'ReportAccountController@showTicketInterfaceExcel');
// Promedio de mensajes por ticket por interfaz - pdf
Route::post('/account/averages_messages/pdf', 'ReportAccountController@showAverageMessagesPDF');
// Promedio de mensajes por ticket por interfaz - excel
Route::post('/account/averages_messages/excel', 'ReportAccountController@showAverageMessagesExcel');
// Número de tickets por cliente - pdf
Route::post('/account/tickets_client/pdf', 'ReportAccountController@showCantTicketsClientPDF');
// Número de tickets por cliente - excel
Route::post('/account/tickets_client/excel', 'ReportAccountController@showCantTicketsClientExcel');
// Promedio de duración de tickets por interfaz - pdf
Route::post('/account/avg_duration_tickets_interface/pdf', 'ReportAccountController@showAvgTicketsInterfacePDF');
// Promedio de duración de tickets por interfaz - excel
Route::post('/account/avg_duration_tickets_interface/excel', 'ReportAccountController@showAvgTicketsInterfaceExcel');
// Promedio de tiempo de respuesta por interfaz - pdf
Route::post('/account/avg_response_interface/pdf', 'ReportAccountController@showAvgResponseInterfacePDF');
// Promedio de tiempo de respuesta por interfaz - excel
Route::post('/account/avg_response_interface/excel', 'ReportAccountController@showAvgResponseInterfaceExcel');
// Top 10 clientes - pdf
Route::post('/account/top_clients/pdf', 'ReportAccountController@showTopClientsPDF');
// Top 10 clientes - excel
Route::post('/account/top_clients/excel', 'ReportAccountController@showTopClientsExcel');
// Top 10 agentes - pdf
Route::post('/account/top_agents/pdf', 'ReportAccountController@showTopAgentsPDF');
// Top 10 agentes - excel
Route::post('/account/top_agents/excel', 'ReportAccountController@showTopAgentsExcel');

/*
	Reportes por agente
*/

// Cantidad de ticket por interfaz - pdf
Route::post('/agent/ticket_interface/pdf', 'ReportAgentController@showTicketInterfacePDF');
// Cantidad de ticket por interfaz - excel
Route::post('/agent/ticket_interface/excel', 'ReportAgentController@showTicketInterfaceExcel');
// Promedio de mensajes por ticket por interfaz - pdf
Route::post('/agent/averages_messages/pdf', 'ReportAgentController@showAverageMessagesPDF');
// Promedio de mensajes por ticket por interfaz - excel
Route::post('/agent/averages_messages/excel', 'ReportAgentController@showAverageMessagesExcel');
// Promedio de duración de ticket por interfaz - pdf
Route::post('/agent/avg_duration_tickets_interface/pdf', 'ReportAgentController@showAvgTicketsInterfacePDF');
// Promedio de duración de ticket por interfaz - excel
Route::post('/agent/avg_duration_tickets_interface/excel', 'ReportAgentController@showAvgTicketsInterfaceExcel');
// Promedio de respuesta por interfaz - pdf
Route::post('/agent/avg_response_interface/pdf', 'ReportAgentController@showAvgResponseInterfacePDF');
// Promedio de respuesta por interfaz - excel
Route::post('/agent/avg_response_interface/excel', 'ReportAgentController@showAvgResponseInterfaceExcel');