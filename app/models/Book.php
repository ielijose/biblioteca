<?php

class Book extends Model {

    protected $table = 'books';
    public $timestamp = true;

    protected $fillable = ['name', 'author', 'code', 'status'];


	protected static $rules = [
        'name' => 'required',
		'author' => 'required',
    ];

    //Use this for custom messages
    protected static $messages = [
        'name.required' => 'Campo obligatorio.',
        'author.required' => 'Campo obligatorio.',
	];
  
    /* Scopes */ 

    public function scopeAvailables($query)
    {
        return $query->where('status', 'available');
    }  
    
    /* Relationships */ 

    /* Function */    

    public function getStatus()
    {
        switch ($this->status) {
            case 'available':
                return '<span class="label label-success"> Disponible </span>';
                break;

            case 'unavailable':
                return '<span class="label label-warning"> No disponible </span>';
                break;
            
            default:
                # code...
                break;
        }
    }

    public function prestar()
    {
        $this->status = 'unavailable';
        return $this->save();
    }

    public function devolver()
    {
        $this->status = 'available';
        return $this->save();
    }

}