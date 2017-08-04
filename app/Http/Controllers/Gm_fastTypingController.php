<?php namespace App\Http\Controllers;


use App\Models\Gm_fastTypingModel;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class Gm_fastTypingController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /gm_fasttyping
     *
     * @return Response
     */
    public function index()
    {
        return view('gm_fastTyping');
    }


    public function statistic()
    {
        $config['level7'] = Gm_fastTypingModel::where('level', '7')->orderBy('score', 'desc')->get()->toArray();
        $config['level4'] = Gm_fastTypingModel::where('level', '4')->orderBy('score', 'desc')->get()->toArray();
        $config['level2'] = Gm_fastTypingModel::where('level', '2')->orderBy('score', 'desc')->get()->toArray();

        return view('statistic', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /gm_fasttyping/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /gm_fasttyping
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();
        Gm_fastTypingModel::create([
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'level' => $data['level'],
            'score' => $data['score'],
            'game_time' => $data['game_time'],
            'average_speed' => $data['average_speed'],


        ]);

            dd($data);
        return view('gm_fastTyping');

    }

    /**
     * Display the specified resource.
     * GET /gm_fasttyping/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /gm_fasttyping/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /gm_fasttyping/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /gm_fasttyping/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}