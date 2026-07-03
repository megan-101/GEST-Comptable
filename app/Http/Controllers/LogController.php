<?php

namespace App\Http\Controllers;
use App\Interfaces\LogInterface;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller{

    protected LogInterface $logInterface;


 public function __construct(LogInterface $logInterface) {
        $this->logInterface = $logInterface;
 }
        
    public function index(){

    try{
            $log = $this->logInterface->All();

            if($log === null){

            $logs = Log::all();
                $this->logInterface->All([
                    'modele' => 'Log',
                    'action' => 'Tentative de Lister Tous les Logs',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue',
                    'ip_address' => request()->ip(),
                ]);
            }
            else{
                $this->logInterface->save([
                    'modele' => 'Log',
                    'action' => 'Lister Tous les Logs',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les Logs ont ete affcihé avec succes',
                    'ip_address' => request()->ip(),
                ]);

        return view('logs.liste', compact('logs'));
            }
        }catch(Exception $e){
            $this->logInterface->save([
                'modele' => 'Logs',
                'action' => 'Tentative de Lister Tous les Logs',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
        
        
        return view('logs.liste', compact('logs'));
    }
    public function read($id){
        try{
               $log = Log::findOrFail($id);

    if($log === null){
                $this->logInterface->save([
                    'modele' => 'Log',
                    'action' => 'Tentative de Lister Tous les Logs',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue',
                    'ip_address' => request()->ip(),
                ]);
            }
            else{
                $this->logInterface->save([
                    'modele' => 'Log',
                    'action' => 'Lister Tous les Logs',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les Logs ont ete affcihé avec succes',
                    'ip_address' => request()->ip(),
                ]);

        return view('logs.read', compact('log'));
            }
        }catch(Exception $e){
            $this->logInterface->read([
                'modele' => 'Logs',
                'action' => 'Tentative de Lister Tous les Logs',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
        }


}
    

