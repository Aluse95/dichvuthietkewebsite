<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Services\ContentService;

class RssXmlController extends Controller
{
    public function detail($alias = '',  $id = '')
    {
        $recents = $mostViews = $featured = '';
        $paramPost['status'] = Consts::POST_STATUS['active'];
        $paramPost['is_type'] = Consts::POST_TYPE['post'];
        if($alias == 'tin-moi-nhat') {
            $paramPost['order_by'] = 'id';
            $recents = ContentService::getCmsPost($paramPost)
                ->take(15)
                ->get();
            return response()->view('frontend.rss.detail', [
                'recents' => $recents,
            ])->header('Content-Type', 'text/xml');
        }
        if($alias == 'tin-xem-nhieu') {
            $paramPost['order_by'] = 'count_visited';
            $mostViews = ContentService::getCmsPost($paramPost)
                ->take(15)
                ->get();
            return response()->view('frontend.rss.detail', [
                'mostViews' => $mostViews
            ])->header('Content-Type', 'text/xml');
        }
        if($alias == 'tin-noi-bat') {
            $paramPost['is_featured'] = true;
            $featured = ContentService::getCmsPost($paramPost)
                ->take(15)
                ->get();
            return response()->view('frontend.rss.detail', [
                'featured' => $featured,
            ])->header('Content-Type', 'text/xml');
        }
        $posts = ContentService::getCmsPost($paramPost)
            ->where('taxonomy_id', $id)
            ->take(15)->get();
        return response()->view('frontend.rss.detail', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function home()
    {
        return $this->responseView('frontend.rss.home');
    }
}