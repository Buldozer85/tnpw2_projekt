<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\ShowSeriesDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Models\Show;
use Illuminate\Support\Facades\Storage;

class ShowsController extends Controller
{
    public function detail(Show $show)
    {
        $options = ['movie' => 'Film', 'series' => 'Seriál'];
        return view('admin.shows.detail')->with(['show' => $show, 'types' => $options]);
    }

    public function showCreate()
    {
        $options = ['movie' => 'Film', 'series' => 'Seriál'];
        return view('admin.shows.new')->with(['types' => $options]);
    }

    public function create(CreateShowRequest $request)
    {
        $show = new Show();

        $show->name = $request->get('name');
        $show->date_of_premiere = $request->get('date_of_premiere');
        $show->type = $request->get('type');
        $show->{'show-trixFields'} = $request->get('show-trixFields');

        $path = $request->file('file_input')->store('/', 'shows');

        $show->icon = $path;

        $parameters = [
            'length' => $request->get('length')
        ];

        if($request->get('type') === 'series') {
            $parameters['count_of_seasons'] = $request->get('count_of_seasons');
            $parameters['count_of_episodes'] = $request->get('count_of_episodes');
            $parameters['still_running'] = $request->get('still_running');
        }

        $show->parameters = json_encode($parameters);

        $show->save();

        return redirect()->route('admin.shows.detail', $show->id);
    }

    public function update(Show $show, UpdateShowRequest $request)
    {
        $show->name = $request->get('name');
        $show->date_of_premiere = $request->get('date_of_premiere');
        $show->type = $request->get('type');
        $show->{'show-trixFields'} = $request->get('show-trixFields');

        if(!is_null($request->file('file_input'))) {
            $path = $request->file('file_input')->store('/', 'shows');
            $show->icon = $path;
        }

        $parameters = [
          'length' => $request->get('length')
        ];

        if($request->get('type') === 'series') {
           $parameters['count_of_seasons'] = $request->get('count_of_seasons');
           $parameters['count_of_episodes'] = $request->get('count_of_episodes');
           $parameters['still_running'] = $request->get('still_running') ?? false;
        }

        $show->parameters = json_encode($parameters);

        $show->save();

        return redirect()->route('admin.shows.detail', $show->id);
    }

    public function delete(Show $show)
    {
        $show->reviews()->delete();

        $show->delete();

        return redirect()->back();
    }
}
