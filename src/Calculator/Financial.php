<?php namespace Halofina\Calculator;

use Halofina\Core\Exception;

class Financial {

    const TYPE_RUMAH            = "rumah";
    const TYPE_PENSIUN          = "pensiun";
    const TYPE_LIBURAN          = "liburan";
    const TYPE_PENDIDIKAN_ANAK  = "pendidikan_anak";
    const TYPE_PERNIKAHAN       = "pernikahan";

    /**
     * Get inflation rate
     *
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function inflation($duration, $type = null) {
        $inflation = 0;

        if ($duration <= 1) {
            $inflation = 3.61;
        } else if ($duration <= 3) {
            $inflation = 3.31;
        } else if ($duration <= 5) {
            $inflation = 5.34;
        } else if ($duration <= 10) {
            $inflation = 5.21;
        } else {
            $inflation = 5.94;
        }

        $rate = 1;
        switch ($type) {
            case self::TYPE_RUMAH:
                $rate = 1.2;
                break;
            case self::TYPE_PENSIUN:
                $rate = 1;
                break;
            case self::TYPE_LIBURAN:
                $rate = 1;
                break;
            case self::TYPE_PENDIDIKAN_ANAK:
                $rate = 1.5;
                break;
            case self::TYPE_PERNIKAHAN:
                $rate = 1;
                break;
            default:
                $rate = 1;
                break;
        }

        return $inflation * $rate;
    }

    /**
     * Get return investment based on duration
     *
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function return_investment($duration) {
        $return_investment = 0;

        if ($duration <= 1) {
            $return_investment = 5.2;
        } else if ($duration <= 3) {
            $return_investment = 6.9;
        } else if ($duration <= 5) {
            $return_investment = 8.8;
        } else if ($duration <= 10) {
            $return_investment = 12.0;
        } else {
            $return_investment = 13.6;
        }

        return $return_investment;
    }

    /**
     * Calculate future value and regular investment needed
     *
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function calculate($data){
        // check if present value exist
        if(!isset($data["present_value"]) || $data["present_value"] === "")
            throw new Exception("Biaya saat ini harus diisi!");

        // check if duration exist
        if(!isset($data["duration"]) || $data["duration"] === "")
            throw new Exception("Durasi harus diisi!");

        // present value
        $data["present_value"] = isset($data["present_value"]) ? floatval(str_replace(".", "", $data["present_value"])) : 0;

        // duration
        $data["duration"]  = floatval($data["duration"]);

        // inflation
        $data["inflation"]  = isset($data["inflation"]) ? floatval($data["inflation"]) : $this->inflation($data["duration"], $data["type"]);
        
        // initial fund
        $data["initial_fund"] = isset($data["initial_fund"]) ? floatval(str_replace(".", "", $data["initial_fund"])) : 0;

        // future value
        $data["future_value"] = $data["duration"] != 0 ? round(Calculator::fv($data["inflation"] / 100, $data["duration"], 0, -1 * $data["present_value"], 0)) : $data["present_value"];
        
        // return investment
        $data["return_investment"]  = isset($data["return_investment"]) ? floatval($data["return_investment"]) : $this->return_investment($data["duration"]);

        // current fund
        $data["current_fund"] = $data["duration"] != 0 ? round(Calculator::fv($data["return_investment"] / 100, $data["duration"], 0, -1 * $data["initial_fund"], 0)) : $data["initial_fund"];

        // fund lack
        $data["fund_lack"] = $data["future_value"] - $data["current_fund"];

        // regular investment
        $data["regular_investment"] = $data["duration"] != 0 ? round(Calculator::pmt($data["return_investment"] / 1200, $data["duration"] * 12, 0, -1 * $data["fund_lack"], 0)) : $data["fund_lack"];

        return $data;
    }

    /**
     * Save calculation to database
     *
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function result($data) {
        // check if type exist
        if(!isset($data["type"]) || $data["type"] === "")
            throw new Exception("Tujuan harus diisi!");

        // check if present value exist
        if(!isset($data["present_value"]) || $data["present_value"] === "")
            throw new Exception("Biaya saat ini harus diisi!");

        // check if duration exist
        if(!isset($data["duration"]) || $data["duration"] === "")
            throw new Exception("Durasi harus diisi!");

        // inflation & return investment
        $inflation = $this->inflation($data["duration"], $data["type"]);
        $return_investment = $this->return_investment($data["duration"]);

        // calculate for regular saving        
        $tmp = self::calculate(array(
            "present_value" => $data["present_value"],
            "duration" => $data["duration"],
            "inflation" => $this->inflation($data["duration"], $data["type"]),
            "return_investment" => 0,
        ));
        $regular_saving = $tmp["regular_investment"];

        // calculate for regular investment
        $tmp = self::calculate(array(
            "present_value" => $data["present_value"],
            "duration" => $data["duration"],
            "inflation" => $inflation,
            "return_investment" => $return_investment,
        ));
        $future_value = $tmp["future_value"];
        $return_investment = $tmp["return_investment"];
        $regular_investment = $tmp["regular_investment"];

        return array_merge($data, array(
            "inflation" => $inflation,
            "future_value" => $future_value,
            "regular_saving" => $regular_saving,
            "return_investment" => $return_investment,
            "regular_investment" => $regular_investment,
        ));
    }
}