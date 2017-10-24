<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Position;

use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class VoyagerAdvertisementController extends Controller
{
    use BreadRelationshipParser;

    public function getSlug(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[1];
        }

        return $slug;
    }

    public function validateBread($request, $data)
    {
        $rules = [];
        $messages = [];

        foreach ($data as $row) {
            $options = json_decode($row->details);

            if (isset($options->validation)) {
                if (isset($options->validation->rule)) {
                    if (!is_array($options->validation->rule)) {
                        $rules[$row->field] = explode('|', $options->validation->rule);
                    } else {
                        $rules[$row->field] = $options->validation->rule;
                    }
                }

                if (isset($options->validation->messages)) {
                    foreach ($options->validation->messages as $key => $msg) {
                        $messages[$row->field.'.'.$key] = $msg;
                    }
                }
            }
        }

        return Validator::make($request, $rules, $messages);
    }

    public function index(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        Voyager::canOrFail('browse_' . $dataType->name);

        $dataTypeContent = Advertisement::with('journal')->get();

        $isModelTranslatable = false;

        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        $view = 'voyager::bread.browse';

        return Voyager::view($view, compact(
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'sortOrder',
            'searchable',
            'isServerSide'
        ));
    }

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        Voyager::canOrFail('read_' . $dataType->name);

        $dataTypeContent = Object::where("id", $id)->with('city', 'category', 'documents', 'customer', 'contractor', 'finances')->first();

        $isModelTranslatable = false;

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        return view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        // Voyager::canOrFail('edit_' . $dataType->name);
        $this->authorize('edit', app($dataType->model_name));

        // $dataTypeContent = Object::where('id', $id)->with('category', 'region', 'documents', 'customer', 'contractor', 'city')->first();

        $dataTypeContent = Advertisement::where('id', $id)->with('journal', 'positions')->first();


        $view = 'voyager.advertisements-edit';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        $isModelTranslatable = false;
        $advertisement = Advertisement::find($id);

        $newAdsPositions = [];
        
        $relPositions = Position::where("advertisement_id", '=', $id)->get();

        $lastId = $relPositions[count($relPositions) - 1]->id;
        
        foreach ($relPositions as $key => $position) {
            $newAdsPositions[$position->id] = ['position_id' => $position->id, 'price' => $position->price];
            // array_push($newAdsPositions, new class { public $position_id = $position->id; public $price = $position->price; });
        }

        $newAdsPositions = json_encode($newAdsPositions);
        // dd($relPositions[0]->price);

        return view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'relPositions', 'advertisement', 'newAdsPositions', 'lastId'));
    }

    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        Voyager::canOrFail('add_' . $dataType->name);

        //Validate fields with ajax
        
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }
        
        if (!$request->ajax()) {

            $newAds = array_filter(json_decode($request->newAds));
            $posToDelete = array_filter(json_decode($request->positionsToDelete));
            $posToDelete = array_combine($posToDelete, $posToDelete);

            $advertisement = Advertisement::find($id);

            if( $advertisement->journal_id !== (integer)$request->journal_id ){
                Storage::deleteDirectory('public/Ads'.$advertisement->id.'Journal'.$advertisement->journal_id);
            }

            foreach ($posToDelete as $posId) {             
                $matchingFiles = preg_grep('/Position'.$posId.'\.*/', Storage::files('public/Ads'.$advertisement->id.'Journal'.$advertisement->journal_id));                
                Storage::delete( $matchingFiles );
  
                Position::where( [ ['id', '=', $posId] , ['advertisement_id', '=', $advertisement->id] ] )->delete();                
            }
            
            $advertisement->journal_id = $request->journal_id;
            $advertisement->coupon = $request->coupon;
            $advertisement->percent = $request->percent;
            $advertisement->link = $request->link;
            $advertisement->title = $request->title;
            $advertisement->save();

            $positions = $newAds;

            foreach ($positions as $positionIndex => $position) {
                if( !array_key_exists( $position->position_id, $posToDelete )){
                    $positionImage = $request->file('position-'.$position->position_id.'-img') ? $request->file('position-'.$position->position_id.'-img') : false ;
                                            
                    $updatePosition = Position::where( [ ["advertisement_id", "=", $id], 
                                                      ["id", "=", $position->position_id] 
                                                    ])->first();

                    if ( !$updatePosition ){
                        $updatePosition = new Position();
                    }
                    
                    $updatePosition->price = $position->price;                
                    $updatePosition->advertisement_id = $advertisement->id;
                    $updatePosition->name =$position->name;
                    $updatePosition->save();

                    if( $positionImage ){
                        $updatePosition->image = 'public/Ads'.$advertisement->id.'Journal'.$request->journal_id.'/Position'.$updatePosition->id.'.'.$positionImage->extension();
                    }

                    $updatePosition->save();

                    if( $positionImage ){
                        $positionImage->storeAs(
                            'public/Ads'.$advertisement->id.'Journal'.$request->journal_id, 'Position'.$updatePosition->id.'.'.$positionImage->extension()
                        );
                    }
                }
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index", ['id' => $advertisement->id])
                ->with([
                    'message' => "Successfully Updated {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        foreach ($dataType->addRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->addRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);


        $view = 'voyager.advertisements-add';//        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    public function store(Request $request)
    {            
        
        $slug = $this->getSlug($request);
        
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $newAds = array_filter(json_decode($request->newAds));
            
            $newAdvertisement = new Advertisement();
            $newAdvertisement->journal_id = $request->journal_id;
            $newAdvertisement->coupon = $request->coupon;
            $newAdvertisement->percent = $request->percent;
            $newAdvertisement->link = $request->link;
            $newAdvertisement->title = $request->title;
            $newAdvertisement->save();
            
            $positions = $newAds;

            foreach ($positions as $id => $position) {
                $positionImage = $request->file('position-'.$position->position_id.'-img');

                $newPosition = new Position();
                $newPosition->price = $position->price;                
                $newPosition->advertisement_id = $newAdvertisement->id;
                $newPosition->name = $position->name;
                $newPosition->save();
                
                $newPosition->image = 'Ads'.$newAdvertisement->id.'Journal'.$request->journal_id.'/Position'.$newPosition->id.'.'.$positionImage->extension();
                $newPosition->save();
                
                $positionImage->storeAs(
                    'public/Ads'.$newAdvertisement->id.'Journal'.$request->journal_id, 'Position'.$newPosition->id.'.'.$positionImage->extension()
                );
            }
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        Voyager::canOrFail('delete_' . $dataType->name);

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        foreach ($dataType->deleteRows as $row) {
            if ($row->type == 'image') {
                $this->deleteFileIfExists('/uploads/' . $data->{$row->field});

                $options = json_decode($row->details);

                if (isset($options->thumbnails)) {
                    foreach ($options->thumbnails as $thumbnail) {
                        $ext = explode('.', $data->{$row->field});
                        $extension = '.' . $ext[count($ext) - 1];

                        $path = str_replace($extension, '', $data->{$row->field});

                        $thumb_name = $thumbnail->name;

                        $this->deleteFileIfExists('/uploads/' . $path . '-' . $thumb_name . $extension);
                    }
                }
            }
        }

        $data = $data->destroy($id)
            ? [
                'message' => "Successfully Deleted {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]
            : [
                'message' => "Sorry it appears there was a problem deleting this {$dataType->display_name_singular}",
                'alert-type' => 'error',
            ];

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

}
