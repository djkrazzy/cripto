<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Mail\TransaccionRecibidaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function retirarDeposito(Request $request)
    {

        
        $request->validate([
            'monto'=>'required',
           
        ]);

        $recibida= new TransaccionRecibidaMailable($request->all());
        //return $request->all();
      
       $transacion= Transaccion::create($request->all()) ;
      
       
       
        Mail::to(Auth::user()->email)->send($recibida) ;

       return redirect()->route('user.usertransacciones.index')->with('info', 'Informacion enviada con éxito');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Transaccion::findOrFail($id);
            return response()->json($data);
        }
        return 'transaciones edit control';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getNotificationsData(Request $request)
{


    $consulta= Transaccion::where('status','pendiente')->get();

    $users = DB::table('referencias')->where([
        ['photo_dpi_front', '!=', NULL],
        ['photo_dpi_back', '!=', NULL],
    ])->get();


   
    // For the sake of simplicity, assume we have a variable called
    // $notifications with the unread notifications. Each notification
    // have the next properties:
    // icon: An icon for the notification.
    // text: A text for the notification.
    // time: The time since notification was created on the server.
    // At next, we define a hardcoded variable with the explained format,
    // but you can assume this data comes from a database query.

    $notifications = [
        [
            'icon' => 'fas fa-fw fa-envelope',
            'text' => count($consulta) . 'Transacciones',
            'time' => rand(0, 10) . ' minutes',
        ],
        [
            'icon' => 'fas fa-fw fa-users text-primary',
            'text' => count($users) . ' friend requests',
            'time' => count($users) . ' minutes',
        ],
        [
            'icon' => 'fas fa-fw fa-file text-danger',
            'text' => rand(0, 10) . ' new reports',
            'time' => rand(0, 60) . ' minutes',
        ],
    ];

    // Now, we create the notification dropdown main content.

    $dropdownHtml = '';

    $total=count($users)+count($consulta);

    $dropdownHtml .= "<a href='#' class='dropdown-item'>
    <i class='mr-2 fas fa-fw fa-file text-danger'>".count($consulta)."</i>Transacciones
  </a>";

  $dropdownHtml .= "<a href='/admin' class='dropdown-item'>
  <i class='mr-2 fas fa-fw fa-file text-danger'> ".count($users)."</i>DPIS
</a>";

    // Return the new notification data.
    
    return [
        'label'       => $total,
        'label_color' => 'danger',
        'icon_color'  => 'dark',
        'dropdown'    => $dropdownHtml,
    ];
}
}
