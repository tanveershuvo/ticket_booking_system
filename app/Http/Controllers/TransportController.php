<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.allTransports')->with('transports',Transport::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addTransports');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type' => 'required|string',
            'ac/non-ac' => 'required|integer',
        ]);

        $transport = new Transport;
        $transport->transport_type = $request['type'];
        $transport->ac_type = $request['ac/non-ac'];

        $trans_details = Transport::where('transport_type',$request['type'])
                        ->where('ac_type',$request['ac/non-ac'])
                        ->count();
        // dd($trans_details);
        if ($trans_details) {
            if ($request['ac/non-ac'] == 1) {
                return redirect()->back()->withInfoMessage('Transport Type: '.$request['type']. ' AC/NON-AC : AC has already added. Try another one.');
            }else {
                return redirect()->back()->withInfoMessage('Transport Type: '.$request['type']. ' AC/NON-AC : NON-AC has already added. Try another one.');
            }
        }else {
            $transport->save();
            return redirect()->back()->withSuccessMessage('Transport Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'type' => 'required|string',
            'ac_type' => 'required|integer',
        ]);
        $update_transport = Transport::find($id);
        $update_transport->transport_type = $request['type'];
        $update_transport->ac_type = $request['ac_type'];

        $trans_details = Transport::where('transport_type',$request['type'])
                        ->where('ac_type',$request['ac_type'])
                        ->count();
        if ($trans_details) {
            return redirect()->back()->withInfoMessage('Requested data have been matched with existing entry.. Make changes on your update data.');
        }else {
            $update_transport->save();
            return redirect()->back()->withSuccessMessage('Transport Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_transport = Transport::find($id);
        $delete_transport->delete();
        return redirect()->back()->withSuccessMessage('Transport Deleted Successfully');
    }

}
