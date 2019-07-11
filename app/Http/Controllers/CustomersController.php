<?php

namespace App\Http\Controllers;

use App\Campany;
use App\Customer;
use App\Events\NewCustomerRegistaerEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $activeCustomers = Customer::active()->get();
//        $inactiveCustomers = Customer::inactive()->get();
          $customers =Customer::with('company')->paginate(20);
         return view('customers.index',compact('customers'));
    }
    public function create()
    {
        $companies = Campany::all();
        $customer = new Customer();
        return view('customers.create',compact('companies','customer'));
    }
    public function store()
    {
        $this->authorize('create',Customer::class);

        $customer = Customer::create($this->validateRequest());

       $this->storeImage($customer);
       event(new NewCustomerRegistaerEvent($customer));
       Mail::to($customer->email)->send(new  WelcomeNewUserMail());

//        session()->flash('message','successfully created ! ');
//        dd(request()->$customer);
        return redirect('customers');
    }
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Campany::all();
        return view('customers.edit',compact('customer','companies'));

    }
    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        $this->storeImage($customer);
        return redirect('customers/'.$customer->id);

    }
    public function destroy(Customer $customer)
    {
        $this->authorize('delete',$customer);
        $customer ->delete();
        session()->flash('message','successfully deleted  ! ');

        return redirect()->route('customers.index');
    }
    private function validateRequest()
    {
        return request()->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'active'=>'required',
            'company_id'=>'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);


    }

    private function storeImage($customer)
    {
         // after we storage the images we must create the link by storage:link
        if(request()->has('image')){
            $customer->update([
                'image' =>request()->image->store('uploads','public'),
            ]);

            // we can use crop and fit for image
            $image = Image::make(public_path('storage/'. $customer->image))->fit(300,300);
            $image->save();
        }
    }


}
