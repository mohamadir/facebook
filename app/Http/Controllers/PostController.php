<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

use DB;


class PostController extends Controller
{
    //
    
    
    
    public function getPosts(Request $request,$user_id){
       $posts = Post::where('user_id',$user_id)->get();

       foreach($posts as $post){
           $count = Comment::where('post_id',$post->id)->count();
           $post['comments_count']= $count;
       }
       
       return response()->json(
           [
            'message' => 'OK',
            'posts' => $posts
            ]
        ,200);  
     }


     public function getAllPosts(Request $request){
       return Post::get();
     }
    public function addPost(Request $request,$user_id){
    
       $post = new Post();

       $post->body = $request->body;
       $post->title = $request->title;
       $post->image = $request->image;
       $post->user_id = $user_id;


       $user = User::find($user_id);
       $user->posts()->save($post);


       return response()->json(
           [
            'message' => 'OK'
            ]
        ,200);



    }

    public function addLike(Request $request,$post_id){
        $post = Post::find($post_id);
        if(!$post){
            return response()->json(
           [
            'message' => 'post not found !'
            ]
        ,404); 
        }

        DB::table('user_post_like')->insert(
            ['user_id' => $request->user_id,
             'post_id' => $post_id]
        );
    }


    public function addComment(Request $request,$post_id){
        $post = Post::find($post_id);
        
        if(!$post){
            return response()->json(['message' => 'post not found !'],404); 
        }
         if(!$request->user_id){
            return response()->json(['message' => 'user not found !'],404); 
        }


        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->post_id = $post_id;
        $comment->body = $request->body;

        $comment->save();

       return response()->json(['message' => 'added successfully'],200); 
    }

    public function getAllComments(Request $request){
        return Comment::get();
    }

     public function getComments(Request $request,$post_id){
        $post = Post::find($post_id);

        if(!$post){
            return response()->json(['message' => 'post not found !'],404); 
        }

        $comments = Comment::where('post_id',$post_id)->get();

        return response()->json([
                'message' => 'OK',
                'comments' => $comments]
        ,200);  
     }


     public function deleteComment(Request $request,$post_id,$comment_id){

        $post = Post::find($post_id);

        if(!$post){
            return response()->json(['message' => 'post not found !'],404); 
        }

        $comments = Comment::where('id',$comment_id)->delete();

        return response()->json([
                'message' => 'Deleted']
            ,200);  
     }




}
