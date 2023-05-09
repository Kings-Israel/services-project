<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
  // Card Basic
  public function card_basic()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Card"], ['name' => "Basic Card"]
    ];
    return view('/admin/content/cards/card-basic', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Card Advance
  public function card_advance()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Card"], ['name' => "Advance Card"]
    ];
    return view('/admin/content/cards/card-advance', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Card Statistics
  public function card_statistics()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Card"], ['name' => "Statistics Cards"]
    ];
    return view('/admin/content/cards/card-statistics', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Card Analytics
  public function card_analytics()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Card"], ['name' => "Analytics Cards"]
    ];
    return view('/admin/content/cards/card-analytics', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Card Actions
  public function card_actions()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Card"], ['name' => "Card Actions"]
    ];
    return view('/admin/content/cards/card-actions', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
