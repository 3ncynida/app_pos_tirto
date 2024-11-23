<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuUiController extends Controller
{
    public function showbutton(){
        return view("UI_menu.button");
    }
    public function showgeneral(){
        return view("UI_menu.general");
    }
    public function showmodals(){
        return view("UI_menu.modals");
    }
    public function shownavbar(){
        return view("UI_menu.navbar");
    }
    public function showribbons(){
        return view("UI_menu.ribbons");
    }
    public function showsliders(){
        return view("UI_menu.sliders");
    }
    public function showtimeline(){
        return view("UI_menu.timeline");
    }
    public function showicons(){
        return view("UI_menu.icons");
    }

}
