<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vartotojas;
use App\Models\Position;
use App\Computer;
use App\Models\Pc_list;

class PcListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
         $compVal = $request->input('computer');
         $computer = Computer::find($compVal);
         if($compVal != "" && $computer->is_added == 0 )
         { 
             $computer->user_id=$id;
           /* $pc_list = new Pc_List;
            $pc_list->pc_id = $request->input('computer');
            $pc_list->pc_list_id = $id ;
            $pc_list->save();*/

            $computer->is_added = 1;
            $computer->save();
            
          /*  $vart = Vartotojas::find($id);
                if($vart->pc_list_id == "")
                {
                    $vart->pc_list_id = $id;
                    $vart->save();
                 }*/

       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $post = Pc_List::find($id);
         $computer = Computer::find($id);
         $computer->is_added = 0;
         $computer->user_id=NULL;
        // $post->delete();
         $computer->save();


       /* $test = Pc_List::where('pc_list_id', '=' ,$post->pc_list_id)->get();
             if(count($test) > 0)
             { 
                  $vart = Vartotojas::find($post->pc_list_id);
                  $vart->pc_list_id = $post->pc_list_id;
                  $vart->save();
             }*/
             
             return  redirect('/vart')->with('success', 'qw');
       // return  redirect('/vart')->with('success','Kompiuteris panaikintas nuo vartotojo');
    }
}
