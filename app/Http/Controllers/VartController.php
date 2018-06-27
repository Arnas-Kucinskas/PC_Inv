<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vartotojas;
use App\Models\Position;
use App\Computer;
use App\Models\Pc_list;

class VartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    /* if($request->has('sort'))
     {
        if($request->input('sort') == 'asc')
        {
            $posts = Vartotojas::orderBy('name', 'asc') -> get();
            $r = "asc";
        }
        else if($request->input('sort') == 'desc')
        {
           $r = "desc";
            $posts = Vartotojas::orderBy('name', 'desc') -> get();
        }
 
     }
     else
     {
         $posts = Vartotojas::all();
                 $r = "nothin";
     }
     */
        //$posts = new Vartotojas;
        //$posts = Vartotojas::query();
        //$posts = Vartotojas::all();
        //$posts = new Vartotojas();
       // $users = Vartotojas::all()
         //       ->orderBy('name', 'desc')
           //     ->get();
       // if(request()->has('sort'))
       // {
            $r = "sort";
            //$posts = Vartotojas::orderBy('name', request('sort')) -> get();
        $posts = Vartotojas::query();


/*if (request()->has('sort'))
       {
           if(request('sort') == 'desc')
           {
            $adval = 'asc';
           }
           else
           {
            $adval = 'desc';
           }
       }*/

        //$posts = $posts->orderBy('last_name', 'asc');
        $adval='desc';
        if (request()->has('sort'))
        {
            $adval=Vartotojas::AscOrDesc(request('sort'));
            $posts = $posts->
            orderBy('name', $adval);
        }
        if (request()->has('sortl'))
        {
            $adval=Vartotojas::AscOrDesc(request('sortl'));
            $posts = $posts->orderBy('last_name', $adval);
        }

        if (request()->has('position'))
         {
            $posts = $posts->where('positon_id', '=', request('position'));
         }

          if (request()->has('sortEmail'))
         {
            $posts = $posts->orderBy('email', request('sortEmail'));
         }

            $posts = $posts->paginate(50)->appends([
                'sort' => request('sort'),
                'sortl' => request('sortl'),
                'position' => request('position'),
                'sortEmail' => request('sortEmail')
            ]);
        //} 
   
       //$adval = 'asc';

       
      //   $r = "nothin";
       // $posts = Vartotojas::all();//   
        // $posts = Vartotojas::getAll()->paginate(2);
        $computer = Computer::pluck('pc_id','id');
        $position = Position::pluck('name', 'id');
        return view('vartotojas.index_vart')
        ->with('computer', $computer)
        ->with('position', $position)
        ->with('request', $request)
        ->with('posts', $posts)
        ->with('adval', $adval);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        $computer = Computer::pluck('pc_id', 'id');
        $position = Position::pluck('name', 'id');
        return view('vartotojas.create_vart')->with('position', $position)->with('computer', $computer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $vartotojas = new Vartotojas;
        $vartotojas->id;
        $vartotojas->name = $request->input('name');
        $vartotojas->last_name = $request->input('last_name');
        $vartotojas->email = $request->input('email');
        $vartotojas->phone_nr = $request->input('phone');
        $vartotojas->positon_id = $request->input('position');
        $vartotojas->save();

        /*//$pc_list = Pc_List::find($id);
        //$pc_list = new Pc_List;
        $pc_list->pc_id = $request->input('computer');
        $pc_list->pc_list_id = $vartotojas->id ;
        //$pc_list->save();

        //$vartotojas->pc_list_id = $pc_list->pc_list_id;
        $pc_list->save();
        $vartotojas->save();*/
       
//$vartotojas->pc_list_id = $request->input('computer');

        return  redirect('/vart')->with('success','Vartotojas prid4tas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Vartotojas::find($id);
      $position = Position::pluck('name', 'id');
      //$pc_list = Pc_List::where('pc_list_id', $id)->get();
      $pc_list = Computer::where('user_id', $id)->get();

      $comp = Computer::where('is_added', '=', 0)->get();
      $computer = $comp->pluck('pc_id', 'id');
      $all_computers = Computer::pluck('pc_id', 'id'); 

      return view('vartotojas.show_vart')
      ->with('computer', $computer)
      ->with('position',$position)
      ->with('pc_list', $pc_list)
      ->with('all_computers', $all_computers)
      ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$computer = Computer::pluck('pc_id', 'id');
        $position = Position::pluck('name', 'id');
        $post = Vartotojas::find($id);

        //$pc_list = Pc_List::where('pc_list_id', $id)->get();
        $pc_list = Computer::where('user_id', $id)->get();

        $comp = Computer::where('is_added', '=', 0)->get();
        $computer = $comp->pluck('pc_id', 'id');
        //$all_computers = Computer::pluck('pc_id', 'id');
       
        //>where('votes', '=', 100)->get();
        //$computer = Computer::pluck('pc_id', 'id');
        return view('vartotojas.edit_vart')
        ->with('post', $post)
        ->with('position', $position)
        ->with('computer', $computer)
        ->with('pc_list', $pc_list);
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
        $vartotojas = Vartotojas::find($id);
        $vartotojas->id;
        $vartotojas->name = $request->input('name');
        $vartotojas->last_name = $request->input('last_name');
        $vartotojas->email = $request->input('email');
        $vartotojas->phone_nr = $request->input('phone');
        $vartotojas->positon_id = $request->input('position');
        $vartotojas->pc_list_id = $id;
        //$vartotojas->save();

        //$pc_list = Pc_List::find($id);
        //$pc_list->pc_id = $request->input('computer');
       

        $vartotojas->save();
       
//$vartotojas->pc_list_id = $request->input('computer');

        //return  redirect('/vart')->with('success','Vartotojas prid4tas');
        return redirect()->back()->with('success','Vartotojas atnaujintas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        
        $pcs = Computer::where('user_id', '=', $id)->get();

        foreach($pcs as $pc)
        {
            
            //$comp = Computer::find($pc->pc_id);
            //$comp->is_added=0;
            //$comp->save();
            $pc->is_added=0;
            $pc->user_id=NULL;
            $pc->save();
        }
        
        $post = Vartotojas::find($id);
        $post->delete();

        
       // return  redirect('/vart')->with('success','Vartotojas ištrintas');
        return redirect()->back()->with('success','Vartotojas ištrintas');
        
    }
}
