<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SimpleXMLElement;


class UserController extends Controller
{
    public function index(Request $request)
    {
        
        $data['user'] = User::paginate(10);
        
        return view('user.list')->with($data);
    }
    public function form(Request $request)
    {
        $id=$request->id;
        $data['user'] = false;
        if($id){     
            $data['user'] = User::find($id);
        }
        
        return view('user.form')->with($data);
    }
    public function submit(Request $request)
    {
        $id = $request->id;
        if(isset($id))
        {
             $request->validate([
            'name' => 'required|max:255|unique:users,name,'.$id,
            'phone' => ['required', 'regex:/^\+\d+$/', 'unique:users,phone,' . $id]
              ]);
              
            $user = User::find($id);
        }
        else
        {
             $request->validate([
            'name' => 'required|max:255|unique:users,name',
            'phone' => ['required', 'regex:/^\+\d+$/', 'unique:users,phone']
             ]);
                 
            $user            = new User();
            $user->created_at          = now();
        }
        
        $user->name          = $request->name;
        $user->phone         = $request->phone;
        $user->updated_at          = now();
        $user->save();
       
        return redirect()->route('contact.list')->with('success', "Contact Saved Successfully");
    }
    public function destroy($id)
    {
             $user = User::find($id);
             $user->delete();
             if($user){
                return redirect()->route('contact.list')->with('success', "Contact Deleted");
             }else{
                return redirect()->route('contact.list')->with('error', "Contact Not Found");
             }
              
    }
    

     public function importform(Request $request)
    {
        return view('user.bulkimport');
    }

     public function importXML(Request $request)
    {

        $request->validate([
             'xml_file' => 'required|file|mimetypes:text/xml,application/xml,text/plain|max:2048',
        ]);

        $xmlFile = $request->file('xml_file');
        $xmlContent = file_get_contents($xmlFile);
        $xml = new SimpleXMLElement($xmlContent);
        $i=0;
        foreach ($xml->contact as $contact) {

            $cophone=str_replace(' ','',$contact->phone);

            $user=User::where('phone',$cophone)->first();
           
            if(!$user){
            User::create([
                'name' => (string) $contact->name,
                'phone' => (string) $contact->phone,
            ]);

            $i++;
          }
        }
        if($i > 0){
           return redirect()->route('contact.list')->with('success', $i.' new Contact(s) Added via xml file.');
        }else{
            return redirect()->route('contact.list')->with('error', 'No new Contact in xml file.');
        }

        
    }
   
}
