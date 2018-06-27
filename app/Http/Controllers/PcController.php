<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Computer;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Os;
use App\Models\Place;
use App\Models\Position;
use App\Models\Purpose;
use App\Models\Pc_list;
use App\Vartotojas;


class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

         $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');
         
       $posts = Computer::all();
      // $posts = Computer::all()->paginate(2);
       //$posts = Computer::orderBy('pc_id', 'desc') -> paginate(2);

       $checkbox = Os::find(1);
       
       return $this->main($posts);
        return view('posts.index')
        ->with('posts', $posts)
        ->with('cpu', $cpu)
        ->with('gpu', $gpu)
        ->with('os', $os)
        ->with('place', $place)
        ->with('position', $position)
        ->with('checkbox', $checkbox)
        ->with('purpose', $purpose);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');

        return view('posts.create')->with('cpu', $cpu)->with('gpu', $gpu)->with('os', $os)->with('place', $place)->with('position', $position)->with('purpose', $purpose);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //do a validation here
        $computer = new Computer;
        $computer->pc_id = $request->input('pc_id');
        $computer->pc_name = $request->input('pc_name');
        $computer->cpu_id = $request->input('cpu');
        $computer->os_id = $request->input('os');
        $computer->gpu_id = $request->input('gpu');
        $computer->place_id = $request->input('place');
        $computer->purpose_id = $request->input('purpose');
        $computer->is_added = 0;
         

        $computer->save();
        return  redirect('/computer')->with('success','Kompiuteris prid4tas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Computer::find($id);
         $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');

         
        
      if($post->user_id != NULL)
      {
        //$count = $pc_list->pc_list_id;
        $vart = Vartotojas::find($post->user_id);
      }
      else
      {
          $vart = "";
      }
      
      return view('posts.show')->with('cpu', $cpu)
      ->with('gpu', $gpu)
      ->with('os', $os)->with('place', $place)
      ->with('position', $position)
      ->with('purpose', $purpose)
      ->with('vart', $vart)
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

         $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');

       // return view('posts.create')->with('cpu', $cpu)->with('gpu', $gpu)->with('os', $os)->with('place', $place)->with('position', $position)->with('purpose', $purpose);



         $post = Computer::find($id);
         return view('posts.edit')->with('post', $post)->with('cpu', $cpu)->with('gpu', $gpu)->with('os', $os)->with('place', $place)->with('position', $position)->with('purpose', $purpose);
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
        $computer = Computer::find($id);
        $computer->pc_id = $request->input('pc_id');
        $computer->pc_name = $request->input('pc_name');
        $computer->cpu_id = $request->input('cpu');
        $computer->os_id = $request->input('os');
        $computer->gpu_id = $request->input('gpu');
        $computer->place_id = $request->input('place');
        $computer->purpose_id = $request->input('purpose');
        
         
        //$compiter->cpu_id = $request->
        $computer->save();
        return  redirect('/computer')->with('success','Kompiuteris paredaguotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Computer::find($id);
        $post->delete();
        return  redirect('/computer')->with('success','Kompiuteris ištrintas');
    }

    public function filterOS(Request $request)
    {
       $query = Computer::query();
       $inputs =  array_values ($request->input());
       $checkvalues = array();
            foreach($inputs as $input)
            {
               // $os = Os::where('name', '=', $input)->get();
                $checkvalues[] = Os::where('name', '=', $input)->get();               
            }
              $count = count($checkvalues);
              $i = 1;
              while($count>$i)
              {
                 $query->orWhere('os_id', '=', $checkvalues[$i][0]->id);
                 $i++;
              }
            $post = $query->get();
            return $this->main($post);
             

            
     /*    $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');

       $posts = $query->get();
       $checkbox = Os::find(1);
       
        return view('posts.index')
        ->with('posts', $posts)
        ->with('cpu', $cpu)
        ->with('gpu', $gpu)
        ->with('os', $os)
        ->with('place', $place)
        ->with('position', $position)
        ->with('checkbox', $checkbox)
        ->with('purpose', $purpose);*/
     
           
             
            //return $checkvalues[1][0]->id; //ID of item duh
            // return $checkvalues;
       // return $inputs;
    }
    public function main($posts)
    {
        $cpu = Cpu::pluck('name', 'id');
         $gpu = Gpu::pluck('name', 'id');
         $os = Os::pluck('name', 'id');
         $place = Place::pluck('name', 'id');
         $position = Position::pluck('name', 'id');
         $purpose = Purpose::pluck('name', 'id');

       $checkbox = Os::find(1);
       
        return view('posts.index')
        ->with('posts', $posts)
        ->with('cpu', $cpu)
        ->with('gpu', $gpu)
        ->with('os', $os)
        ->with('place', $place)
        ->with('position', $position)
        ->with('checkbox', $checkbox)
        ->with('purpose', $purpose);
    }
}
