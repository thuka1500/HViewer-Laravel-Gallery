<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery_items';

    //JSON encode/decode gallery thumbs
    public function setImageGalleryThumbsAttribute($value){
         $this->attributes['image_gallery_thumbs'] = json_encode($value);
    }
    public function getImageGalleryThumbsAttribute(){
        return json_decode($this->attributes['image_gallery_thumbs']);
    }

    /* DEPRECATED: MOVING OVER TO SERIES DB TABLE */
    /* //JSON encode/decode tags
    public function setTagsAttribute($value){
         $this->attributes['tags'] = json_encode($value);
    }
    public function getTagsAttribute(){
        return json_decode($this->attributes['tags']);
    }

    //JSON encode/decode artists
    public function setArtistsAttribute($value){
         $this->attributes['artists'] = json_encode($value);
    }
    public function getArtistsAttribute(){
        return json_decode($this->attributes['artists']);
    }

    //JSON encode/decode languages
    public function setLanguagesAttribute($value){
         $this->attributes['languages'] = json_encode($value);
    }
    public function getLanguagesAttribute(){
        return json_decode($this->attributes['languages']);
    } */

    //Properly formatted dates
    public function getCreatedAtAttribute(){
        return date('F d, Y', strtotime($this->attributes['created_at']));
    }
    public function getUpdatedAtAttribute(){
        return date('F d, Y', strtotime($this->attributes['updated_at']));
    }
}
