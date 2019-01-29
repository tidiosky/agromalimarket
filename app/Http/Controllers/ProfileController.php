<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/05/2018
 * Time: 12:44
 */

namespace App\Http\Controllers;




use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($name)
    {
        $user = User::where('name', $name)->first();
        if (!$user){
            abort(404,['L\'utilisateur n\'existe pas']);
        }
        $statuses = $user->statuses()->notReply()->get();
        return view('pages.net.profile.index')
            ->with('user',$user)
            ->with('statuses' , $statuses)
            ->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
    }
    public function getEdit()
    {
//        $professions = Profession::orderBy('name','ASC')->get();
        return view('pages.net.profile.edit');
    }

    public function postEdit(Request $request, $name)
    {

        $user = User::where('name', $name)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->shop_name = $request->shop_name;
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->section = $request->section;
        $user->lat = $request->lat;
        $user->lng = $request->lng;
        $user->country = $request->country;
        $user->address = $request->address;
      // $user->avatar = $this->uploadFile($request);
        if ($request->has('avatar')){
            $filename = $request->file('avatar');
            $img_text = $filename->getClientOriginalExtension();
            $new_img_name = rand(123456,999999) . '.' .$img_text;
            $destination_path = public_path('avatar');

//            unlink($destination_path.'/'.$user->filename);
            $filename->move($destination_path,$new_img_name);
            $user->avatar = $new_img_name;

        }
        $datas = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'country' => $request->input('country'),
            'section' => $request->input('section'),
            'phone' => $request->input('phone'),
            'shop_name' => $request->input('shop_name'),
            'address' => $request->input('address'),
            'about' => $request->input('about'),
            //'avatar' => $this->uploadFile($request)

        ];
//        dd(Auth::user()->save($datas));
//       // Auth::user()->update($datas);
        $user->save($datas);
        toastr()->success('Votre profile a ete mis a jour');
        $info = "Votre profile a ete mis a jour";
        return redirect()->back()->with('info', $info);
    }

    public function uploadFile($request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            return $avatar->store('public/avatar');
        }
        return null;
    }
}