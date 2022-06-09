<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\PostalService;
use Exception;
use Illuminate\Http\Request;

class PostalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $successStatus = 200;
    private $errorStatus = 500;
    public function index()
    {
       
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
       
        try {
            $data= PostalService::with('federal_entity')->with('settlements')->with('municipality')->where('zip_code',$id)->get();
            return response()->json(['status' => true, 'data' => $data], $this->successStatus);
        } catch (Exception $e) {

            return response()->json(['status' => false, 'error' => 'Algo a sucedido por favor intente después de unos minutos', 'message' => $e->getMessage()], $this->errorStatus);
        }
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
}
