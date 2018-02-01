<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

//== Essa model é da tabela products ==//

/* sempre que cria uma model cria a migration com -m 
   cria a tabela sempre no plural,e a model no singular
   a model sabe a qual tabela pertence pelo seu nome
   a model obtem todos os dados da tabela products
*/

/* os campos que podem ser preenchidos no banco */   
class Product extends Model
{
    protected $fillable = [
    	  'name',
        'number',
        'active',
        'category',
        'description',
    ];

    //protected $aguarded = ['admin'];
    
}
