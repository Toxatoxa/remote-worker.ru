<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RecordRequest;
use App\Http\Controllers\Controller;
use App\Record;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RecordsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['tags', 'categories']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$article = Article::find(1);
        //$article = Article::findOrFail(1);
        //$article = Article::where('alias', '=', 'name')->firstOrFail();
        //$article = Article::where('votes', '>', 100)->take(10)->get();

        //$count = User::where('votes', '>', 100)->count();
        //$users = User::whereRaw('age > ? and votes = 100', [25])->get();

        // Создание нового пользователя в БД...
        //$user = User::create(['name' => 'John']);

        // Получение пользователя по свойствам, или его создание, если такого не существует...
        //$user = User::firstOrCreate(['name' => 'John']);

        // Получение пользователя по свойствам, или создание нового экземпляра...
        //$user = User::firstOrNew(['name' => 'John']);

        //Обновления в виде запросов к набору моделей:
        //$affectedRows = User::where('votes', '>', 100)->update(['status' => 2]);

        $records = Record::all();

        return view('records.index', compact('records'));
    }

    /**
     * @param $tags
     * @return \Illuminate\View\View
     */
    public function tags($tags)
    {
        $tag = Tag::where('name', $tags)->firstOrFail();

        return view('records.tags', compact('tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $alias
     * @return \Illuminate\Http\Response
     */
    public function categories($alias)
    {
        $category = Category::byName($alias)->firstOrFail();

        return view('records.categories', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');
        $record = new Record();

        return view('records.create', compact('categories', 'record', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RecordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request)
    {
        $record = $this->createRecord($request);

        session()->flash('flash_message', 'Your record has been created!');

        return Redirect::action('RecordsController@edit', array('id' => $record->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('records.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');

        return view('records.edit', compact('record', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RecordRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecordRequest $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->update($request->all());
        $this->syncTags($record, $request->input('tag_list', []));

        session()->flash('flash_message', 'Your record has been updated!');

        return Redirect::action('RecordsController@edit', array('id' => $record->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function createRecord(RecordRequest $request)
    {
        $record = Auth::user()
            ->records()
            ->create($request->all());
        $record->tags()->attach($request->input('tag_list'));

        return $record;
    }

    private function syncTags(Record $record, array $tags)
    {
        $listTags = Tag::lists('id')->toArray();

        foreach ($tags as $tag) {
            if (!in_array($tag, $listTags))
                Tag::create(['name' => $tag]);
        }

        $record->tags()->sync($tags);
    }
}
