<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
    	return Note::all();
    }

	public function create(Request $request)
	{
		$this->validate($request,['id'=>'required']);

		$data = $request->json()->all();
		$note = new Note();
		$note->title = $data['title'];
		$note->id = $data['id'];
		$note->save();

		return response()->json($note, 201);
	}

	public function delete(Request $request)
	{
		Note::find($request->id)->delete();
	}

	public function single($id)
	{
		return Note::findOrFail($id);
	}

	public function update(Request $request)
	{
		$data = $request->all();
		$note = Note::find($data['old_id']);
		$note->id = $data['id'];
		$note->title = $data['title'];
		$note->save();

		return $note;
	}
}
