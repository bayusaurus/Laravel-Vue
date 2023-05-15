<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Note, Subject};

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with('subject')->latest()->get();
        return NoteResource::collection($notes);
    }

    public function show(Subject $subject, Note $note)
    {
        // return $note;
        return NoteResource::make($note);
    }

    public function store()
    {   
        sleep(2);
        request()->validate([
            'subject' => 'required|numeric',
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail(request('subject'));
        
        $note = Note::create([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'Your note succesfully created',
            'note' => $note
        ]); 
    }

    public function update(Subject $subject, Note $note)
    {   
        request()->validate([
            'subjectId' => 'required|numeric',
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail(request('subjectId'));
        
        $note->update([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'Your note succesfully updated',
            'note' => $note
        ]); 
    }

    public function destroy(Subject $subject, Note $note)
    {
        $note->delete();
        return response()->json([
            'message' => 'Your note succesfully deleted',
        ]); 
    }
}
