<?php
namespace App\Helper; // Your helpers namespace

//use

use Auth;
class helper
{
    /* public static function getUser(int $userid): ?object
    {
        return User::find($id);
    }
    public static function getCurrentUser(): ?object
    {
         return Auth::user();
    }
    public static function getUserCompany(): ?object
    {
        $companyId = Auth::user()->comp_id;
        return Company::find($companyId);
    } */

    public function test(){
        echo Auth::user()->username;
    }
}
