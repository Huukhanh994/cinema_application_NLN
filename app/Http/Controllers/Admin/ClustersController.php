<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CityContract;
use App\Contracts\ClusterContract;
use App\Contracts\SeatContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cluster;
class ClustersController extends BaseController
{
    protected $clusterRepository;

    protected $cityRepository;

    protected $seatRepository;

    public function __construct(ClusterContract $clusterRepository,CityContract $cityRepository,SeatContract $seatRepository)
    {
        $this->clusterRepository = $clusterRepository;
        $this->cityRepository = $cityRepository;
        $this->seatRepository = $seatRepository;
    }

    public function index()
    {
        $clusters = Cluster::with('city')->get();
        
        $cities = $this->cityRepository->listCities('city_name','asc');

        $this->setPageTitle('Clusters Index','Clusters Index');

        return view('admin.clusters.index',compact('clusters','cities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'cluster_name'      =>  'required|max:191',
            'city_id'     =>  'required',
        ]);

        $params = $request->except('_token');

        $cluster = $this->clusterRepository->createCluster($params);

        if (!$cluster) {
            return $this->responseRedirectBack('Error occurred while creating cluster.', 'error', true, true);
        }
        return $this->responseRedirect('admin.clusters.index', 'Cluster added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $city = $this->cityRepository->listCities();

        $cluster = $this->clusterRepository->findClusterById($id);

        $this->setPageTitle('Edit Cluster','Edit Cluster');

        return view('admin.clusters.edit',compact('city','cluster'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'cluster_name'  => 'required|max:191',
            'city_id'   => 'required',
        ]);

        $params = $request->except('_token');

        $cluster = $this->clusterRepository->updateCluster($params);

        if(!$cluster) {
            return $this->responseRedirectBack('Error occurred while updating cluster.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin.clusters.index','Cluster updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $cluster = $this->clusterRepository->deleteCluster($id);

        if (!$cluster) {
            return $this->responseRedirectBack('Error occurred while deleting cluster.', 'error', true, true);
        }
        return $this->responseRedirect('admin.clusters.index', 'Cluster deleted successfully' ,'success',false, false);
    }
}
