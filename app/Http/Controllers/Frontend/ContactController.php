<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Sodo;

use Helper, File, Session, Auth;

class ContactController extends Controller
{ 
   
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                       
            'email' => 'email|required',
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required'         
        ],
        [            
            'full_name.required' => 'Bạn chưa nhập họ và tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'address.required' => 'Bạn chưa nhập nội dung.'            
        ]);       

        $rs = Contact::create($dataArr);

        Session::flash('message', 'Gửi liên hệ thành công.');

        return redirect()->route('home');
    }

    public function storeSodo(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                       
            
            'full_name' => 'required',           
            'phone' => 'required',  
            'email' => 'email|required',      
        ],
        [            
            'full_name.required' => 'Bạn chưa nhập họ và tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
        ]);       

        $rs = Sodo::create($dataArr);

        Session::flash('message', 'Gửi số đo thành công.');

        return redirect()->route('hd-sodo');
    }
    
}
