<?php

namespace App\Http\Controllers;

use App\Advertisement;

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

        $regions = Region::all();

        $object = Object::where('id', $id)->first();
        $addressPlaceholder = $object->address;

        // Check permission
        Voyager::canOrFail('edit_' . $dataType->name);

        $dataTypeContent = Object::where('id', $id)->with('category', 'region', 'documents', 'customer', 'contractor', 'city')->first();

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        $isModelTranslatable = false;

        return view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'regions', 'addressPlaceholder'));
    }

    public function update(Request $request, $id)
    {
        $cities = City::all();
        $regions = Region::all();
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        Voyager::canOrFail('add_' . $dataType->name);

        //Validate fields with ajax
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "address" => "required",
            "city_id" => "required",
            "category_id" => "required",
            "customer_id" => "required",
            "contractor_id" => "required",
            "region_id" => "required",
            "price" => "required|integer|min:0",
            "status" => "required",
            //"description" => "required",
            "maps_lat" => "required",
            "maps_lng" => "required",
            //"finished_year" => "",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }

        $city = City::where('id', $request->city_id)->first() ? City::where('id', $request->city_id)->first() : City::where('name', $request->city_id)->first();

        if( $city ){
            $city_id = $city->id;
        }

        if( !$city ){
            $newCity = new City();
            $newCity->name = $request->city_id;
            $newCity->save();
            $city_id = $newCity->id;
        }

        $region_id = $request->region_id;

        if($request->region_id == 'місто Київ' || $request->region_id == 'город Киев'){
            foreach ($regions as $region) {
                if($region->name_ua == 'Київська область'){
                    $region_id = $region->id;
                }
            }
        }

        if (!$request->ajax()) {

            $object = Object::where('id', $id)->first();

            $object->name = $request->name;
            $object->address = $request->address;
            $object->city_id = $city_id;
            $object->category_id = $request->category_id;
            $object->customer_id = $request->customer_id;
            $object->contractor_id = $request->contractor_id;
            $object->region_id = $region_id;
            $object->price = $request->price;
            $object->status = $request->status;
            $object->description = $request->description;
            $object->work_description = $request->work_description;
            $object->maps_lat = $request->maps_lat;
            $object->maps_lng = $request->maps_lng;
            $object->finished_year = date('Y',strtotime($request->finished_at));
            $object->finished_at = date('Y-m',strtotime($request->finished_at));

            $object->save();

            $finances = Finance::where('object_id', $id)->first();
            $finances->suma = $request->price;
            $finances->status = 'provided';
            $finances->description = '';
            $finances->date = Carbon::now()->toDateString();
            $finances->object_id = $object->id;
            $finances->save();


            return redirect()
                ->route("voyager.{$dataType->slug}.edit", ['id' => $object->id])
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

//        $view = 'voyager::bread.edit-add';
        $view = 'voyager.advertisements-add';

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

            $advertisement = new Advertisement();

            $advertisement->journal_id = $request->journal_id;

            $advertisement->save($request->all());


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
