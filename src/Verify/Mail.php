<?php /** @noinspection SpellCheckingInspection */
namespace Halofina\Verify;
use Halofina\Assets\NotifPage;
use Halofina\Assets\ThanksPage;
use Halofina\Assets\ThanksPageV2;
use Halofina\Core\Exception;
use Halofina\Core\Utils\Crypt;
use Halofina\Core\Utils\Curl;

abstract class Mail{
    public static function routing($data)
    {
        $resp = self::execute($data);
        if($resp['status']===1){
            // echo ThanksPage::get($resp['key']['otp'],$resp['key']['name']);
            echo ThanksPageV2::get($resp['key']['name']);
        }
        else{
            switch ($resp['key']) {
                case 'exception':
                    $message = 'Terjadi Gangguan Pada Proses Verifikasi Anda. Silahkan Coba Kembali Atau Hubungi CS Kami';
                    break;
                case 'otp':
                    $message = 'Link Verifikasi Anda Sudah Expired. Silahkan Request Link Verifikasi Baru';
                    break;
                case 'invotp':
                    $message = 'Link Verifikasi Anda Sudah Expired. Silahkan Request Link Verifikasi Baru';
                    break;
                default:
                    $message = 'Gunakan Link Verifikasi Untuk Memulai Proses Verifikasi';
            }
            echo NotifPage::get($message);
        }
    }

    /**
     * @param $data
     * @return array
     */
    private static function execute($data)
    {
        $status = 0;
        $key = null;
        try {
            $arr = json_decode(Crypt::decryptMD5(rawurldecode($data)));

            // if(!isset($arr->otp,$arr->name,$arr->host) || $arr === null){
            //     return array('status'=>$status,'key'=>'exception');
            // }

            if(!isset($arr->name,$arr->host) || $arr === null){
                return array('status'=>$status,'key'=>'exception');
            }

            $user = self::getUser($arr);
            // if ($arr->otp===null) {
            //     $key = 'otp';
            // }
            // elseif(!isset($user['otp'])||$arr->otp!==$user['otp']) {
            //     $key = 'invotp';
            // }
            // elseif($arr->otp!==null&&isset($user['isenabled'])&&$user['isenabled']==='0'&&$user['otp']===$arr->otp){

            //     $user = self::postVerify($arr);
            //     $arr = array(
            //         'name'=>$arr->name,
            //         'otp'=>$user['otp']
            //     );

            //     $status = 1;
            //     $key = $arr;
            // }
            if(isset($user['isenabled'])&&$user['isenabled']==='0'){

                $user = self::postVerify($arr);
                $arr = array(
                    'name'=>$arr->name,
                );

                $status = 1;
                $key = $arr;
            }
            else{
                $key = 'exception';
            }
        } catch (Exception $e) {
            // var_dump($e->getMessage());
            $key = 'exception';
        }
        return array('status'=>$status,'key'=>$key);
    }

    /**
     * @param $arr
     * @return mixed
     * @throws Exception
     */
    private static function getUser($arr){
        $url = $arr->host.'/api/user';
        $param = array('userid'=>$arr->userid);
        $header= array('Content-Type: application/json');
        $res = Curl::connect($url, $param, $header, 'POST');
        return $res['d'];
    }

    /**
     * @param $arr
     * @return mixed
     * @throws Exception
     */
    private static function postVerify($arr){
        $url = $arr->host.'/api/verify';
        $param = array('userid'=>$arr->userid);
        $header= array('Content-Type: application/json');
        $res = Curl::connect($url, $param, $header, 'POST');
        return $res['d'];
    }
}

