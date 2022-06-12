<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

use stdClass;

class UserController extends Controller
{
        /**
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserStatistices()
    {   
        
        return response()->json([
            'NumberOfUsers' =>$this->getNumberOfUsers() ,
            'NumberOfMaleUsers' =>$this->getNumberOfMaleUsers() ,
            'NumberOfFemaleUsers' =>$this->getNumberOfFemaleUsers() ,
            'NumberOfObeseUsers' =>$this->getNumberOfObeseUsers() ,
            'NumberOfThinUsers' =>$this->getNumberOfThinUsers() ,

        ]);
    }
    public function getNumberOfUsers()
    {
        return User::All()->count();
    }
    public function changeUserRole(Request $req)
    {
        $user=User::where('id',$req->userId)->first();
        $user->roleId=$req->roleId;
        $user->save();
    }
    public function blockUser(Request $req)
    {
        $user=User::where('id',$req->userId)->first();
        $user->isblocked=true;
        $user->save();

    }
    public function unblockUser(Request $req)
    {
        $user=User::where('id',$req->userId)->first();
        $user->isblocked=false;
        $user->save();

    }
    public function getNumberOfMaleUsers()
    {
        return User::where('gender','male')->count();
    }
    public function getNumberOfFemaleUsers()
    {
        return User::where('gender','female')->count();
    }
    public function getNumberOfObeseUsers()
    {
        return User::where('gender','female')->whereRaw('(weight+2)>(45.5+0.9*(height-152))')->count()+
        User::where('gender','male')->whereRaw('(weight+2)>(50+0.9*(height-152))')->count()
        ;
    }
    public function getNumberOfThinUsers()
    {
        return User::where('gender','female')->whereRaw('(weight-2)<(45.5+0.9*(height-152))')->count()+
        User::where('gender','male')->whereRaw('(weight-2)<(50+0.9*(height-152))')->count() ;
    }
    public function getAllUsers(Request $req)
    {
        $users=User::All();
        $search=json_decode($req->searchquery);
        if($search->name!="" && $search->name!=null )
        {
            $users1=$users->filter(function($item) use ($search)
            {
                return str_contains(strtolower($item->fname),strtolower($search->name));
            }
        );
        $users2=$users->filter(function($item)use ($search)
        {
            return str_contains(strtolower($item->lname),strtolower($search->name));
        }
    );

            $users=$users1->merge($users2);
        }

         if($search->phone!="" && $search->phone!=null )
        {
            $users2=$users->filter(function($item) use ($search)
            {
                return str_contains(strtolower($item->phone),strtolower($search->phone));
                
            }

        );
        $users=$users2->merge($users2);

        }
        if($search->id!="" && $search->id!=null )
        {
            $users2=$users->where('id',(int)$search->id);
            $users=$users2->merge($users2);

        }
        if($search->age!="" && $search->age!=null )
        {
            $users2=$users->where('age',(int)$search->age);
            $users=$users2->merge($users2);

        }
        if($search->weight!="" && $search->weight!=null )
        {
            $users2=$users->where('weight',(int)$search->weight);
            $users=$users2->merge($users2);

        }
        if($search->height!="" && $search->height!=null )
        {
            $users2=$users->where('height',(int)$search->height);
            $users=$users2->merge($users2);

        }
        if($search->fat!="" && $search->fat!=null )
        {
            $users2=$users->where('fatpercentage',(int)$search->fat);
            $users=$users2->merge($users2);

        }
        if($search->role!="all" && $search->role!=null )
        {
            $users2=$users->where('roleId',(int)$search->role);
            $users=$users2->merge($users2);

        }
        if($search->gender!="all" && $search->gender!=null )
        {
            $users2=$users->where('gender',$search->gender);
            $users=$users2->merge($users2);

        }
        if($search->isblocked!="all" && $search->isblocked!=null )
        {
            if($search->isblocked=='true')
                $users2=$users->where('isblocked',true);
            else 
                 $users2=$users->where('isblocked',false);

            $users=$users2->merge($users2);

        }
        if($search->sortDir=='ASC')
        {
            $users2=$users->sortBy($search->sortAttr);
            $users=$users2->merge($users2);
        }
        else {
            $users2=$users->sortByDesc($search->sortAttr);
            $users=$users2->merge($users2);        }
        $usersData=$users->map(function ($user)
        {   

            return [
                $user->id ,
                $user->fname ,
                $user->lname ,
                $user->age ,
                $user->phone ,
                $user->height ,
                $user->weight ,
                $user->gender ,
                $user->fatpercentage ,
                (Role::getRoleById($user->roleId)),
                (Activity::getActivityById($user->activityId)),
            ];
        }
    );
        return json_encode($usersData) ;

    }
    public function checkIfHasRole(Request $req)
    {
        $user = User::where('phone', $req->phone)->first();

        if($user)
        {
            if($user->roleId)
            return true ;          
        }
        return false;
         
    }
    public function loginDashBoard(Request $req)
    {
        $user = User::where('phone', $req->phone)->first();

        if($user)
        {
            $user->lastLogin=Carbon::now();
            $token=$user->createToken($req->phone)->plainTextToken;
            return response(['token'=>$token ,'user'=>$user ],201);
        }
         
    }
    public function signup(Request $req)
    {
        $user=new User();
        $user->phone=$req->phone;
        $user->fname=$req->fname;
        $user->lname=$req->lname;
        $user->age=$req->age;
        $user->weight=$req->weight;
        $user->height=$req->height;
        $user->activityId=$req->activityId;
        $user->gender=$req->gender;
        $user->isblocked=false;
        $user->weightGoal=$req->weightGoal;
        if($req->fatpercentage!=0)
            $user->fatpercentage=$req->fatpercentage;
        $user->lastLogin=Carbon::now();

        $user->save();

        $token=$user->createToken($req->phone)->plainTextToken;
        return response(['token'=>$token ,'user'=>$user ],201);
        
         
    }
    public function editPersonalInfo(Request $req)
    {
        $user = User::where('phone', $req->phone)->first();
        if($user)
        {
            $user->fname=$req->fname;
            $user->lname=$req->lname;
            $user->age=$req->age;
            $user->weight=$req->weight;
            $user->height=$req->height;
            $user->activityId=$req->activityId;
            $user->gender=$req->gender;
            $user->weightGoal=$req->weightGoal;
            if($req->fatpercentage!=0)
                     $user->fatpercentage=$req->fatpercentage;
            $user->save();
            $token=$user->createToken($req->phone)->plainTextToken;
            return response(['token'=>$token ,'user'=>$user ],201);
        }
        
         
    }
}
