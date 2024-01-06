<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $searchTerm = request()->get('s');
        $teams = Team::latest()->orWhere('fullname', 'LIKE', "%$searchTerm%")->paginate(15);
        return view('admin.team.index')
        ->with(compact('teams'));
    }
    public function create()
    {
        return view('admin.team.create');
    }
    public function store(Request $request)
    {
        $fileName = null;
        if(request()->hasfile('team_img'))
        {
            $file = request()->file('team_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads', $fileName);
        }
        Team::create([
            'fullname' => $request->get('fullname'),
            'designation' => $request->get('designation'),
            'telephone' => $request->get('telephone'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'profile' => $request->get('profile'),
            'team_img' => $fileName,
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        return view('admin/team/create');
    }
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.edit')->with(compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $currentImage = $team->team_img;


        $fileName = null;
        if(request()->hasfile('team_img'))
        {
            $file = request()->file('team_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads', $fileName);
        }
        $team->update([
            'fullname' => $request->get('fullname'),
            'designation' => $request->get('designation'),
            'telephone' => $request->get('telephone'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'profile' => $request->get('profile'),
            'team_img' => ($fileName) ? $fileName : $currentImage,
            'status' => $team->status,
            'created_by' => '1',
            'updated_by' => '1',
            ]);
            return redirect()->to('admin/team');
    }

    public function status($id)
    {
        $team = team::findOrFail($id);
        $newStatus = ($team->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $team->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }  
    public function delete($id)
    {
        $team = team::findOrFail($id);
        $team->delete();
        return redirect()->back();
    }
    
}
