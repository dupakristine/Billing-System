<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index($search = '') {
        $clients = Client::where('name', 'like', "%$search%")->get();
        $clientCount = count($clients);

        return inertia('Clients/Index', [
            'clients' => fn() => Client::where('name', 'like', "%$search%")->get(),
            'clientCount' => $clientCount,
        ]);
    }


    public function show(Client $client) {
        return inertia('Clients/Show', compact('client'));
    }

    public function toggle(Client $client) {
        $client->enabled = !$client->enabled;
        $client->save();
        return back();
    }

    public function edit(Client $client) {
        return inertia('Clients/Edit', compact('client'));
    }

    public function update(Client $client, Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'balance' => 'string|required',
            'credit_limit' => 'string|nullable',
            'subscription_plan' => 'string|nullable',
            'subscription_expiry_date' => 'nullable',
            'notes' => 'string|nullable',
        ]);

        $fields = $request->all();

        if ($request->hasFile('pic')) {
            // If a new image is uploaded, update the 'pic' attribute
            $fileName = time() . '.' . $request->file('pic')->extension();
            $request->file('pic')->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        } else {
            // If no new image is uploaded, keep the existing 'pic' attribute
            $fields['pic'] = $client->pic;
        }

        // Update the existing $client instance with the new fields
        $client->update($fields);

        return redirect('/clients/' . $client->id)->with('info', 'A new customer has been updated');
    }


    public function destroy(Client $client) {
        $client->delete();
        return redirect('/clients')->with('error', 'A new customer has been deleted');
    }

    public function create() {
        return inertia('Clients/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'balance' => 'string|required',
            'credit_limit' => 'string|nullable',
            'subscription_plan' => 'string|nullable',
            'subscription_expiry_date' => 'nullable',
            'notes' => 'string|nullable',
        ]);

        $fields = $request->all();


        $fileName = null;

        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        }


        $c = Client::create($fields);

        return redirect('/clients/' . $c->id)->with('info', 'A new customer has been created');
    }


    public function pdf(Client $client) {
        $pdf = Pdf::loadView('pdf.client',[
            'client' => $client
        ]);

        return $pdf->stream();
    }


    public function email(Client $client) {
        $pdf = Pdf::loadView('pdf.client', [
            'client' => $client
        ]);

        $filename = 'statements/' . $client->last_name . "_" . $client->id . ".pdf";
        $pdf->save($filename);



        Mail::send('email.soa', ['client'=>$client], function($message) use ($client, $filename){
            $message->to($client->email);
            $message->subject('Statement of Account');
            $message->attach($filename);
        });

        return back()->with('info', 'Email has been sent');
      }
}
