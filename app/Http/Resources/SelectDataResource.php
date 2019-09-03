<?php

namespace App\Http\Resources;

class SelectDataResource
{
    protected $value;
    protected $text;
    protected $data;

    public function __construct($data ,$value="", $text="")
    {
        $this->value = $value;
        $this->text = $text;
        $this->data = $data;
    }

    public function get()
    {
        $arr = [];
        $data = $this->data;

        foreach ($data as $value){
            $arr[] = [
                "value" => $value->{$this->value},
                "text" => $value->{$this->text}
            ];
        }

        return response()->json($arr);
    }
}
