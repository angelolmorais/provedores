<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Bidding;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;
use App\Models\Information;
use Carbon\Carbon;


class BiddingController extends Controller
{

    public function index()
    {

		$jsonFilePath = env('API_BASE_URL');

		$authUsername = 'admin';
		$authPassword = '$up0rt3@oei';
		$authCredentials = base64_encode($authUsername . ':' . $authPassword);

		$httpOptions = [
			'header' => 'Authorization: Basic ' . $authCredentials,
		];

		$contextOptions = [
			'ssl' => [
				'verify_peer' => false,
				'cafile' => '/etc/ssl/certs/cacert.pem',
			],
			'http' => $httpOptions,
		];

		$context = stream_context_create($contextOptions);

		$jsonContent = file_get_contents($jsonFilePath, false, $context);

		$data = json_decode($jsonContent, true);

		if (!isset($data['Offices']) || empty($data['Offices'])) {
			return view('maintenance');
		}

		$biddings = $data['Offices'];

        $filteredBiddings = array_filter($biddings, function ($bidding) {
            return $bidding['section_code'] === 'LIC';
        });

        usort($filteredBiddings, function ($a, $b) {
            $yearA = substr($a['reference'], -4);
            $yearB = substr($b['reference'], -4);

            if ($yearA !== $yearB) {
                return $yearB <=> $yearA;
            }

            $numericA = substr($a['reference'], 0, 3);
            $numericB = substr($b['reference'], 0, 3);

            if ($numericA !== $numericB) {
                return $numericB <=> $numericA;
            }

            return strcmp($a['reference'], $b['reference']);
        });

        $perPage = 25;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $limitedBiddings = array_slice($filteredBiddings, $offset, $perPage);

        $totalBiddings = count($filteredBiddings);

        $paginator = new LengthAwarePaginator(
            $limitedBiddings,
            $totalBiddings,
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        return view('dashboard.index', compact('paginator'));
    }


    public function show($id)
    {
        $currentDate = Carbon::now();

        $baseUrl = env('API_BASE_URL');
        $sslOptions = [
            'verify_peer' => false,
            'cafile' => '/etc/ssl/certs/cacert.pem',
        ];

        $httpOptions = [
            'header' => 'Authorization: Basic ' . base64_encode('admin:$up0rt3@oei'),
        ];

        $context = stream_context_create([
            'ssl' => $sslOptions,
            'http' => $httpOptions,
        ]);

        $response = file_get_contents($baseUrl, false, $context);

        $data = json_decode($response, true);

        $bidding = null;
        foreach ($data['Offices'] as $item) {
            if ($item['id'] == $id) {
                $bidding = $item;
                break;
            }
        }

        if (!$bidding) {
            abort(404);
        }

        $userId = auth()->user()->id;


        $Uploads = Upload::select(
            'uploads.*',
            'categories.name AS category_name',
            'subcategories.name AS subcategory_name'
            )
            ->join('categories', 'uploads.id_category', '=', 'categories.id')
            ->leftJoin('categories AS subcategories', 'uploads.id_subcategory', '=', 'subcategories.id')
            ->where('uploads.id_bidding', $id)
            ->where('uploads.id_user', $userId)
            ->whereNotNull('uploads.id_category')
            ->get();


        $InfoUploads =   Upload::select(
                'uploads.*',
                'information.title AS title',
                'information.description AS description'
                )
                ->join('information', 'uploads.id_information', '=', 'information.id_registers')
                ->where('uploads.id_bidding', $id)
                ->where('uploads.id_user', $userId)
                ->whereNotNull('uploads.id_information')
                ->get();

        $InfoText = Information::join('registers', 'information.id_registers', '=', 'registers.id')
            ->where('registers.id_user', $userId)
            ->where('registers.id_bidding', $id)
            ->get();

        $countInfoText = $InfoText->count();

        $categories = Category::all();
        $subcategories = Category::all();

        return view('bidding.details', compact('bidding','InfoUploads', 'InfoText','countInfoText', 'Uploads', 'categories', 'subcategories'));
        }

}
