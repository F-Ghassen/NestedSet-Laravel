<?php

namespace App\Http\Controllers;

use App\Models\ArticleRelation;
use Illuminate\Http\Request;

class ArticleRelationController extends Controller
{
    public function createNode(Request $request) {
        $relation_id = $request->input('relation_id');
        $relation_type = $request->input('relation_type');
        $attributes = ['relation_id'=>$relation_id, 'relation_type'=>$relation_type];
        $node = ArticleRelation::create($attributes);
        $node->save();
        return response([
            'msg' => $node
        ],201);
    }

    public function makeRoot(Request $request, $id){
        $node = ArticleRelation::find($id);
        if ($node) {
            $node->makeRoot()->save();
        }
        return response([
            'msg' => $node
        ],201);
    }

    public function appendNode(Request $request){
        $node_id = $request->input('node_id');
        $parent_id = $request->input('parent_id');
        $node = ArticleRelation::find($node_id);
        $parent = ArticleRelation::find($parent_id);
        $node->appendToNode($parent)->save();
        return response([
            'msg' => $node
        ],200);
    }

    public function insertAfter(Request $request){
        $node_id = $request->input('node_id');
        $neighbor_id = $request->input('neighbor_id');
        $node = ArticleRelation::find($node_id);
        $neighbor = ArticleRelation::find($neighbor_id);
        $node->afterNode($neighbor)->save();
        return response([
            'msg' => $node
        ],200);
    }

    public function insertBefore(Request $request){
        $node_id = $request->input('node_id');
        $neighbor_id = $request->input('neighbor_id');
        $node = ArticleRelation::find($node_id);
        $neighbor = ArticleRelation::find($neighbor_id);
        $node->beforeNode($neighbor)->save();
        return response([
            'msg' => $node
        ],200);
    }

    public function ancestorOf(Request $request, $id){
        $result = ArticleRelation::ancestorsOf($id);
        return response([
            'msg' => $result
        ],200);
    }

    public function ancestorAndSelf(Request $request, $id){
        $result = ArticleRelation::ancestorsAndSelf($id)->toTree();;
        return response([
            'msg' => $result
        ],200);
    }

    public function descendantsOf(Request $request, $id){
        $result = ArticleRelation::descendantsOf($id);
        return response([
            'msg' => $result
        ],200);
    }

    public function descendantsAndSelf(Request $request, $id){
        $result = ArticleRelation::descendantsAndSelf($id)->toTree();
        return response([
            'msg' => $result
        ],200);
    }

    public function ancestorDefaultOrder(Request $request, $id){
        $result = ArticleRelation::defaultOrder()->ancestorsOf($id);
        return response([
            'msg' => $result
        ],200);
    }

    public function getDepth($id){
        $result = ArticleRelation::withDepth()->find($id);
        $depth = $result->depth;
        return response([
            'msg' => $result,
            'depth' => $depth
        ],200);
    }



    public function ldata($tree){
        $newTree = array();
        if ( $tree == null ) {
            return null;
        }
        $model_name = $tree->article_relation_type;
        if (class_exists ($model_name)){
            $model_id = $tree->article_relation_id;
            $newTree = $model_name::find($model_id)->toArray();
        }          foreach ($tree->descendants as $node){
            $newTree['children'][] = $this->ldata($node);          }
        return $newTree;      }
}


