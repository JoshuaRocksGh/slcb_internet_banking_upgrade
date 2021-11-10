<?php

namespace App\Imports;

use Maatwebsite\Excel\Facades\Excel;
use App\Model\Frontend\ApplyStudent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use App\Model\Admin\ParentsDetaills;
use Illuminate\Support\Facades\DB;

class ExcelKorporUploadImport implements WithHeadingRow, ToCollection
{
    private $customer_no;
    private $user_id;
    private $user_name;
    private $value_date;
    private $ref_no;
    private $total_amount;
    private $currency;
    private $documentRef;
    private $account_no;
    private $trans_ref_no;
    private $desc;
    // private $bank_code;
    private $file;
    private $account_mandate;



    public function headingRow(): int
    {
        return 1;
    }


    public function __construct($customer_no, $user_id, $user_name, $documentRef, $account_no, $trans_ref_no, $total_amount, $currency,  $value_date, $file, $account_mandate)
    {
        $this->customer_no = $customer_no;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->total_amount = $total_amount;
        $this->currency = $currency;
        $this->value_date = $value_date;
        $this->ref_no = $trans_ref_no;
        // $this->bank_code = $bank_code;
        $this->documentRef = $documentRef;
        $this->account_no = $account_no;
        $this->file = $file;
        $this->account_mandate = $account_mandate;
    }

    public function collection(Collection $rows)
    {
        // Retriving form data which was place session from  ImportController.php

        // echo json_encode($rows);
        // die();


        $account_mandate = $this->account_mandate;
        $customer_no = $this->customer_no;
        $user_id = $this->user_id;
        $user_name = $this->user_name;
        $total_amount = $this->total_amount;
        $currency = $this->currency;
        $value_date = $this->value_date;
        $ref_no = $this->ref_no;
        // $bank_code = $this->bank_code;
        $documentRef = $this->documentRef;
        $account_no = $this->account_no;
        $file = $this->file;
        $post_date = Carbon::now();
        $post_date = $post_date->toDateTimeString();

        header('Content-type: application/json');
        // echo json_encode([
        //     'total_amount' => $total_amount,
        //     'value_date' => $value_date,
        //     'ref_no' => $ref_no,
        //     'bank_code' => $bank_code,
        // ]);
        // die();



        // Formating Date
        $value_date = strtotime($value_date);
        $value_date = date('d-M-Y', $value_date);

        $t_amt = 0;

        $check_ref = false;

        $batch_no = $documentRef;

        /*
        foreach ($rows as $row) {


            if ($row['account_number'] == null) {
            } else {
                // echo json_encode($row);
                // die();
                $t_amt = $t_amt + floatval($row['amount']);
            }
        }

        */

        // echo json_encode($t_amt);
        // die();


        // Looping through the excel file row by row
        /*
        foreach ($rows as $row) {
            // $ref_no_ = strval( $row['ref_no'] );

            if ($row['account_number'] == null) {
            } else {
                $ref = reset($row);
                if ($ref['ref_number'] != $ref_no) {

                    $check_ref = true;
                    break;
                }
                break;
            }

        }
        */

        // validation ref_number from session ref_no against ref_no in excel each row
        /*
        if ($check_ref) {
            echo json_encode([
                'responseCode' => '0333',
                'message' => "A reference Entered does not match file reference number"
            ]);

            die();
        }
        */


        // // Check if ref_no already exist in TB_CORP_BANK_BULK_REF
        /*
        $check_ref_no = DB::table('TB_CORP_BANK_BULK_REF')->where('ref_no', $ref_no)->value('ref_no');
        if ($check_ref_no) {
            echo json_encode([
                'responseCode' => '554',
                'message' => 'A file with the same ref_number already exist'
            ]);
            die();
        }
        */

        /*

        if ($t_amt != $total_amount) {
            echo json_encode([
                'responseCode' => '546',
                'message' => "Total amount does not tally with file total amount )"
            ]);
            die();
        }
        */

        $t_amt = 0;

        foreach ($rows as $row) {

            // echo json_encode($row);
            // die();


            if (null == ($row['telephone_number'] || $row['name'] ||  $row['amount'] || $row['id_number'])) {
                // return null;
            } else {


                $beneficiaryname = $row['name'];
                $creditaccountnumber =  $row['telephone_number'];

                // return response()->json([
                //     'responseCode' => '526',
                //     'message' => 'Insert into database',
                //     "data"  => $creditaccountnumber
                // ]);

                $t_amt = $t_amt + (float) $row['amount'];


                $query_result = DB::table('tb_corp_korpor_import_excel')->insert([
                    'ref_no' => $row['ref_number'],
                    'name' => $row['name'],
                    'amount' => $row['amount'],
                    'trans_desc' => $row['transaction_description'],
                    'value_date' => $value_date,
                    'bank_code' => "BKORP",
                    'user_id' => session()->get('userId'),
                    'customer_no' => $customer_no,
                    'account_no' => $account_no,
                    'account_mandate' => $account_mandate,
                    'total_amount' => $total_amount,
                    'currency' => $currency,
                    'message' => 'message',
                    'batch_no' => $batch_no,
                    'status' => 'P',
                    'bank_name' => '$bank_name',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                    'gender' => $row['gender'],
                    'age' => $row['age'],
                    'mobile_no' => $row['telephone_number'],
                    'id_number' => $row['id_number'],
                    'address' => $row['address'],
                ]);

                /*
                $query_result = DB::table('tb_corp_bank_req')->insert(
                    [
                        'request_type' => 'BULK',
                        'request_status' => 'P',
                        'user_id' => $user_id,
                        'customer_no' => $customer_no,
                        'user_name' => $user_name,
                        'account_no' => $account_no,
                        'account_mandate' => '',
                        'batch' => $documentRef,
                        'waitinglist' => 'not approved',
                        'bankcode' => $bank_code,
                        "creditaccountnumber" = $creditaccountnumber,
                        "beneficiaryname" => $beneficiaryname,
                        // 'narration' => $narration,
                        'post_date' => $post_date,
                        'is_accept_excel' => 'NY',
                        'ref_no' => $ref_no,
                        'total_amount' => $total_amount,
                        'value_date' => $value_date,
                    ]
                );
                */
            }
        }

        $query_result_ = DB::table('TB_CORP_BANK_BULK_REF')->insert(
            [

                'REF_NO' => $ref_no,
                'VALUE_DATE' => $value_date,
                'TOTAL_AMOUNT' => $t_amt,
                'DESCRIPTION' => $ref_no,
                'USER_ID' => $user_id,
                'ACCOUNT_NO' => $account_no,
                'ACCOUNT_MANDATE' => $account_mandate,
                'BATCH_NO' => $batch_no

            ]
        );



        // echo $query_result;die;

        DB::commit();

        // if($query_result_){

        //     return back()->with('success', 'Bulk transfer pending approval');

        // }else{
        //     return back()->withErrors(['error' => 'Bulk transfer pending approval']);

        // }

        // if($query_result_){

        //     // return back()->with('success', 'Bulk transfer pending approval');
        //     return json_encode( [
        //         'responseCode' => '000',
        //         'message' => 'Bulk transfer pending approval'
        //     ]);
        //     // die();
        // }else{
        //     // return back()->with('success', 'Bulk transfer pending approval');
        //     return json_encode( [
        //         'responseCode' => 'ii',
        //         'message' => 'Something went wrong'
        //     ]);
        //     // die();
        // }


    }
}