<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class UserController extends Controller
{
    //
    public function getUser(){
        $user = DB::table('users')->get();
        return response()->json($user);

    }

    public function DeleteId($id){
        $user = DB::table('users')->where('id',$id)->delete();
         return response()->json([
            "status"=>200,
            "message"=>"done"
        ],200);
    }
    public function createUser(Request $request){
        $user = DB::table('users')->insert([
           "Name"=>$request->input('Name'),
           "Password"=>$request->input('Password'),
           "email"=>$request->input('email'),
        ]);
        if($user){
            $data = DB::table('users')->get()->last(); 
        return response()->json([
            "status"=>200,
            "data"=>$data
        ],200);
        }
        
        else return response()->json([
            "status"=>404,
            "message"=>"Create failed"
        ],404);
    
    }

    public function updateUser(Request $request,$id){
        $jsonData = [
            "Name"=>$request->input('Name'),
            "Password"=>$request->input('Password'),
            "email"=>$request->input('email'),
        ];
        
        $user = DB::table('users')->where([
            "id"=>$id
        ])->update($jsonData);
        
        if($user){
            
        return response()->json([
            "status"=>200,
            "data"=>$jsonData
        ],200);
        }
        
        else return response()->json([
            "status"=>404,
            "message"=>"Create failed"
        ],404);
    
    }

    public function createCustomer(Request $request){
        $user = DB::table('customers')->insert(
            [
                'FullName'=>$request->input('FullName'),
                'Year'=>$request->input('Year'),
                'Address'=>$request->input('Address'),
                'Phone'=>$request->input('Phone'),
            ]
            );
            if($user){
                $data= DB::table('customers')->get()->last();
                return response()->json([
                    "status" => 200,
                    "data" =>$data,
                ],200);
            }
            else return response()->json([
                "status" => 404,
                "message" =>"Create failed",
            ],400);

    }
    public function updateCustomer(Request $request,$id){
        $jsonData = [
            "fullName"=>$request->input('FullName'),
            "Year"=>$request->input('Year'),
            "Address"=>$request->input('Address'),
            "Phone"=>$request->input('Phone'),

        ];
        
        $user = DB::table('customers')->where([
            "id"=>$id
        ])->update($jsonData);

        if($user){
            
        return response()->json([
            "status"=>200,
            "data"=>$jsonData
        ],200);
        }
        else return response()->json([
            "status"=>404,
            "message"=>"Create failed"
        ],404);
    
    }
    // thêm danh mục ban đầu 
    public function createCAtegory(Request $request){
        $json = [[
                 "id"=>"1",
                 "Name"=>"Bếp Điện",
            ],
            [
                  "id"=>"2",
                  "Name"=>"Máy Hút Bụi",
            ],
            [
                    "id"=>"3",
                    "Name"=>"Máy Hút",
            ],
            [
                "id"=>"4",
                "Name"=>"Máy Xay-Máy Ép",
            ]

            ];
        $user = DB::table("Categories")->insert($json);
        if($user){
            $data= DB::table('Categories')->get();
            return response()->json([
                "status" => 200,
                "data" =>$data,
            ],200);
        }
        else return response()->json([
            "status" => 404,
            "message" =>"Create failed",
        ],400);
    } 

    // thêm danh mục 
    public function AddCreateCAtegory(Request $request){
        $json = [
            "Name"=>$request->input("Name"),
            ];
        $user = DB::table("categories")->insert($json);
        if($user){
            $data= DB::table('categories')->get()->last();
            return response()->json([
                "status" => 200,
                "data" =>$data,
            ],200);
        }
        else return response()->json([
            "status" => 404,
            "message" =>"Create failed",
        ],400);
    } 
    public function DeleteCategory($id){
        $user = DB::table('categories')->where('id',$id)->delete();
         return response()->json([
            "status"=>200,
            "message"=>"done"
        ],200);
    }

    public function GetCategory(){
        $Category = DB::table('categories')->get();
        return response()->json($Category);
    }

    public function UpdateCategory(Request $request,$id){
        $json=[
            "Name"=>$request->input("Name"),
        ];
        $Category = DB::table('categories')->where([
            "id"=>$id,
        ])->update($json);
        if($Category){
            
            return response()->json([
                "status"=>200,
                "data"=>$json
            ],200);
            }
            
            else return response()->json([
                "status"=>404,
                "message"=>"Create failed"
            ],404);
    }
    public function GetProduct(){
        $product = DB::table('products')->get();
        return response()->json($product);
    }

    public function AddProduct(Request $request){
        $json = [
            "Name"=>$request->input("Name"),
            "Price"=>$request->input("Price"),
            "Details"=>$request->input("Details"),
            "Category_id"=>$request->input("Category_id"),
        ];
        $product = DB::table("products")->insert($json);
        if($product){
            $data = DB::table("products")->get()->last();
            return response()->json([
                "status" => 200,
                "data" => $data
            ],200);}
        else return response()->json([
            "status" => 404,
            "message" => "error",
        ]);
        }
        public function GetProductCategory($CategoryId){
            $Product = DB::table("products")->where('Category_Id',$CategoryId)->get();
            return response()->json($Product);
        }
    }

    
