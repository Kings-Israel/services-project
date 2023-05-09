<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    // Component Alert
    public function alert()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Alerts"]
        ];
        return view('/admin/content/components/component-alerts', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component - Avatar
    public function avatar()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Avatar"]
        ];
        return view('/admin/content/components/component-avatar', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Badges
    public function badges()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Badges"]
        ];
        return view('/admin/content/components/component-badges', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Breadcrumbs
    public function breadcrumbs()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Breadcrumbs"]
        ];
        return view('/admin/content/components/component-breadcrumbs', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Buttons
    public function buttons()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Buttons"]
        ];
        return view('/admin/content/components/component-buttons', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Carousel
    public function carousel()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Carousel"]
        ];
        return view('/admin/content/components/component-carousel', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Collapse
    public function collapse()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Collapse"]
        ];
        return view('/admin/content/components/component-collapse', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component - Divider
    public function divider()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Divider"]
        ];
        return view('/admin/content/components/component-divider', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Dropdowns
    public function dropdowns()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Dropdowns"]
        ];
        return view('/admin/content/components/component-dropdowns', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component List Group
    public function list_group()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "List Group"]
        ];
        return view('/admin/content/components/component-list-group', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Media Objects
    public function media_objects()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Media Objects"]
        ];
        return view('/admin/content/components/component-media-objects', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Modals
    public function modals()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Modals"]
        ];
        return view('/admin/content/components/component-modals', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Navs
    public function navs()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Navs"]
        ];
        return view('/admin/content/components/component-navs', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Pagination
    public function pagination()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Pagination"]
        ];
        return view('/admin/content/components/component-pagination', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Pill Badges
    public function pill_badges()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Pill Badges"]
        ];
        return view('/admin/content/components/component-pill-badges', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Pills
    public function pills()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Pills"]
        ];
        return view('/admin/content/components/component-pills', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Tabs
    public function tabs()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Tabs"]
        ];
        return view('/admin/content/components/component-tabs', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    // Component Tooltips
    public function tooltips()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Tooltips"]
        ];
        return view('/admin/content/components/component-tooltips', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Popovers
    public function popovers()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Popovers"]
        ];
        return view('/admin/content/components/component-popovers', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Progress
    public function progress()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Progress"]
        ];
        return view('/admin/content/components/component-progress', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Spinner
    public function spinner()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Spinner"]
        ];
        return view('/admin/content/components/component-spinner', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Timeline
    public function timeline()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Timeline"]
        ];
        return view('/admin/content/components/component-timeline', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Component Toast
    public function toast()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Components"], ['name' => "Toast"]
        ];
        return view('/admin/content/components/component-toast', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
