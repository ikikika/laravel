<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //customise output for api
        return [
          'id' => $this->id,
          'title' => $this->title,
          'body' => $this->body
        ];
    }

    // add more info to output
    public function with ($request){
      return [
        'version' =>'1.0.0',
        'author_url' => url('http://example.com')
      ];
    }
}
