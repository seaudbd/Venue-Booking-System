<?php

namespace App\Http\Controllers\Admin\Operation;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Customer\CustomerBooking;
use App\Model\Menu;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index($id)
    {
        $firstLevelMenus = Menu::where('root_id', 0)->where('status', 'Active')->get();
        $operationLists = explode(',', Menu::where('id', $id)->first()->operation_list);
        $finalOperationLists = [];
        foreach ($operationLists as $operationList) {
            $temp = explode(':', $operationList);
            $finalOperationLists[$temp[0]] = $temp[1];
        }
        $activeMenuValue = $finalOperationLists['activeMenuValue'];
        $activeSubMenuValue = $finalOperationLists['activeSubMenuValue'];
        $title = $activeSubMenuValue . ' | Hornsby Baha’i Centre of Learning';
        $activeMenuId = $finalOperationLists['activeMenuId'];
        $activeSubMenuId = $finalOperationLists['activeSubMenuId'];
        $recordPerPage = $finalOperationLists['recordPerPage'];
        return view('Admin.Operation.customer', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage'
        ));
    }

    public function gets($searchString, $recordPerPage)
    {
        $response = Customer::
            where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('number', 'like', '%' . $searchString . '%');
                    $query->orWhere('login_id', 'like', '%' . $searchString . '%');
                    $query->orWhere('name', 'like', '%' . $searchString . '%');
                    $query->orWhere('email', 'like', '%' . $searchString . '%');
                    $query->orWhere('contact_number', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
            })
            ->with('customerBookings')
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            Customer::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function delete(Request $request)
    {
        Customer::where('id', $request->get('id'))->delete();
        CustomerBooking::where('customer_id', $request->get('id'))->delete();
        return response()->json('Customer Deleted Successfully');
    }

    public function changeStatus(Request $request)
    {
        Customer::where('id', $request->get('id'))->update(['status' => $request->get('status')]);
        return response()->json('Status Changed Successfully');
    }

    public function getBookings(Request $request)
    {
        return response()->json(CustomerBooking::where('customer_id', $request->get('customer_id'))->with('venue')->with('customer')->get());
    }

    public function getAccessCode(Request $request)
    {
        return response()->json(Customer::where('id', $request->get('id'))->first());
    }

    public function saveAccessCode(Request $request)
    {
        $request->validate([
            'access_code' => 'required|max:255',
            'id' => 'required|numeric'
        ]);
        Customer::where('id', $request->get('id'))->update(['access_code' => $request->get('access_code')]);
        return response()->json('Access Code Saved Successfully');
    }
}
