<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    //Laravel no acepta asignaciones masivas por lo cual debemos especificar
    protected $fillable = [
        'title', 'body', 'iframe', 'imagen', 'user_id'
    ];

      /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                //Cuando el titulo se modifique o se ingrese un registro se convertirá en slug
                'source' => 'title',
                'onUpdate' => 'true'
            ]
        ];

       
    }

    //Un post pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Mostrará una parte de la informacion
    //Se utiliza para obtener una parte específica de una cadena de caracteres
    public function getGetExcerptAttribute(){

        return substr($this->body, 0, 140);
    }

    //Mostrar la imagen
    //Luego php artisan storage:link, para tener accerso a lo de esta carpeta
    public function getGetImageAttribute(){
        if($this->imagen)
          return url("storage/$this->imagen");
    }
}
