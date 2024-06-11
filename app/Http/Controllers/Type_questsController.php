<?php

namespace App\Http\Controllers;

use App\Models\Type_quest;
use Illuminate\Http\Request;

class Type_questsController extends Controller{
    public function index(){
        $typeQuests= Type_quest::paginate(10);
        return view('type.quests.index', compact('typeQuests'));
    }

    public function create()
    {
        return view('type.quest.create');
    }

    public function store(Request $request)
    {
        $typeQuest = new Type_quest();
        $typeQuest->name = request('name');
        $typeQuest->save();
        return redirect()->route('tiposQuest.index');
    }

    public function edit($id)
    {
        $typeQuest = Type_quest::find($id);
        return view('type.quest.edit', compact('typeQuest'));
    }

    public function update(Request $request, $id)
    {
        $typeQuest = Type_quest::find($id);
        $typeQuest->name = $request->name;
        $typeQuest->save();
        return redirect()->route('tiposQuest.index');
    }

    public function destroy($id)
    {
        $typeQuest = Type_quest::find($id);
        $typeQuest->delete();
        return redirect()->route('tiposQuest.index');
    }
}
